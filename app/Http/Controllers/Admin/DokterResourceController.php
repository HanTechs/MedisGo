<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokterResourceController extends Controller
{
    // Method untuk mengambil semua data dokter beserta relasinya
    public static function fetchAllDokters()
    {
        return User::with('dokter')->where('role', 'dokter')->get();
    }

    // Menyimpan data dokter baru
    public function store(Request $request)
    {
        $user = new User;
        $user->nama = $request->input('nama_dokter');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 'dokter';
        $user->save();

        $dokter = new Dokter;
        $dokter->id_user = $user->id_user;
        $dokter->spesialis = $request->input('spesialis');
        $dokter->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    // Memperbarui data dokter yang sudah ada
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->nama = $request->input('nama_dokter');
        $user->email = $request->input('email');
        if ($request->input('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        $dokter = Dokter::find($id);
        $dokter->spesialis = $request->input('spesialis');
        $dokter->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus data dokter
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
