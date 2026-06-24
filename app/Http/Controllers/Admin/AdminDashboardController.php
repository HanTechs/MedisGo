<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    // Mengambil statistik untuk dashboard admin.

    public static function getDashboardStats()
    {
        $totalDokter = User::where('role', 'dokter')->count();
        $totalPasien = User::where('role', 'pasien')->count();

        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $hariIni = $days[date('l')];

        $totalJadwal = Jadwal::count();
        $totalAntrean = Pendaftaran::whereDate('tgl_pendaftaran', now()->toDateString())->count();

        $dokterBaru = User::where('role', 'dokter')
            ->where('created_at', '>=', now()->subDays(7))
            ->count();

        return [
            'totalDokter' => $totalDokter,
            'totalPasien' => $totalPasien,
            'totalJadwal' => $totalJadwal,
            'totalAntrean' => $totalAntrean,
            'dokterBaru' => $dokterBaru,
            'hariIni' => $hariIni,
        ];
    }

    // Mengambil data untuk halaman kelola dokter.
    public static function getDoktersPageData()
    {
        return [
            'listDokter' => DokterResourceController::fetchAllDokters()
        ];
    }

    // Mengambil data untuk halaman kelola pasien.
    public static function getPasiensPageData()
    {
        return [
            'listPasien' => PasienResourceController::fetchAllPasiens()
        ];
    }

    // Mengambil data untuk halaman kelola jadwal.
    public static function getJadwalsPageData()
    {
        return [
            'listJadwal' => JadwalResourceController::fetchAllJadwals(),
            'listDokter' => DokterResourceController::fetchAllDokters()
        ];
    }

    // Mengambil data untuk halaman biaya pendaftaran.
    public static function getBiayaPendaftaranPageData()
    {
        return [
            'listPendaftaran' => PendaftaranController::fetchAllPendaftaran()
        ];
    }
}
