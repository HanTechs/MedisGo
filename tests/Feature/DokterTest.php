<?php

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    // Create Dokter
    $this->dokterUser = User::create([
        'nama' => 'Dr. Andi',
        'email' => 'dokter@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'dokter',
    ]);
    $this->dokter = Dokter::create([
        'id_user' => $this->dokterUser->id_user,
        'spesialis' => 'Umum',
    ]);

    // Create Pasien
    $this->pasienUser = User::create([
        'nama' => 'Budi',
        'email' => 'pasien@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'pasien',
    ]);
    $this->pasien = Pasien::create([
        'id_user' => $this->pasienUser->id_user,
        'nik' => '1234567890123456',
        'no_hp' => '081234567890',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1995-01-01',
        'alamat' => 'Alamat Pasien',
    ]);

    // Create Jadwal for Dokter
    $this->jadwal = Jadwal::create([
        'id_user' => $this->dokterUser->id_user,
        'hari_mulai' => 'Senin',
        'hari_selesai' => 'Jumat',
        'jam_mulai' => '08:00',
        'jam_selesai' => '16:00',
        'kuota_maksimal' => 30,
    ]);
});

test('unauthorized users cannot access dokter dashboard', function () {
    // Guest
    $this->get('/dokter/dashboard')->assertRedirect('/login');

    // Patient
    $this->actingAs($this->pasienUser)->get('/dokter/dashboard')->assertStatus(403);
});

test('dokter can access dashboard and see patients queue', function () {
    // Create pendaftaran for today
    Pendaftaran::create([
        'id_user' => $this->pasienUser->id_user,
        'id_jadwal' => $this->jadwal->id_jadwal,
        'tgl_pendaftaran' => now()->toDateString(),
        'no_antrean' => 1,
        'keluhan' => 'Demam tinggi',
        'status_periksa' => 'Belum Diperiksa',
        'status_pembayaran' => 'Belum Lunas',
    ]);

    $response = $this->actingAs($this->dokterUser)->get('/dokter/dashboard');

    $response->assertStatus(200);
});

test('dokter can save patient exam results and generate medical record', function () {
    $pendaftaran = Pendaftaran::create([
        'id_user' => $this->pasienUser->id_user,
        'id_jadwal' => $this->jadwal->id_jadwal,
        'tgl_pendaftaran' => now()->toDateString(),
        'no_antrean' => 1,
        'keluhan' => 'Flu berat',
        'status_periksa' => 'Sedang Diperiksa',
        'status_pembayaran' => 'Belum Lunas',
    ]);

    $response = $this->actingAs($this->dokterUser)->post('/dokter/pemeriksaan/simpan', [
        'id_pendaftaran' => $pendaftaran->id_pendaftaran,
        'pemeriksaan' => 'Suhu tubuh 38C, tenggorokan merah',
        'diagnosa' => 'Pharyngitis',
        'tindakan' => 'Pemberian antibiotik dan pereda demam',
    ]);

    $response->assertRedirect(route('ShowDashboardDokter'));
    $response->assertSessionHas('success', 'Hasil pemeriksaan dan rekam medis pasien berhasil disimpan!');

    // Check pendaftaran status is updated to Selesai
    $this->assertDatabaseHas('pendaftaran', [
        'id_pendaftaran' => $pendaftaran->id_pendaftaran,
        'status_periksa' => 'Selesai',
    ]);

    // Check rekam medis record is created
    $this->assertDatabaseHas('rekam_medis', [
        'id_pendaftaran' => $pendaftaran->id_pendaftaran,
        'hasil_pemeriksaan' => 'Suhu tubuh 38C, tenggorokan merah',
        'diagnosa' => 'Pharyngitis',
        'tindakan' => 'Pemberian antibiotik dan pereda demam',
    ]);
});
