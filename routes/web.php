<?php

use Illuminate\Support\Facades\Route;

Route::get('/{index?}', function () {
    $title = 'Landing Page | MedisGo ';
    return view('landing', compact('title'));
})->where('index', 'index|landing')->name('ShowLanding');


Route::get('/login', function () {
    $title = 'Login Page | MedisGo ';
    return view('pages.auth.login', compact('title'));
})->name('ShowLogin');

Route::get('/daftar', function () {
    $title = 'Daftar Page | MedisGo ';
    return view('pages.auth.daftar', compact('title'));
})->name('ShowRegister');

Route::get('/test', function () {
    $title = 'Test Page | MedisGo ';
    return view('pages.pasien.test', compact('title'));
})->name('ShowTest');
