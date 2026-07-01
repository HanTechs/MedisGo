<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
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

        // Tambahan 5 Dokter 
        $dokterData = [
            ['nama' => 'Dr. Budi Utama', 'spesialis' => 'Umum'],
            ['nama' => 'Dr. Citra Lestari', 'spesialis' => 'Gigi'],
            ['nama' => 'Dr. Dewi Sartika', 'spesialis' => 'Anak'],
            ['nama' => 'Dr. Eko Prasetyo', 'spesialis' => 'Kandungan'],
            ['nama' => 'Dr. Fitriani', 'spesialis' => 'THT']
        ];

        foreach ($dokterData as $index => $data) {
            $num = $index + 1;
            $user = User::create([
                'nama' => $data['nama'],
                'email' => "dokter{$num}@medisgo.com",
                'password' => Hash::make('password'),
                'role' => 'dokter',
            ]);

            Dokter::create([
                'id_user' => $user->id_user,
                'spesialis' => $data['spesialis'],
            ]);
        }

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

        // Tambahan  Pasien 
        $pasienData = [
            ['nama' => 'Ahmad Fauzi', 'nik' => '1234567890123451', 'no_hp' => '081234567891', 'jenis_kelamin' => 'Laki-laki', 'tgl_lahir' => '1990-01-01', 'alamat' => 'Jl. Melati No. 1, Jakarta'],
            ['nama' => 'Siti Aminah', 'nik' => '1234567890123452', 'no_hp' => '081234567892', 'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1991-02-02', 'alamat' => 'Jl. Mawar No. 2, Bandung'],
            ['nama' => 'Rian Hidayat', 'nik' => '1234567890123453', 'no_hp' => '081234567893', 'jenis_kelamin' => 'Laki-laki', 'tgl_lahir' => '1992-03-03', 'alamat' => 'Jl. Kamboja No. 3, Surabaya'],
            ['nama' => 'Putri Lestari', 'nik' => '1234567890123454', 'no_hp' => '081234567894', 'jenis_kelamin' => 'Perempuan', 'tgl_lahir' => '1993-04-04', 'alamat' => 'Jl. Flamboyan No. 4, Yogyakarta'],
            ['nama' => 'Dodi Setiawan', 'nik' => '1234567890123455', 'no_hp' => '081234567895', 'jenis_kelamin' => 'Laki-laki', 'tgl_lahir' => '1994-05-05', 'alamat' => 'Jl. Tulip No. 5, Semarang']
        ];

        foreach ($pasienData as $index => $data) {
            $num = $index + 1;
            $user = User::create([
                'nama' => $data['nama'],
                'email' => "pasien{$num}@medisgo.com",
                'password' => Hash::make('password'),
                'role' => 'pasien',
            ]);

            Pasien::create([
                'id_user' => $user->id_user,
                'nik' => $data['nik'],
                'no_hp' => $data['no_hp'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'tgl_lahir' => $data['tgl_lahir'],
                'alamat' => $data['alamat'],
            ]);
        }
    }
}
