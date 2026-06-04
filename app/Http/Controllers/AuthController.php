<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
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

    public function showResetPassword()
    {
        return $this->renderView('pages.auth.reset-password', [], 'Halaman Reset Password');
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
}
