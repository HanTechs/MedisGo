<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;


// Route Landing Page
Route::get('/{index?}', [LandingController::class, 'index'])
    ->where('index', 'index|landing')
    ->name('ShowLanding');


// Route Auth
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('ShowLogin');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/daftar', 'showRegister')->name('ShowRegister');
    Route::get('/lupa', 'showLupaPassword')->name('ShowLupaPassword');
    Route::get('/reset', 'showResetPassword')->name('ShowResetPassword');
});


// Route Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('ShowDashboardAdmin');
    Route::get('/biaya', 'showBiayaPendaftaran')->name('ShowBiayaPendaftaranAdmin');

    // Kelola Dokter
    Route::get('/dokters', 'showDokters')->name('ShowDoktersAdmin');
    Route::post('/dokters', 'tambahDokter')->name('TambahDokterAdmin');
    Route::put('/dokters/{id}', 'updateDokter')->name('UpdateDokterAdmin');
    Route::delete('/dokters/{id}', 'hapusDokter')->name('HapusDokterAdmin');

    // Kelola Pasien
    Route::get('/pasiens', 'showPasiens')->name('ShowPasiensAdmin');
    Route::post('/pasiens', 'tambahPasien')->name('TambahPasienAdmin');
    Route::put('/pasiens/{id}', 'updatePasien')->name('UpdatePasienAdmin');
    Route::delete('/pasiens/{id}', 'hapusPasien')->name('HapusPasienAdmin');

    Route::get('/jadwals', 'showJadwals')->name('ShowJadwalsAdmin');
    Route::post('/jadwals', 'tambahJadwal')->name('tambahJadwalAdmin');
    Route::put('/jadwals/{id}', 'updateJadwal')->name('UpdateJadwalAdmin');
    Route::delete('/jadwals/{id}', 'hapusJadwal')->name('HapusJadwalAdmin');
});

// Route Dokter
Route::middleware(['auth', 'dokter'])->prefix('dokter')->controller(DokterController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('ShowDashboardDokter');
    Route::get('/jadwal', 'showJadwals')->name('ShowJadwalsDokter');
    Route::get('/riwayat', 'showDaftarRiwayatPasiens')->name('ShowDaftarRiwayatPasiensDokter');
    Route::get('/pemeriksaan', 'showPemeriksaans')->name('ShowPemeriksaansDokter');
});

// Route Pasien
Route::middleware(['auth', 'pasien'])->prefix('pasien')->controller(PasienController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('ShowDashboardPasien');
    Route::get('/antrean', 'showAntrean')->name('ShowAntreanPasien');
    Route::get('/rekam', 'showRekamMedis')->name('ShowRekamMedisPasien');
});
