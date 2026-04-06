<?php

use Illuminate\Support\Facades\Route;


// Routh Landing Page
Route::get('/{index?}', function () {
    $title = 'Landing Page | MedisGo ';
    return view('landing', compact('title'));
})->where('index', 'index|landing')->name('ShowLanding');


// Routh Auth
Route::get('/login', function () {
    $title = 'Login Page | MedisGo ';
    return view('pages.auth.login', compact('title'));
})->name('ShowLogin');

Route::get('/daftar', function () {
    $title = 'Daftar Page | MedisGo ';
    return view('pages.auth.daftar', compact('title'));
})->name('ShowRegister');

Route::get('/lupa', function () {
    $title = 'Lupa Password Page | MedisGo ';
    return view('pages.auth.lupa-password', compact('title'));
})->name('ShowLupaPassword');

Route::get('/reset', function () {
    $title = 'Reset Password Page | MedisGo ';
    return view('pages.auth.reset-password', compact('title'));
})->name('ShowResetPassword');


// Routh Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Dashboard Admin Page | MedisGo ';
        return view('pages.admin.dashboard_admin', compact('title'));
    })->name('ShowDashboardAdmin');
    Route::get('/bookings', function () {
        $title = 'Bookings Admin Page | MedisGo ';
        return view('pages.admin.bookings_admin', compact('title'));
    })->name('ShowBookingsAdmin');
    Route::get('/dokters', function () {
        $title = 'Dokters Admin Page | MedisGo ';
        return view('pages.admin.dokters_admin', compact('title'));
    })->name('ShowDoktersAdmin');
    Route::get('/pasiens', function () {
        $title = 'Pasiens Admin Page | MedisGo ';
        return view('pages.admin.pasiens_admin', compact('title'));
    })->name('ShowPasiensAdmin');
    Route::get('/jadwals', function () {
        $title = 'Jadwals Admin Page | MedisGo ';
        return view('pages.admin.jadwals_admin', compact('title'));
    })->name('ShowJadwalsAdmin');
});

// Routh Dokter
Route::prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Dashboard Dokter Page | MedisGo ';
        return view('pages.dokter.dashboard_dokter', compact('title'));
    })->name('ShowDashboardDokter');
    Route::get('/jadwal', function () {
        $title = 'Jadwal Dokter Page | MedisGo ';
        return view('pages.dokter.jadwals_dokter', compact('title'));
    })->name('ShowJadwalsDokter');
    Route::get('/pasien', function () {
        $title = 'Pasien Dokter Page | MedisGo ';
        return view('pages.dokter.pasiens_dokter', compact('title'));
    })->name('ShowPasiensDokter');
    Route::get('/pemeriksaan', function () {
        $title = 'Pemeriksaan Dokter Page | MedisGo ';
        return view('pages.dokter.pemeriksaan_dokter', compact('title'));
    })->name('ShowPemeriksaansDokter');
});

// Routh Pasien
Route::prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Dashboard Pasien Page | MedisGo ';
        return view('pages.pasien.dashboard_pasien', compact('title'));
    })->name('ShowDashboardPasien');
    Route::get('/antrean', function () {
        $title = 'Antrean Pasien Page | MedisGo ';
        return view('pages.pasien.antrean_pasien', compact('title'));
    })->name('ShowAntreanPasien');
    Route::get('/rekam', function () {
        $title = 'Rekam Medis Pasien Page | MedisGo ';
        return view('pages.pasien.rekam_pasien', compact('title'));
    })->name('ShowRekamMedisPasien');
});
