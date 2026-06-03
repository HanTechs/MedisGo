<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeding Admin
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@medisgo.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Seeding Dokter
        $userDokter = User::create([
            'nama' => 'Dr. Andi Pratama',
            'email' => 'dokter@medisgo.com',
            'password' => Hash::make('password'),
            'role' => 'dokter',
        ]);

        Dokter::create([
            'id_user' => $userDokter->id_user,
            'spesialis' => 'Umum',
        ]);

        // Seeding Pasien
        $userPasien = User::create([
            'nama' => 'Budi Santoso',
            'email' => 'pasien@medisgo.com',
            'password' => Hash::make('password'),
            'role' => 'pasien',
        ]);

        Pasien::create([
            'id_user' => $userPasien->id_user,
            'nik' => '1234567890123456',
            'no_hp' => '081234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tgl_lahir' => '1995-05-20',
            'alamat' => 'Jl. Merdeka No. 123, Jakarta',
        ]);
    }
}
