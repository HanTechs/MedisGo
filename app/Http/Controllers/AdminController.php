<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showDashboard()
    {
        $title = 'Halaman Admin Dashboard | MedisGo ';
        return view('pages.admin.dashboard_admin', compact('title'));
    }

    public function showBiayaPendaftaran()
    {
        $title = 'Biaya Pendaftaran Page | MedisGo ';
        return view('pages.admin.biaya_pendaftaran_admin', compact('title'));
    }

    public function showDokters()
    {
        $title = 'Halaman Kelola Dokter | MedisGo ';
        return view('pages.admin.dokters_admin', compact('title'));
    }

    public function showPasiens()
    {
        $title = 'Halaman Kelola Pasiens | MedisGo ';
        return view('pages.admin.pasiens_admin', compact('title'));
    }

    public function showJadwals()
    {
        $title = 'Halaman Kelola Jadwals | MedisGo ';
        return view('pages.admin.jadwals_admin', compact('title'));
    }
}
