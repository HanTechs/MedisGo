<?php

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    // Create Pasien
    $this->pasienUser = User::create([
        'nama' => 'Budi Santoso',
        'email' => 'pasien@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'pasien',
    ]);
    $this->pasien = Pasien::create([
        'id_user' => $this->pasienUser->id_user,
        'nik' => '1234567890123456',
        'no_hp' => '081234567890',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1995-05-20',
        'alamat' => 'Jl. Merdeka No. 123',
    ]);

    // Create Dokter and Jadwal
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
    $this->jadwal = Jadwal::create([
        'id_user' => $this->dokterUser->id_user,
        'hari_mulai' => 'Senin',
        'hari_selesai' => 'Jumat',
        'jam_mulai' => '08:00',
        'jam_selesai' => '16:00',
        'kuota_maksimal' => 30,
    ]);
});

test('unauthorized users cannot access pasien pages', function () {
    // Guest
    $this->get('/pasien/dashboard')->assertRedirect('/login');

    // Dokter
    $this->actingAs($this->dokterUser)->get('/pasien/dashboard')->assertStatus(403);
});

test('pasien can access dashboard and see profile summary', function () {
    $response = $this->actingAs($this->pasienUser)->get('/pasien/dashboard');

    $response->assertStatus(200);
});

test('pasien can register for queue and get queue number', function () {
    $response = $this->actingAs($this->pasienUser)->post('/pasien/antrean', [
        'id_jadwal' => $this->jadwal->id_jadwal,
        'keluhan' => 'Sakit kepala hebat dan demam',
    ]);

    $response->assertRedirect(route('ShowDashboardPasien'));
    $response->assertSessionHas('success');

    $this->assertDatabaseHas('pendaftaran', [
        'id_user' => $this->pasienUser->id_user,
        'id_jadwal' => $this->jadwal->id_jadwal,
        'tgl_pendaftaran' => now()->toDateString(),
        'no_antrean' => 1,
        'keluhan' => 'Sakit kepala hebat dan demam',
        'status_periksa' => 'Belum Diperiksa',
        'status_pembayaran' => 'Belum Lunas',
    ]);
});

test('pasien cannot register twice for same schedule on same day', function () {
    // First registration
    Pendaftaran::create([
        'id_user' => $this->pasienUser->id_user,
        'id_jadwal' => $this->jadwal->id_jadwal,
        'tgl_pendaftaran' => now()->toDateString(),
        'no_antrean' => 1,
        'keluhan' => 'Sakit perut',
        'status_periksa' => 'Belum Diperiksa',
        'status_pembayaran' => 'Belum Lunas',
    ]);

    // Second registration attempt
    $response = $this->actingAs($this->pasienUser)->post('/pasien/antrean', [
        'id_jadwal' => $this->jadwal->id_jadwal,
        'keluhan' => 'Sakit kepala',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('error', 'Anda sudah terdaftar di jadwal ini untuk hari ini.');

    // Assert that only 1 record exists
    $this->assertEquals(1, Pendaftaran::where('id_user', $this->pasienUser->id_user)->count());
});
