<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use App\Interfaces\DashboardInterface;

class AdminController extends Controller implements DashboardInterface
{
    private $listDokter;
    private $listPasien;
    private $listJadwal;

    private function fetchDokters()
    {
        $this->listDokter = User::with('dokter')->where('role', 'dokter')->get();
    }

    private function fetchPasiens()
    {
        $this->listPasien = User::with('pasien')->where('role', 'pasien')->get();
    }

    private function fetchJadwals()
    {
        $this->listJadwal = Jadwal::with('dokter')->get();
    }
    public function showDashboard()
    {
        return $this->renderView('pages.admin.dashboard_admin', [], 'Halaman Admin Dashboard');
    }

    public function showBiayaPendaftaran()
    {
        return $this->renderView('pages.admin.biaya_pendaftaran_admin', [], 'Halaman Biaya Pendaftaran');
    }

    public function showDokters()
    {
        $this->fetchDokters();
        return $this->renderView('pages.admin.dokters_admin', ['listDokter' => $this->listDokter], 'Halaman Kelola Dokter');
    }

    public function showPasiens()
    {
        $this->fetchPasiens();
        return $this->renderView('pages.admin.pasiens_admin', ['listPasien' => $this->listPasien], 'Halaman Kelola Pasien');
    }

    public function showJadwals()
    {
        $this->fetchJadwals();
        $this->fetchDokters();
        return $this->renderView('pages.admin.jadwals_admin', [
            'listJadwal' => $this->listJadwal,
            'listDokter' => $this->listDokter
        ], 'Halaman Kelola Jadwal');
    }

    //Kelola Dokter
    public function tambahDokter(Request $request)
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

    public function updateDokter(Request $request, $id)
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

    public function hapusDokter($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    // Kelola Pasien
    public function tambahPasien(Request $request)
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

    public function updatePasien(Request $request, $id)
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

    public function hapusPasien($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    // Kelola Jadwal
    public function tambahJadwal(Request $request)
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

    public function updateJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->id_user = $request->input('id_user');
        $jadwal->hari_mulai = $request->input('hari_mulai');
        $jadwal->hari_selesai = $request->input('hari_selesai');
        $jadwal->jam_mulai = $request->input('jam_mulai');
        $jadwal->jam_selesai = $request->input('jam_selesai');
        $jadwal->kuota_maksimal = $request->input('kuota_maksimal');
        $jadwal->save();

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function hapusJadwal($id)
    {
        $jadwal = Jadwal::find($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
