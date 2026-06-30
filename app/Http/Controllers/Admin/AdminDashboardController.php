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

        $listHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        $hariMap = array_flip($listHari);
        $t = $hariMap[$hariIni] ?? -1;

        $totalJadwal = Jadwal::all()->filter(function ($jadwal) use ($hariMap, $t) {
            $a = $hariMap[$jadwal->hari_mulai] ?? -1;
            $b = $hariMap[$jadwal->hari_selesai] ?? -1;

            if ($a === -1 || $b === -1 || $t === -1) {
                return false;
            }

            if ($a <= $b) {
                return $t >= $a && $t <= $b;
            } else {
                return $t >= $a || $t <= $b;
            }
        })->count();

        $totalAntrean = Pendaftaran::whereDate('tgl_pendaftaran', Pendaftaran::getActiveDate())->count();

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
