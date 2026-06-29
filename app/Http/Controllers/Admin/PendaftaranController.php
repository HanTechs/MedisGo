<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pendaftaran;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Method untuk mengambil semua data pendaftaran beserta relasinya
    public static function fetchAllPendaftaran()
    {
        return Pendaftaran::with(['pasien.user', 'jadwal.dokter.user'])->orderBy('created_at', 'desc')->get();
    }

    // Memperbarui status pembayaran pendaftaran
    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->status_pembayaran = 'Lunas';
        $pendaftaran->save();

        return redirect('/admin/biaya')->with('success', 'Pembayaran berhasil dikonfirmasi!');
    }
}
