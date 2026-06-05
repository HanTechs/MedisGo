<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Pasien;
use Illuminate\Support\Facades\Hash;

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

    public function register(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required|string|max:100',
            'nik' => 'required|string|size:16|unique:pasien,nik',
            'no_hp' => 'required|string|max:15',
            'tgl_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'email' => 'required|email|unique:user,email',
            'alamat' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'nama' => $request->nama_pasien,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pasien',
        ]);

        Pasien::create([
            'id_user' => $user->id_user,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
        ]);

        Auth::login($user);

        return redirect()->route('ShowLogin')->with('success', 'Registrasi berhasil!');
    }
}
