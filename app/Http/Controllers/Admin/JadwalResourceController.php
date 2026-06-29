<?php

namespace App\Http\Controllers\Admin;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JadwalResourceController extends Controller
{
    // Method untuk mengambil semua data jadwal beserta relasinya
    public static function fetchAllJadwals()
    {
        return Jadwal::with('dokter')->get();
    }

    // Menyimpan data jadwal baru
    public function store(Request $request)
    {
        $jadwal = new Jadwal;
        $jadwal->id_user = $request->input('id_user');
        $jadwal->hari_mulai = $request->input('hari_mulai');
        $jadwal->hari_selesai = $request->input('hari_selesai');
        $jadwal->jam_mulai = $request->input('jam_mulai');
        $jadwal->jam_selesai = $request->input('jam_selesai');
        $jadwal->kuota_maksimal = $request->input('kuota_maksimal');
        $jadwal->save();

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    // Memperbarui data jadwal yang sudah ada
    public function update(Request $request, string $id)
    {
        $jadwal = Jadwal::find($id);
        if ($jadwal) {
            $jadwal->id_user = $request->input('id_user');
            $jadwal->hari_mulai = $request->input('hari_mulai');
            $jadwal->hari_selesai = $request->input('hari_selesai');
            $jadwal->jam_mulai = $request->input('jam_mulai');
            $jadwal->jam_selesai = $request->input('jam_selesai');
            $jadwal->kuota_maksimal = $request->input('kuota_maksimal');
            $jadwal->save();
        }

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    // Menghapus data jadwal

    public function destroy(string $id)
    {
        $jadwal = Jadwal::find($id);
        if ($jadwal) {
            $jadwal->delete();
        }

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
