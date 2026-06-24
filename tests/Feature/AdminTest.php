<?php

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Jadwal;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    $this->admin = User::create([
        'nama' => 'Admin User',
        'email' => 'admin@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'admin',
    ]);
});

test('unauthorized users cannot access admin dashboard', function () {
    // Guest
    $this->get('/admin/dashboard')->assertRedirect('/login');

    // Patient
    $pasien = User::create([
        'nama' => 'Pasien User',
        'email' => 'pasien@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'pasien',
    ]);
    $this->actingAs($pasien)->get('/admin/dashboard')->assertStatus(403);
});

test('admin can access dashboard and see stats', function () {
    $response = $this->actingAs($this->admin)->get('/admin/dashboard');

    $response->assertStatus(200);
    $response->assertViewHas('totalDokter', 0);
    $response->assertViewHas('totalPasien', 0);
});

test('admin can manage dokters', function () {
    // Store
    $response = $this->actingAs($this->admin)->post('/admin/dokters', [
        'nama_dokter' => 'Dr. Budi',
        'email' => 'drbudi@medisgo.com',
        'password' => 'password123',
        'spesialis' => 'Kandungan',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('user', [
        'email' => 'drbudi@medisgo.com',
        'role' => 'dokter',
    ]);

    $dokterUser = User::where('email', 'drbudi@medisgo.com')->first();
    $this->assertDatabaseHas('dokter', [
        'id_user' => $dokterUser->id_user,
        'spesialis' => 'Kandungan',
    ]);

    // Update
    $response = $this->actingAs($this->admin)->put("/admin/dokters/{$dokterUser->id_user}", [
        'nama_dokter' => 'Dr. Budi Updated',
        'email' => 'drbudi_new@medisgo.com',
        'spesialis' => 'Anak',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('user', [
        'id_user' => $dokterUser->id_user,
        'nama' => 'Dr. Budi Updated',
        'email' => 'drbudi_new@medisgo.com',
    ]);
    $this->assertDatabaseHas('dokter', [
        'id_user' => $dokterUser->id_user,
        'spesialis' => 'Anak',
    ]);

    // Delete
    $response = $this->actingAs($this->admin)->delete("/admin/dokters/{$dokterUser->id_user}");

    $response->assertRedirect();
    $this->assertDatabaseMissing('user', [
        'id_user' => $dokterUser->id_user,
    ]);
    $this->assertDatabaseMissing('dokter', [
        'id_user' => $dokterUser->id_user,
    ]);
});

test('admin can manage pasiens', function () {
    // Store
    $response = $this->actingAs($this->admin)->post('/admin/pasiens', [
        'nama_pasien' => 'Pasien A',
        'email' => 'pasiena@medisgo.com',
        'password' => 'password123',
        'nik' => '1234567890123456',
        'no_hp' => '0812345678',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1990-01-01',
        'alamat' => 'Alamat A',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('user', [
        'email' => 'pasiena@medisgo.com',
        'role' => 'pasien',
    ]);

    $pasienUser = User::where('email', 'pasiena@medisgo.com')->first();
    $this->assertDatabaseHas('pasien', [
        'id_user' => $pasienUser->id_user,
        'nik' => '1234567890123456',
    ]);

    // Update
    $response = $this->actingAs($this->admin)->put("/admin/pasiens/{$pasienUser->id_user}", [
        'nama_pasien' => 'Pasien A Updated',
        'email' => 'pasiena_new@medisgo.com',
        'nik' => '9876543210123456',
        'no_hp' => '0898765432',
        'jenis_kelamin' => 'Perempuan',
        'tgl_lahir' => '1995-05-05',
        'alamat' => 'Alamat A Updated',
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('user', [
        'id_user' => $pasienUser->id_user,
        'nama' => 'Pasien A Updated',
    ]);
    $this->assertDatabaseHas('pasien', [
        'id_user' => $pasienUser->id_user,
        'nik' => '9876543210123456',
    ]);

    // Delete
    $response = $this->actingAs($this->admin)->delete("/admin/pasiens/{$pasienUser->id_user}");

    $response->assertRedirect();
    $this->assertDatabaseMissing('user', [
        'id_user' => $pasienUser->id_user,
    ]);
    $this->assertDatabaseMissing('pasien', [
        'id_user' => $pasienUser->id_user,
    ]);
});

test('admin can manage jadwals', function () {
    // Create a Dokter first
    $dokterUser = User::create([
        'nama' => 'Dr. Sarah',
        'email' => 'sarah@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'dokter',
    ]);
    Dokter::create([
        'id_user' => $dokterUser->id_user,
        'spesialis' => 'Gigi',
    ]);

    // Store Jadwal
    $response = $this->actingAs($this->admin)->post('/admin/jadwals', [
        'id_user' => $dokterUser->id_user,
        'hari_mulai' => 'Senin',
        'hari_selesai' => 'Rabu',
        'jam_mulai' => '09:00',
        'jam_selesai' => '12:00',
        'kuota_maksimal' => 20,
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('jadwal', [
        'id_user' => $dokterUser->id_user,
        'hari_mulai' => 'Senin',
        'hari_selesai' => 'Rabu',
        'jam_mulai' => '09:00:00', // Laravel might format it with seconds or keep it depending on DB
        'jam_selesai' => '12:00:00',
        'kuota_maksimal' => 20,
    ]);

    $jadwal = Jadwal::where('id_user', $dokterUser->id_user)->first();

    // Update Jadwal
    $response = $this->actingAs($this->admin)->put("/admin/jadwals/{$jadwal->id_jadwal}", [
        'id_user' => $dokterUser->id_user,
        'hari_mulai' => 'Selasa',
        'hari_selesai' => 'Kamis',
        'jam_mulai' => '10:00',
        'jam_selesai' => '13:00',
        'kuota_maksimal' => 15,
    ]);

    $response->assertRedirect();
    $this->assertDatabaseHas('jadwal', [
        'id_jadwal' => $jadwal->id_jadwal,
        'hari_mulai' => 'Selasa',
        'hari_selesai' => 'Kamis',
        'kuota_maksimal' => 15,
    ]);

    // Delete Jadwal
    $response = $this->actingAs($this->admin)->delete("/admin/jadwals/{$jadwal->id_jadwal}");

    $response->assertRedirect();
    $this->assertDatabaseMissing('jadwal', [
        'id_jadwal' => $jadwal->id_jadwal,
    ]);
});

test('admin can confirm payment', function () {
    // Create Pasien
    $pasienUser = User::create([
        'nama' => 'Pasien B',
        'email' => 'pasienb@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'pasien',
    ]);
    Pasien::create([
        'id_user' => $pasienUser->id_user,
        'nik' => '1111222233334444',
        'no_hp' => '081234567890',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1995-01-01',
        'alamat' => 'Alamat Pasien',
    ]);

    // Create Dokter and Jadwal
    $dokterUser = User::create([
        'nama' => 'Dr. C',
        'email' => 'drc@medisgo.com',
        'password' => Hash::make('password'),
        'role' => 'dokter',
    ]);
    Dokter::create([
        'id_user' => $dokterUser->id_user,
        'spesialis' => 'THT',
    ]);
    $jadwal = Jadwal::create([
        'id_user' => $dokterUser->id_user,
        'hari_mulai' => 'Senin',
        'hari_selesai' => 'Selasa',
        'jam_mulai' => '08:00',
        'jam_selesai' => '10:00',
        'kuota_maksimal' => 10,
    ]);

    // Create Pendaftaran
    $pendaftaran = Pendaftaran::create([
        'id_user' => $pasienUser->id_user,
        'id_jadwal' => $jadwal->id_jadwal,
        'tgl_pendaftaran' => now()->toDateString(),
        'no_antrean' => 1,
        'keluhan' => 'Sakit Telinga',
        'status_periksa' => 'Belum Diperiksa',
        'status_pembayaran' => 'Belum Lunas',
    ]);

    // Confirm Payment
    $response = $this->actingAs($this->admin)->patch("/admin/biaya/konfirmasi/{$pendaftaran->id_pendaftaran}");

    $response->assertRedirect('/admin/biaya');
    $this->assertDatabaseHas('pendaftaran', [
        'id_pendaftaran' => $pendaftaran->id_pendaftaran,
        'status_pembayaran' => 'Lunas',
    ]);
});
