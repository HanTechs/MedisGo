<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DashboardInterface;

class DokterController extends Controller implements DashboardInterface
{
    public function showDashboard()
    {
        return $this->renderView('pages.dokter.dashboard_dokter', [], 'Halaman Dokter Dashboard');
    }

    public function showJadwals()
    {
        return $this->renderView('pages.dokter.jadwals_dokter', [], 'Halaman Jadwal Praktik');
    }

    public function showDaftarRiwayatPasiens()
    {
        return $this->renderView('pages.dokter.daftar_riwayat_pasiens_dokter', [], 'Halaman Daftar Riwayat Pasiens');
    }

    public function showPemeriksaans()
    {
        return $this->renderView('pages.dokter.pemeriksaan_dokter', [], 'Halaman Pemeriksaan Pasien');
    }
}
