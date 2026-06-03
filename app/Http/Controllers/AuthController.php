<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        $title = 'Halaman Login | MedisGo ';
        return view('pages.auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role === 'dokter') {
                return redirect()->intended('/dokter/dashboard');
            } elseif ($user->role === 'pasien') {
                return redirect()->intended('/pasien/dashboard');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
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
