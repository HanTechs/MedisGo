<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function showDashboard()
    {
        $title = 'Halaman Pasien Dashboard | MedisGo ';
        return view('pages.pasien.dashboard_pasien', compact('title'));
    }

    public function showAntrean()
    {
        $title = 'Halaman Antrean Pasien | MedisGo ';
        return view('pages.pasien.antrean_pasien', compact('title'));
    }

    public function showRekamMedis()
    {
        $title = 'Halaman Rekam Medis Pasien | MedisGo ';
        return view('pages.pasien.rekam_pasien', compact('title'));
    }
}
