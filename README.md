# Sistem Pengaduan Fasilitas Kampus - UIN SMH Banten

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white)

Sistem informasi berbasis web yang dirancang untuk mempermudah mahasiswa UIN Sultan Maulana Hasanuddin (SMH) Banten dalam melaporkan kerusakan atau masalah fasilitas kampus. Aplikasi ini bertujuan untuk mempercepat proses penanganan keluhan oleh pihak kampus secara transparan.

## 🚀 Fitur Utama

Sistem ini memiliki 3 hak akses (Role) dengan fungsionalitas berbeda:

### 1. Mahasiswa (Pelapor)
- **Buat Pengaduan:** Melaporkan kerusakan fasilitas dengan deskripsi detail.
- **Upload Bukti:** Menyertakan foto bukti kerusakan (Image Upload).
- **Tracking Status:** Memantau status laporan (Pending, Proses, Selesai) secara *real-time*.
- **Riwayat:** Melihat histori pengaduan yang pernah dibuat.

### 2. Staff (Petugas)
- **Verifikasi Laporan:** Memeriksa validitas laporan yang masuk.
- **Update Status:** Mengubah status pengerjaan (Misal: dari *Pending* ke *Sedang Dikerjakan*).
- **Tanggapan:** Memberikan respon atau balasan atas laporan mahasiswa.

### 3. Administrator
- **Manajemen Pengguna (CRUD):** Mengelola akun Mahasiswa, Staff, dan Admin.
- **Manajemen Kategori:** Mengatur kategori pengaduan (misal: Kelistrikan, Kebersihan, Sarana Kelas).

## 🛠️ Teknologi yang Digunakan

- **Framework:** Laravel 12 (Dev/Latest)
- **Bahasa:** PHP 8.5
- **Database:** MariaDB
- **Frontend:** Blade Templates + Tailwind CSS
- **Server:** Apache/Nginx

## ⚙️ Cara Instalasi (Installation)

Ikuti langkah berikut untuk menjalankan proyek ini di komputer lokal Anda:

1. **Clone Repositori**
   ```bash
   git clone [https://github.com/AriefRac/Complaint-System-Laravel.git](https://github.com/AriefRac/Complaint-System-Laravel.git)
   cd Complaint-System-Laravel

2. **Install Dependencies**
    ```bash
    composer install
    npm install

3. **Konfigurasi Environment Salin file .env.example menjadi .env**
    ```bash
    cp .env.example .env

    Buka file .env dan sesuaikan konfigurasi database Anda:
    DB_CONNECTION=mariadb
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=

4. **Generate App Key**
    ```bash
    php artisan key:generate

5. **Migrasi Database & Seeder Jalankan perintah ini untuk membuat tabel dan mengisi data akun default:**
    ```bash
    php artisan migrate --seed

6. **Jalankan Aplikasi Buka dua terminal terpisah untuk menjalankan server dan build asset:**
    ```bash
    # Terminal 1
    php artisan serve

    # Terminal 2
    npm run dev
