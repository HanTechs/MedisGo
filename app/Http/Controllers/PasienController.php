<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\DashboardInterface;

class PasienController extends Controller implements DashboardInterface
{
    public function showDashboard()
    {
        return $this->renderView('pages.pasien.dashboard_pasien', [], 'Halaman Pasien Dashboard');
    }

    public function showAntrean()
    {
        return $this->renderView('pages.pasien.antrean_pasien', [], 'Halaman Antrean Pasien');
    }

    public function showRekamMedis()
    {
        return $this->renderView('pages.pasien.rekam_pasien', [], 'Halaman Rekam Medis Pasien');
    }
}
