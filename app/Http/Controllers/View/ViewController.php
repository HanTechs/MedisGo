<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Pasien\PasienDashboardController;
use App\Http\Controllers\Pasien\AntreanController;
use App\Http\Controllers\Pasien\RekamMedisController;
use App\Http\Controllers\Dokter\DokterDashboardController;
use App\Http\Controllers\Dokter\JadwalPraktikDokterController;
use App\Http\Controllers\Dokter\DaftarRiwayatPasienController;
use App\Http\Controllers\Dokter\PemeriksaanPasienController;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    // Landing Page
    public function showLanding()
    {
        return $this->renderView('pages.landing', [], 'Halaman Landing');
    }

    // Auth
    public function showLogin()
    {
        return $this->renderView('pages.auth.login', [], 'Halaman Login');
    }

    public function showRegister()
    {
        return $this->renderView('pages.auth.daftar', [], 'Halaman Daftar');
    }

    public function showLupaPassword()
    {
        return $this->renderView('pages.auth.lupa-password', [], 'Halaman Lupa Password');
    }

    public function showResetPassword(Request $request)
    {
        return $this->renderView('pages.auth.reset-password', [
            'token' => $request->query('token'),
            'email' => $request->query('email')
        ], 'Halaman Reset Password');
    }

    // Admin
    public function showDashboardAdmin()
    {
        $stats = AdminDashboardController::getDashboardStats();

        return $this->renderView('pages.admin.dashboard_admin', $stats, 'Halaman Admin Dashboard');
    }

    public function showBiayaPendaftaranAdmin()
    {
        $data = AdminDashboardController::getBiayaPendaftaranPageData();

        return $this->renderView('pages.admin.biaya_pendaftaran_admin', $data, 'Halaman Biaya Pendaftaran');
    }

    public function showDoktersAdmin()
    {
        $data = AdminDashboardController::getDoktersPageData();
        return $this->renderView('pages.admin.dokters_admin', $data, 'Halaman Kelola Dokter');
    }

    public function showPasiensAdmin()
    {
        $data = AdminDashboardController::getPasiensPageData();
        return $this->renderView('pages.admin.pasiens_admin', $data, 'Halaman Kelola Pasien');
    }

    public function showJadwalsAdmin()
    {
        $data = AdminDashboardController::getJadwalsPageData();
        return $this->renderView('pages.admin.jadwals_admin', $data, 'Halaman Kelola Jadwal');
    }

    // Dokter
    public function showDashboardDokter()
    {
        $data = DokterDashboardController::getDashboardStats();
        return $this->renderView('pages.dokter.dashboard_dokter', $data, 'Halaman Dokter Dashboard');
    }

    public function showJadwalsDokter()
    {
        $data = JadwalPraktikDokterController::getJadwalData();
        return $this->renderView('pages.dokter.jadwals_dokter', $data, 'Halaman Jadwal Praktik');
    }

    public function showDaftarRiwayatPasiensDokter()
    {
        $data = DaftarRiwayatPasienController::getRiwayatData();
        return $this->renderView('pages.dokter.daftar_riwayat_pasiens_dokter', $data, 'Halaman Daftar Riwayat Pasiens');
    }

    public function showPemeriksaansDokter(Request $request)
    {
        $data = PemeriksaanPasienController::getPemeriksaanData($request);

        if (!$data) {
            return redirect()->route('ShowDashboardDokter')->with('error', 'Tidak ada pasien dalam antrean untuk diperiksa.');
        }

        return $this->renderView('pages.dokter.pemeriksaan_dokter', $data, 'Halaman Pemeriksaan Pasien');
    }

    // Pasien
    public function showDashboardPasien()
    {
        $data = PasienDashboardController::getDashboardStats();
        return $this->renderView('pages.pasien.dashboard_pasien', $data, 'Halaman Pasien Dashboard');
    }

    public function showAntreanPasien()
    {
        $data = AntreanController::getAntreanPageData();
        return $this->renderView('pages.pasien.antrean_pasien', $data, 'Halaman Antrean Pasien');
    }

    public function showRekamMedisPasien()
    {
        $data = RekamMedisController::getRekamMedisPageData();
        return $this->renderView('pages.pasien.rekam_pasien', $data, 'Halaman Rekam Medis Pasien');
    }

    // Settings page 
    public function showSettings()
    {
        $user = auth()->user();

        if ($user->role === 'pasien') {
            $user->load('pasien');
        } elseif ($user->role === 'dokter') {
            $user->load('dokter');
        }

        return $this->renderView('pages.setting-pages', ['user' => $user], 'Pengaturan Akun');
    }
}
