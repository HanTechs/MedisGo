# MedisGo 🏥

**MedisGo** adalah platform sistem informasi modern yang dirancang untuk mendigitalkan manajemen operasional klinik, khususnya untuk lingkungan kampus. Proyek ini bertujuan untuk menggantikan sistem pencatatan manual berbasis kertas dengan solusi digital yang terpadu, efisien, dan aman.

> "Tinggalkan Kertas, Mulai Digital."

---

## 🚀 Fitur Utama

- **E-Registration**: Sistem pendaftaran mandiri bagi pasien untuk meminimalisir antrean fisik.
- **Digital Health Record (RME)**: Rekam Medis Elektronik yang terstruktur untuk memudahkan penyimpanan dan akses riwayat kesehatan pasien secara real-time.
- **Instant Access**: Memudahkan tenaga medis dalam mengakses riwayat pengobatan pasien hanya dalam hitungan detik.
- **Manajemen User**: Sistem autentikasi untuk Pasien, Dokter, dan Admin.

---

## 🛠️ Stack Teknologi

Proyek ini dibangun menggunakan teknologi modern:

- **Framework**: [Laravel 11+](https://laravel.com)
- **Frontend**: [Tailwind CSS v4](https://tailwindcss.com) & [Flowbite](https://flowbite.com)
- **Build Tool**: [Vite](https://vitejs.dev)
- **Database**: MySQL / MariaDB

---

## ⚙️ Instalasi

Ikuti langkah-langkah berikut untuk menjalankan proyek di lingkungan lokal Anda:

1. **Clone Repository**
   ```bash
   git clone https://github.com/username/MedisGo.git
   cd MedisGo
   ```

2. **Instal Dependensi PHP**
   ```bash
   composer install
   ```

3. **Instal Dependensi Frontend**
   ```bash
   npm install
   ```

4. **Konfigurasi Lingkungan**
   Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Migrasi Database**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Aplikasi**
   Buka dua terminal:
   - Terminal 1 (Server PHP): `php artisan serve`
   - Terminal 2 (Vite/Assets): `npm run dev`

---

## 🎓 Tentang Proyek

Proyek ini merupakan bagian dari **Project Based Learning (PBL)** di **Politeknik Negeri Batam**. Dikembangkan dengan fokus pada efisiensi layanan kesehatan, keamanan data, dan kenyamanan pengguna (pasien & tenaga medis).

---

## 📄 Lisensi

Aplikasi ini dikembangkan untuk tujuan pendidikan dan bersifat open-source di bawah lisensi [MIT](LICENSE).

---
© 2026 MedisGo - Politeknik Negeri Batam PBL Project
