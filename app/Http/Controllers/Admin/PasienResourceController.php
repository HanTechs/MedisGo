<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Pasien;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PasienResourceController extends Controller
{
    // Method untuk mengambil semua data pasien beserta relasinya
    public static function fetchAllPasiens()
    {
        return User::with('pasien')->where('role', 'pasien')->get();
    }

    // Menyimpan data pasien baru
    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->input('nama_pasien');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'pasien';
        $user->save();

        $pasien = new Pasien;
        $pasien->id_user = $user->id_user;
        $pasien->nik = $request->input('nik');
        $pasien->no_hp = $request->input('no_hp');
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        $pasien->tgl_lahir = $request->input('tgl_lahir');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    // Memperbarui data pasien yang sudah ada
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->nama = $request->input('nama_pasien');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        $pasien = Pasien::find($id);
        $pasien->nik = $request->input('nik');
        $pasien->no_hp = $request->input('no_hp');
        $pasien->jenis_kelamin = $request->input('jenis_kelamin');
        $pasien->tgl_lahir = $request->input('tgl_lahir');
        $pasien->alamat = $request->input('alamat');
        $pasien->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus data pasien
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
