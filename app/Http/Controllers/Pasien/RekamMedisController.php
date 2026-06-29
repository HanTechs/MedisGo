<?php

namespace App\Http\Controllers\Pasien;

use App\Models\RekamMedis;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller
{
    public static function getRekamMedisPageData()
    {
        $userId = Auth::id();

        $listRekamMedis = RekamMedis::with(['pendaftaran.jadwal.dokter.user'])
            ->whereHas('pendaftaran', function ($query) use ($userId) {
                $query->where('id_user', $userId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return [
            'listRekamMedis' => $listRekamMedis
        ];
    }
}
