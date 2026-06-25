<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class ListLayananController extends Controller
{
    public function show()
    {
        $data = Layanan::get();

        $nama  = Array_column($data->toArray(), 'nama_layanan');
        $desc  = Array_column($data->toArray(), 'deskripsi');
        $harga = Array_column($data->toArray(), 'harga');

        return view('list_layanan', compact('nama', 'desc', 'harga'));
    }
}