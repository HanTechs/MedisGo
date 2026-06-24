<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class JadwalPraktikDokterController extends Controller
{
    // Mengambil data jadwal praktik untuk dokter yang sedang login
    public static function getJadwalData()
    {
        $doctorId = Auth::id();
        $listJadwal = Jadwal::where('id_user', $doctorId)->get();

        return [
            'listJadwal' => $listJadwal
        ];
    }
}
