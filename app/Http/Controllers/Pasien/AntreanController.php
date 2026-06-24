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

        return [
            'listJadwal' => $listJadwal
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal,id_jadwal',
            'keluhan' => 'required|string',
        ]);

        $userId = Auth::id();
        $today = now()->toDateString();

        // Cek apakah sudah daftar di jadwal yang sama hari ini
        $existing = Pendaftaran::where('id_user', $userId)
            ->where('id_jadwal', $request->id_jadwal)
            ->where('tgl_pendaftaran', $today)
            ->first();

        if ($existing) {
            return redirect()->back()->with('error', 'Anda sudah terdaftar di jadwal ini untuk hari ini.');
        }

        // Hitung nomor antrean
        $lastAntrean = Pendaftaran::where('id_jadwal', $request->id_jadwal)
            ->where('tgl_pendaftaran', $today)
            ->max('no_antrean') ?? 0;

        $pendaftaran = new Pendaftaran();
        $pendaftaran->id_user = $userId;
        $pendaftaran->id_jadwal = $request->id_jadwal;
        $pendaftaran->tgl_pendaftaran = $today;
        $pendaftaran->no_antrean = $lastAntrean + 1;
        $pendaftaran->keluhan = $request->keluhan;
        $pendaftaran->status_periksa = 'Belum Diperiksa';
        $pendaftaran->status_pembayaran = 'Belum Lunas';
        $pendaftaran->save();

        return redirect()->route('ShowDashboardPasien')->with('success', 'Berhasil mengambil nomor antrean: A-' . str_pad($pendaftaran->no_antrean, 3, '0', STR_PAD_LEFT));
    }
}
