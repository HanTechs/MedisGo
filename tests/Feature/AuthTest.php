<?php

use App\Models\User;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

test('users can see login page', function () {
    $response = $this->get('/login');
    $response->assertStatus(200);
});

test('users can see register page', function () {
    $response = $this->get('/daftar');
    $response->assertStatus(200);
});

test('pasien can register successfully', function () {
    $response = $this->post('/daftar', [
        'nama_pasien' => 'Pasien Baru',
        'nik' => '9876543210123456',
        'no_hp' => '087712345678',
        'tgl_lahir' => '1998-10-10',
        'jenis_kelamin' => 'Laki-laki',
        'email' => 'pasienbaru@medisgo.com',
        'alamat' => 'Jl. Baru No. 10',
        'password' => 'password123',
        'password_confirmation' => 'password123',
    ]);

    $response->assertRedirect(route('ShowLogin'));
    $response->assertSessionHas('success', 'Registrasi berhasil!');

    // Check database
    $this->assertDatabaseHas('user', [
        'email' => 'pasienbaru@medisgo.com',
        'role' => 'pasien',
    ]);

    $user = User::where('email', 'pasienbaru@medisgo.com')->first();

    $this->assertDatabaseHas('pasien', [
        'id_user' => $user->id_user,
        'nik' => '9876543210123456',
        'no_hp' => '087712345678',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1998-10-10',
        'alamat' => 'Jl. Baru No. 10',
    ]);
});

test('pasien registration fails with invalid data', function () {
    $response = $this->post('/daftar', [
        'nama_pasien' => '',
        'nik' => '123', // NIK must be 16 chars
        'no_hp' => '',
        'tgl_lahir' => '',
        'jenis_kelamin' => 'Lainnya', // Must be Laki-laki or Perempuan
        'email' => 'invalid-email',
        'alamat' => '',
        'password' => 'pass', // Min 8
        'password_confirmation' => 'mismatch',
    ]);

    $response->assertSessionHasErrors([
        'nama_pasien', 'nik', 'no_hp', 'tgl_lahir', 'jenis_kelamin', 'email', 'alamat', 'password'
    ]);
});

test('admin can login successfully', function () {
    $admin = User::create([
        'nama' => 'Admin Test',
        'email' => 'admin@test.com',
        'password' => Hash::make('password123'),
        'role' => 'admin',
    ]);

    $response = $this->post('/login', [
        'email' => 'admin@test.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/admin/dashboard');
    $this->assertAuthenticatedAs($admin);
});

test('dokter can login successfully', function () {
    $dokterUser = User::create([
        'nama' => 'Dokter Test',
        'email' => 'dokter@test.com',
        'password' => Hash::make('password123'),
        'role' => 'dokter',
    ]);

    Dokter::create([
        'id_user' => $dokterUser->id_user,
        'spesialis' => 'Anak',
    ]);

    $response = $this->post('/login', [
        'email' => 'dokter@test.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/dokter/dashboard');
    $this->assertAuthenticatedAs($dokterUser);
});

test('pasien can login successfully', function () {
    $pasienUser = User::create([
        'nama' => 'Pasien Test',
        'email' => 'pasien@test.com',
        'password' => Hash::make('password123'),
        'role' => 'pasien',
    ]);

    Pasien::create([
        'id_user' => $pasienUser->id_user,
        'nik' => '1122334455667788',
        'no_hp' => '081234567890',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1990-01-01',
        'alamat' => 'Alamat Pasien',
    ]);

    $response = $this->post('/login', [
        'email' => 'pasien@test.com',
        'password' => 'password123',
    ]);

    $response->assertRedirect('/pasien/dashboard');
    $this->assertAuthenticatedAs($pasienUser);
});

test('login fails with invalid credentials', function () {
    $user = User::create([
        'nama' => 'User Test',
        'email' => 'user@test.com',
        'password' => Hash::make('password123'),
        'role' => 'pasien',
    ]);

    $response = $this->post('/login', [
        'email' => 'user@test.com',
        'password' => 'wrongpassword',
    ]);

    $response->assertSessionHasErrors('email');
    $this->assertGuest();
});

test('logged in user can logout', function () {
    $user = User::create([
        'nama' => 'User Test',
        'email' => 'user@test.com',
        'password' => Hash::make('password123'),
        'role' => 'pasien',
    ]);

    $response = $this->actingAs($user)->post('/logout');

    $response->assertRedirect('/login');
    $this->assertGuest();
});

test('pasien can update their settings profile', function () {
    $user = User::create([
        'nama' => 'Pasien Awal',
        'email' => 'pasien@test.com',
        'password' => Hash::make('password123'),
        'role' => 'pasien',
    ]);

    $pasien = Pasien::create([
        'id_user' => $user->id_user,
        'nik' => '1122334455667788',
        'no_hp' => '081234567890',
        'jenis_kelamin' => 'Laki-laki',
        'tgl_lahir' => '1990-01-01',
        'alamat' => 'Alamat Pasien',
    ]);

    $response = $this->actingAs($user)->post('/settings', [
        'nama' => 'Pasien Edit',
        'email' => 'pasienedit@test.com',
        'nik' => '8877665544332211',
        'no_hp' => '089999999999',
        'jenis_kelamin' => 'Perempuan',
        'tgl_lahir' => '1995-12-12',
        'alamat' => 'Alamat Update',
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('success', 'Pengaturan akun berhasil diperbarui!');

    $this->assertDatabaseHas('user', [
        'id_user' => $user->id_user,
        'nama' => 'Pasien Edit',
        'email' => 'pasienedit@test.com',
    ]);

    $this->assertDatabaseHas('pasien', [
        'id_user' => $user->id_user,
        'nik' => '8877665544332211',
        'no_hp' => '089999999999',
        'jenis_kelamin' => 'Perempuan',
        'tgl_lahir' => '1995-12-12',
        'alamat' => 'Alamat Update',
    ]);
});
