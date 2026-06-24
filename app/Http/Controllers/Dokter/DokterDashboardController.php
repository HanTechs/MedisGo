<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Auth;

class DokterDashboardController extends Controller
{
    // Mengambil statistik dan antrean untuk dashboard dokter
    public static function getDashboardStats()
    {
        $doctorId = Auth::id();
        $today = now()->toDateString();

        // Total pasien terdaftar hari ini untuk dokter ini
        $totalPasien = Pendaftaran::whereHas('jadwal', function ($q) use ($doctorId) {
            $q->where('id_user', $doctorId);
        })->whereDate('tgl_pendaftaran', $today)->count();

        // Pasien menunggu (Belum Diperiksa atau Sedang Diperiksa)
        $menunggu = Pendaftaran::whereHas('jadwal', function ($q) use ($doctorId) {
            $q->where('id_user', $doctorId);
        })->whereDate('tgl_pendaftaran', $today)
          ->whereIn('status_periksa', ['Belum Diperiksa', 'Sedang Diperiksa'])
          ->count();

        // Pasien selesai diperiksa
        $selesai = Pendaftaran::whereHas('jadwal', function ($q) use ($doctorId) {
            $q->where('id_user', $doctorId);
        })->whereDate('tgl_pendaftaran', $today)
          ->where('status_periksa', 'Selesai')
          ->count();

        // Pasien berikutnya yang menunggu giliran
        $pasienBerikutnya = Pendaftaran::with(['pasien.user'])
            ->whereHas('jadwal', function ($q) use ($doctorId) {
                $q->where('id_user', $doctorId);
            })->whereDate('tgl_pendaftaran', $today)
            ->where('status_periksa', 'Belum Diperiksa')
            ->orderBy('no_antrean', 'asc')
            ->first();

        // Daftar antrean hari ini
        $antreanHariIni = Pendaftaran::with(['pasien.user'])
            ->whereHas('jadwal', function ($q) use ($doctorId) {
                $q->where('id_user', $doctorId);
            })->whereDate('tgl_pendaftaran', $today)
            ->orderBy('no_antrean', 'asc')
            ->get();

        // Terjemahan hari dan tanggal ke Bahasa Indonesia
        $days = [
            'Sunday' => 'Minggu',
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            'Saturday' => 'Sabtu'
        ];
        $months = [
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        ];
        
        $currentDayName = $days[date('l')];
        $currentMonthName = $months[date('F')];
        $hariIni = $currentDayName . ', ' . date('d') . ' ' . $currentMonthName . ' ' . date('Y');

        return [
            'totalPasien' => $totalPasien,
            'menunggu' => $menunggu,
            'selesai' => $selesai,
            'pasienBerikutnya' => $pasienBerikutnya,
            'antreanHariIni' => $antreanHariIni,
            'hariIni' => $hariIni
        ];
    }
}
