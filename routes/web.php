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
    Route::get('/daftar', 'showRegister')->name('ShowRegister');
    Route::get('/lupa', 'showLupaPassword')->name('ShowLupaPassword');
    Route::get('/reset', 'showResetPassword')->name('ShowResetPassword');
});


// Route Admin
Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('ShowDashboardAdmin');
    Route::get('/biaya', 'showBiayaPendaftaran')->name('ShowBiayaPendaftaranAdmin');
    Route::get('/dokters', 'showDokters')->name('ShowDoktersAdmin');
    Route::get('/pasiens', 'showPasiens')->name('ShowPasiensAdmin');
    Route::get('/jadwals', 'showJadwals')->name('ShowJadwalsAdmin');
});

// Route Dokter
Route::prefix('dokter')->controller(DokterController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('ShowDashboardDokter');
    Route::get('/jadwal', 'showJadwals')->name('ShowJadwalsDokter');
    Route::get('/riwayat', 'showDaftarRiwayatPasiens')->name('ShowDaftarRiwayatPasiensDokter');
    Route::get('/pemeriksaan', 'showPemeriksaans')->name('ShowPemeriksaansDokter');
});

// Route Pasien
Route::prefix('pasien')->controller(PasienController::class)->group(function () {
    Route::get('/dashboard', 'showDashboard')->name('ShowDashboardPasien');
    Route::get('/antrean', 'showAntrean')->name('ShowAntreanPasien');
    Route::get('/rekam', 'showRekamMedis')->name('ShowRekamMedisPasien');
});
