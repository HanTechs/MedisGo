<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        $title = 'Halaman Login | MedisGo ';
        return view('pages.auth.login', compact('title'));
    }

    public function showRegister()
    {
        $title = 'Halaman Daftar | MedisGo ';
        return view('pages.auth.daftar', compact('title'));
    }

    public function showLupaPassword()
    {
        $title = 'Halaman Lupa Password | MedisGo ';
        return view('pages.auth.lupa-password', compact('title'));
    }

    public function showResetPassword()
    {
        $title = 'Halaman Reset Password | MedisGo ';
        return view('pages.auth.reset-password', compact('title'));
    }
}
