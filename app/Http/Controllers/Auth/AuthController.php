<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{
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

    public function updateSettings(Request $request)
    {
        $user = Auth::user();

        $rules = [
            'nama' => 'required|string|max:100',
            'email' => 'required|email|unique:user,email,' . $user->id_user . ',id_user',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|string|min:8|confirmed',
        ];

        // Role-specific validation rules
        if ($user->role === 'pasien') {
            $rules['nik'] = 'required|string|size:16|unique:pasien,nik,' . $user->id_user . ',id_user';
            $rules['no_hp'] = 'required|string|max:15';
            $rules['tgl_lahir'] = 'required|date';
            $rules['jenis_kelamin'] = 'required|in:Laki-laki,Perempuan';
            $rules['alamat'] = 'required|string';
        } elseif ($user->role === 'dokter') {
            $rules['spesialis'] = 'required|string|max:100';
        }

        $request->validate($rules);

        // Update User
        $user->nama = $request->nama;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $path = $file->store('uploads/profile', 'public');
            $user->foto_profil = $path;
        }

        $user->save();

        // Update Role specific profiles
        if ($user->role === 'pasien') {
            $pasien = $user->pasien;
            if (!$pasien) {
                $pasien = new Pasien(['id_user' => $user->id_user]);
            }
            $pasien->fill([
                'nik' => $request->nik,
                'no_hp' => $request->no_hp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tgl_lahir' => $request->tgl_lahir,
                'alamat' => $request->alamat,
            ]);
            $pasien->save();
        } elseif ($user->role === 'dokter') {
            $dokter = $user->dokter;
            if (!$dokter) {
                $dokter = new Dokter(['id_user' => $user->id_user]);
            }
            $dokter->fill([
                'spesialis' => $request->spesialis,
            ]);
            $dokter->save();
        }

        return redirect()->back()->with('success', 'Pengaturan akun berhasil diperbarui!');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:user,email',
        ], [
            'email.exists' => 'Email tidak terdaftar dalam sistem.',
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return back()->with('success', 'Link atur ulang kata sandi telah dikirim ke email Anda!');
        }

        return back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:user,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('ShowLogin')->with('success', 'Kata sandi Anda berhasil diperbarui! Silakan login.');
        }

        return back()->withErrors(['email' => __($status)]);
    }
}
