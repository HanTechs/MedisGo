<?php

use App\Http\Controllers\Admin\DokterResourceController;
use App\Http\Controllers\Admin\PasienResourceController;
use App\Http\Controllers\Admin\PendaftaranController;
use App\Http\Controllers\Admin\JadwalResourceController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Pasien\AntreanController;
use App\Http\Controllers\View\ViewController;
use App\Http\Controllers\Validation\ValidationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ListLayananController;


// Route Landing Page
Route::get('/{index?}', [ViewController::class, 'showLanding'])
    ->where('index', 'index|landing')
    ->name('ShowLanding');


// Route Auth
Route::controller(ViewController::class)->group(function () {
    Route::get('/login', 'showLogin')->name('ShowLogin');
    Route::get('/daftar', 'showRegister')->name('ShowRegister');
    Route::get('/lupa', 'showLupaPassword')->name('ShowLupaPassword');
    Route::get('/reset', 'showResetPassword')->name('password.reset');
});

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
    Route::post('/daftar', 'register')->name('Register');
    Route::post('/lupa', 'sendResetLinkEmail')->name('password.email');
    Route::post('/reset', 'resetPassword')->name('password.update');
});
// Routh Admin Dokter (CRUD)
Route::delete('/admin/dokter/{id}', [DokterController::class, 'delete'])->name('dokter.delete');
Route::get('/admin/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/admin/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');

Route::post('/validate/login', [ValidationController::class, 'validateLogin'])->name('validate.login');


// Route Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::controller(ViewController::class)->group(function () {
        Route::get('/dashboard', 'showDashboardAdmin')->name('ShowDashboardAdmin');
        Route::get('/biaya', 'showBiayaPendaftaranAdmin')->name('ShowBiayaPendaftaranAdmin');
        Route::get('/dokters', 'showDoktersAdmin')->name('ShowDoktersAdmin');
        Route::get('/pasiens', 'showPasiensAdmin')->name('ShowPasiensAdmin');
        Route::get('/jadwals', 'showJadwalsAdmin')->name('ShowJadwalsAdmin');
    });

    // Kelola Dokter
    Route::resource('dokters', DokterResourceController::class)->names([
        'store' => 'TambahDokterAdmin',
        'update' => 'UpdateDokterAdmin',
        'destroy' => 'HapusDokterAdmin',
    ])->only(['store', 'update', 'destroy']);

    // Kelola Pasien
    Route::resource('pasiens', PasienResourceController::class)->names([
        'store' => 'TambahPasienAdmin',
        'update' => 'UpdatePasienAdmin',
        'destroy' => 'HapusPasienAdmin',
    ])->only(['store', 'update', 'destroy']);

    // Kelola Jadwal
    Route::resource('jadwals', JadwalResourceController::class)->names([
        'store' => 'tambahJadwalAdmin',
        'update' => 'UpdateJadwalAdmin',
        'destroy' => 'HapusJadwalAdmin',
    ])->only(['store', 'update', 'destroy']);

    // Konfirmasi Pembayaran
    Route::patch('/biaya/konfirmasi/{id}', [PendaftaranController::class, 'update'])->name('KonfirmasiPembayaranAdmin');
});

use App\Http\Controllers\Dokter\PemeriksaanPasienController;

// Route Dokter
Route::middleware(['auth', 'dokter'])->prefix('dokter')->group(function () {
    Route::controller(ViewController::class)->group(function () {
        Route::get('/dashboard', 'showDashboardDokter')->name('ShowDashboardDokter');
        Route::get('/jadwal', 'showJadwalsDokter')->name('ShowJadwalsDokter');
        Route::get('/riwayat', 'showDaftarRiwayatPasiensDokter')->name('ShowDaftarRiwayatPasiensDokter');
        Route::get('/pemeriksaan', 'showPemeriksaansDokter')->name('ShowPemeriksaansDokter');
    });

    Route::post('/pemeriksaan/simpan', [PemeriksaanPasienController::class, 'simpanPemeriksaan'])->name('SimpanPemeriksaanDokter');
});

// Route Pasien
Route::middleware(['auth', 'pasien'])->prefix('pasien')->group(function () {
    Route::controller(ViewController::class)->group(function () {
        Route::get('/dashboard', 'showDashboardPasien')->name('ShowDashboardPasien');
        Route::get('/antrean', 'showAntreanPasien')->name('ShowAntreanPasien');
        Route::get('/rekam', 'showRekamMedisPasien')->name('ShowRekamMedisPasien');
    });

    Route::post('/antrean', [AntreanController::class, 'store'])->name('TambahAntreanPasien');
});

// Route Settings (Aksesibel untuk semua user yang login)
Route::middleware(['auth'])->group(function () {
    Route::get('/settings', [ViewController::class, 'showSettings'])->name('ShowSettings');
    Route::post('/settings', [AuthController::class, 'updateSettings'])->name('UpdateSettings');
});
