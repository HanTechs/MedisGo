<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ListLayananController;


// Routh Landing Page
Route::get('/{index?}', function () {
    $title = 'Halaman Landing | MedisGo ';
    return view('pages.landing', compact('title'));
})->where('index', 'index|landing')->name('ShowLanding');


// Routh Auth
Route::get('/login', function () {
    $title = 'Halaman Login | MedisGo ';
    return view('pages.auth.login', compact('title'));
})->name('ShowLogin');

Route::get('/daftar', function () {
    $title = 'Halaman Daftar | MedisGo ';
    return view('pages.auth.daftar', compact('title'));
})->name('ShowRegister');

Route::get('/lupa', function () {
    $title = 'Halaman Lupa Password | MedisGo ';
    return view('pages.auth.lupa-password', compact('title'));
})->name('ShowLupaPassword');

Route::get('/reset', function () {
    $title = 'Halaman Reset Password | MedisGo ';
    return view('pages.auth.reset-password', compact('title'));
})->name('ShowResetPassword');


// Routh Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Halaman Admin Dashboard | MedisGo ';
        return view('pages.admin.dashboard_admin', compact('title'));
    })->name('ShowDashboardAdmin');
    Route::get('/biaya', function () {
        $title = 'Biaya Pendaftaran Page | MedisGo ';
        return view('pages.admin.biaya_pendaftaran_admin', compact('title'));
    })->name('ShowBiayaPendaftaranAdmin');
    Route::get('/dokters', function () {
        $title = 'Halaman Kelola Dokter | MedisGo ';
        return view('pages.admin.dokters_admin', compact('title'));
    })->name('ShowDoktersAdmin');
    Route::get('/pasiens', function () {
        $title = 'Halaman Kelola Pasiens | MedisGo ';
        return view('pages.admin.pasiens_admin', compact('title'));
    })->name('ShowPasiensAdmin');
    Route::get('/jadwals', function () {
        $title = 'Halaman Kelola Jadwals | MedisGo ';
        return view('pages.admin.jadwals_admin', compact('title'));
    })->name('ShowJadwalsAdmin');
});

// Routh Dokter
Route::prefix('dokter')->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Halaman Dokter Dashboard | MedisGo ';
        return view('pages.dokter.dashboard_dokter', compact('title'));
    })->name('ShowDashboardDokter');
    Route::get('/jadwal', function () {
        $title = 'Halaman Jadwal Praktik | MedisGo ';
        return view('pages.dokter.jadwals_dokter', compact('title'));
    })->name('ShowJadwalsDokter');
    Route::get('/riwayat', function () {
        $title = 'Halaman Daftar Riwayat Pasiens | MedisGo ';
        return view('pages.dokter.daftar_riwayat_pasiens_dokter', compact('title'));
    })->name('ShowDaftarRiwayatPasiensDokter');
    Route::get('/pemeriksaan', function () {
        $title = 'Halaman Pemeriksaan Pasien | MedisGo ';
        return view('pages.dokter.pemeriksaan_dokter', compact('title'));
    })->name('ShowPemeriksaansDokter');
});
// Routh Admin Dokter (CRUD)
Route::delete('/admin/dokter/{id}', [DokterController::class, 'delete'])->name('dokter.delete');
Route::get('/admin/dokter/{id}/edit', [DokterController::class, 'edit'])->name('dokter.edit');
Route::put('/admin/dokter/{id}', [DokterController::class, 'update'])->name('dokter.update');

// Routh Pasien
Route::prefix('pasien')->group(function () {
    Route::get('/dashboard', function () {
        $title = 'Halaman Pasien Dashboard | MedisGo ';
        return view('pages.pasien.dashboard_pasien', compact('title'));
    })->name('ShowDashboardPasien');
    Route::get('/antrean', function () {
        $title = 'Halaman Antrean Pasien | MedisGo ';
        return view('pages.pasien.antrean_pasien', compact('title'));
    })->name('ShowAntreanPasien');
    Route::get('/rekam', function () {
        $title = 'Halaman Rekam Medis Pasien | MedisGo ';
        return view('pages.pasien.rekam_pasien', compact('title'));
    })->name('ShowRekamMedisPasien');
});
