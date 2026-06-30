<?php

namespace App\Http\Controllers\Pasien;

use App\Models\Pendaftaran;
use App\Models\RekamMedis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasienDashboardController extends Controller
{
    public static function getDashboardStats()
    {
        $userId = Auth::id();
        $today = Pendaftaran::getActiveDate();

        $totalKunjungan = Pendaftaran::where('id_user', $userId)->count();
        $antreanAktif = Pendaftaran::with(['jadwal.dokter.user'])
            ->where('id_user', $userId)
            ->where('tgl_pendaftaran', $today)
            ->where('status_periksa', 'Belum Diperiksa')
            ->first();

        // Antrean yang sedang dilayani saat ini (secara umum di klinik untuk jadwal yang sama)
        $sedangDilayani = null;
        $sisaAntrean = 0;

        if ($antreanAktif) {
            $sedangDilayani = Pendaftaran::where('id_jadwal', $antreanAktif->id_jadwal)
                ->where('tgl_pendaftaran', $today)
                ->where('status_periksa', 'Sedang Diperiksa')
                ->first();

            // Jika tidak ada yang sedang diperiksa, ambil yang terakhir selesai
            if (!$sedangDilayani) {
                $sedangDilayani = Pendaftaran::where('id_jadwal', $antreanAktif->id_jadwal)
                    ->where('tgl_pendaftaran', $today)
                    ->where('status_periksa', 'Selesai')
                    ->orderBy('no_antrean', 'desc')
                    ->first();
            }

            // Jika masih kosong (awal hari), ambil antrean pertama yang belum diperiksa
            if (!$sedangDilayani) {
                $sedangDilayani = Pendaftaran::where('id_jadwal', $antreanAktif->id_jadwal)
                    ->where('tgl_pendaftaran', $today)
                    ->where('status_periksa', 'Belum Diperiksa')
                    ->orderBy('no_antrean', 'asc')
                    ->first();
            }

            // Hitung sisa antrean
            $sisaAntrean = Pendaftaran::where('id_jadwal', $antreanAktif->id_jadwal)
                ->where('tgl_pendaftaran', $today)
                ->where('status_periksa', 'Belum Diperiksa')
                ->where('no_antrean', '<', $antreanAktif->no_antrean)
                ->count();
        }

        $rekamMedisTerbaru = RekamMedis::whereHas('pendaftaran', function ($query) use ($userId) {
            $query->where('id_user', $userId);
        })->latest()->first();

        return [
            'totalKunjungan' => $totalKunjungan,
            'antreanAktif' => $antreanAktif,
            'sedangDilayani' => $sedangDilayani,
            'sisaAntrean' => $sisaAntrean,
            'rekamMedisTerbaru' => $rekamMedisTerbaru,
        ];
    }
}
