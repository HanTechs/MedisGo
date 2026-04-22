<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function showDashboard()
    {
        $title = 'Halaman Dokter Dashboard | MedisGo ';
        return view('pages.dokter.dashboard_dokter', compact('title'));
    }

    public function showJadwals()
    {
        $title = 'Halaman Jadwal Praktik | MedisGo ';
        return view('pages.dokter.jadwals_dokter', compact('title'));
    }

    public function showDaftarRiwayatPasiens()
    {
        $title = 'Halaman Daftar Riwayat Pasiens | MedisGo ';
        return view('pages.dokter.daftar_riwayat_pasiens_dokter', compact('title'));
    }

    public function showPemeriksaans()
    {
        $title = 'Halaman Pemeriksaan Pasien | MedisGo ';
        return view('pages.dokter.pemeriksaan_dokter', compact('title'));
    }
}
