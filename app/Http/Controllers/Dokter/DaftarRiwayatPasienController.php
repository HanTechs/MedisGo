<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class DaftarRiwayatPasienController extends Controller
{
    // Mengambil data pasien yang pernah diperiksa oleh dokter yang sedang login
    public static function getRiwayatData()
    {
        $doctorId = Auth::id();

        // Ambil pasien yang pernah mendaftar di jadwal dokter ini dan status pemeriksaannya selesai
        $listPasien = Pasien::whereHas('pendaftaran', function ($q) use ($doctorId) {
            $q->whereHas('jadwal', function ($q2) use ($doctorId) {
                $q2->where('id_user', $doctorId);
            })->where('status_periksa', 'Selesai');
        })
            ->with(['user', 'pendaftaran' => function ($q) use ($doctorId) {
                // load pendaftaran yang selesai dan memiliki rekam medis
                $q->where('status_periksa', 'Selesai')
                    ->whereHas('jadwal', function ($q2) use ($doctorId) {
                        $q2->where('id_user', $doctorId);
                    })
                    ->with('rekamMedis')
                    ->orderBy('tgl_pendaftaran', 'desc');
            }])
            ->get();

        // Cari diagnosa terakhir untuk masing-masing pasien
        foreach ($listPasien as $pasien) {
            $lastPendaftaran = $pasien->pendaftaran->first();
            $pasien->diagnosa_terakhir = ($lastPendaftaran && $lastPendaftaran->rekamMedis)
                ? $lastPendaftaran->rekamMedis->diagnosa
                : 'Tidak ada diagnosa';
        }

        return [
            'listPasien' => $listPasien
        ];
    }
}
