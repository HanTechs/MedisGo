<?php

namespace App\Http\Controllers\Pasien;

use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AntreanController extends Controller
{
    public static function getAntreanPageData()
    {
        // Ambil jadwal yang tersedia hari ini (atau bisa difilter sesuai hari aktif)
        $dayNames = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $todayName = $dayNames[date('l')];

        // Sederhananya, ambil semua jadwal yang aktif
        $listJadwal = Jadwal::with('dokter.user')->get();

        $userId = Auth::id();
        $activeDate = Pendaftaran::getActiveDate();
        $sudahAmbilAntrean = false;

        if ($userId) {
            $sudahAmbilAntrean = Pendaftaran::where('id_user', $userId)
                ->where('tgl_pendaftaran', $activeDate)
                ->exists();
        }

        return [
            'listJadwal' => $listJadwal,
            'sudahAmbilAntrean' => $sudahAmbilAntrean
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'keluhan' => 'required|string',
        ]);

        $userId = Auth::id();
        $activeDate = Pendaftaran::getActiveDate();

        // Cek apakah sudah mengambil antrean pada siklus hari ini
        $existing = Pendaftaran::where('id_user', $userId)
            ->where('tgl_pendaftaran', $activeDate)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda hanya dapat mengambil antrean sekali dalam sehari. Silakan coba lagi besok setelah jam 07.00.');
        }

        // Hitung nomor antrean
        $lastAntrean = Pendaftaran::where('id_jadwal', $request->id_jadwal)
            ->where('tgl_pendaftaran', $activeDate)
            ->max('no_antrean') ?? 0;

        $pendaftaran = new Pendaftaran();
        $pendaftaran->id_user = $userId;
        $pendaftaran->id_jadwal = $request->id_jadwal;
        $pendaftaran->tgl_pendaftaran = $activeDate;
        $pendaftaran->no_antrean = $lastAntrean + 1;
        $pendaftaran->keluhan = $request->keluhan;
        $pendaftaran->status_periksa = 'Belum Diperiksa';
        $pendaftaran->status_pembayaran = 'Belum Lunas';
        $pendaftaran->save();

        return redirect()->route('ShowDashboardPasien')->with('success', 'Berhasil mengambil nomor antrean: A-' . str_pad($pendaftaran->no_antrean, 3, '0', STR_PAD_LEFT));
    }
}
