<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemeriksaanPasienController extends Controller
{
    // Mengambil data untuk halaman pemeriksaan pasien
    public static function getPemeriksaanData(Request $request)
    {
        $idPendaftaran = $request->query('id_pendaftaran');
        $doctorId = Auth::id();

        if (!$idPendaftaran) {
            // Jika tidak ada ID pendaftaran, cari yang pertama kali 'Belum Diperiksa' atau 'Sedang Diperiksa' hari ini untuk dokter ini
            $today = now()->toDateString();
            
            $pendaftaran = Pendaftaran::whereHas('jadwal', function ($q) use ($doctorId) {
                $q->where('id_user', $doctorId);
            })->whereDate('tgl_pendaftaran', $today)
              ->whereIn('status_periksa', ['Belum Diperiksa', 'Sedang Diperiksa'])
              ->orderBy('no_antrean', 'asc')
              ->first();
        } else {
            $pendaftaran = Pendaftaran::with(['pasien.user', 'jadwal'])->find($idPendaftaran);
        }

        if (!$pendaftaran) {
            return null;
        }

        // Otomatis ubah status ke 'Sedang Diperiksa' jika statusnya masih 'Belum Diperiksa'
        if ($pendaftaran->status_periksa === 'Belum Diperiksa') {
            $pendaftaran->status_periksa = 'Sedang Diperiksa';
            $pendaftaran->save();
        }

        // Cari riwayat rekam medis terakhir pasien ini (bisa dari semua dokter untuk referensi medis yang lebih lengkap)
        $riwayatTerakhir = RekamMedis::whereHas('pendaftaran', function ($q) use ($pendaftaran) {
            $q->where('id_user', $pendaftaran->id_user);
        })->with('pendaftaran.jadwal.dokter.user')->latest('tgl_periksa')->first();

        return [
            'pendaftaran' => $pendaftaran,
            'pasien' => $pendaftaran->pasien,
            'riwayatTerakhir' => $riwayatTerakhir,
        ];
    }

    // Menyimpan hasil pemeriksaan pasien dan rekam medis
    public function simpanPemeriksaan(Request $request)
    {
        $request->validate([
            'id_pendaftaran' => 'required|exists:pendaftaran,id_pendaftaran',
            'pemeriksaan' => 'required|string',
            'diagnosa' => 'required|string',
            'tindakan' => 'nullable|string',
            'resep_obat' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $pendaftaran = Pendaftaran::findOrFail($request->id_pendaftaran);

        // Unggah file resep jika ada
        $filePath = null;
        if ($request->hasFile('resep_obat')) {
            $file = $request->file('resep_obat');
            $filePath = $file->store('uploads/resep', 'public');
        }

        // Simpan data rekam medis
        RekamMedis::updateOrCreate(
            ['id_pendaftaran' => $pendaftaran->id_pendaftaran],
            [
                'tgl_periksa' => now()->toDateString(),
                'hasil_pemeriksaan' => $request->pemeriksaan,
                'diagnosa' => $request->diagnosa,
                'tindakan' => $request->tindakan ?? '-',
                'file_resep' => $filePath,
            ]
        );

        // Update status pendaftaran menjadi 'Selesai' dan status pembayaran 'Belum Lunas' (atau sesuai sistem)
        $pendaftaran->status_periksa = 'Selesai';
        $pendaftaran->save();

        return redirect()->route('ShowDashboardDokter')->with('success', 'Hasil pemeriksaan dan rekam medis pasien berhasil disimpan!');
    }
}
