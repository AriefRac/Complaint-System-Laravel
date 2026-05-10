# 📢 Complaint System Laravel
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![MariaDB](https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white)

Sistem Pengaduan Fasilitas Kampus berbasis web menggunakan **Laravel**, **Tailwind CSS**, dan **MySQL/MariaDB**.  
Aplikasi ini dibuat untuk memudahkan mahasiswa dalam melaporkan permasalahan fasilitas kampus serta membantu pihak pengelola dalam menindaklanjuti laporan secara terstruktur.

---

## 🚀 Tech Stack

- **Framework** : Laravel (PHP)
- **Frontend** : Blade Template + Tailwind CSS
- **Build Tool** : Vite
- **Database** : MySQL / MariaDB
- **Package Manager** :
  - Composer (PHP)
  - NPM (Node.js)

> 📌 *MariaDB bersifat MySQL-compatible, sehingga tetap menggunakan konfigurasi `DB_CONNECTION=mysql`.*

---

## ✨ Fitur

### 👨‍🎓 Mahasiswa
- ✅ Mengirim pengaduan fasilitas dengan kategori
- ✅ Upload foto bukti (JPEG, PNG, JPG - Max 2MB)
- ✅ Melihat status pengaduan (Pending / In Progress / Resolved)
- ✅ Edit & hapus pengaduan (hanya status Pending)
- ✅ Filter & pencarian pengaduan
- ✅ Dashboard dengan statistik pengaduan
- ✅ Riwayat pengaduan lengkap

### 👔 Staff
- ✅ Melihat semua pengaduan masuk
- ✅ Mengubah status pengaduan
- ✅ Mengatur prioritas (Low / Medium / High)
- ✅ Memberikan catatan admin
- ✅ Filter berdasarkan status, prioritas, dan kategori
- ✅ Dashboard dengan statistik lengkap

### 🛠️ Admin
- ✅ Semua fitur Staff
- ✅ Manajemen user (View & Delete)
- ✅ Manajemen kategori pengaduan (CRUD)
- ✅ Filter user berdasarkan role
- ✅ Statistik user berdasarkan role

---

## 📦 Instalasi & Setup

### 1. Clone Repository
```bash
git clone https://github.com/AriefRac/Complaint-System-Laravel.git
cd Complaint-System-Laravel
```

### 2. Install Dependency
```bash
composer install
npm install
```

### 3. Konfigurasi Environment
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
```

Edit konfigurasi database di `.env`:
```env
APP_NAME="Complaint System"
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate Application Key
```bash
php artisan key:generate
```

### 5. Migrasi & Seeder Database
```bash
php artisan migrate --seed
```

### 6. Storage Link (Upload File)
```bash
php artisan storage:link
```

### 7. Jalankan Aplikasi
```bash
php artisan serve
npm run dev
```

Akses aplikasi di:  
👉 `http://localhost:8000`

---

## 📁 Struktur Folder

```
app/                # Controller, Model, Logic
database/           # Migration & Seeder
resources/          # Blade View & Asset
routes/             # Routing Laravel
public/             # File public
storage/            # Upload file
```

---

## 🧪 Akun Default (Seeder)

Setelah menjalankan `php artisan migrate --seed`, Anda dapat login dengan akun berikut:

| Role | Email | Password |
|------|-------|----------|
| **Admin** | admin@kampus.ac.id | admin123 |
| **Staff** | staff1@kampus.ac.id | staff123 |
| **Staff** | staff2@kampus.ac.id | staff123 |
| **Mahasiswa** | arief@kampus.ac.id | mahasiswa123 |
| **Mahasiswa** | mhs1@kampus.ac.id - mhs50@kampus.ac.id | password |

> 📌 *Seeder akan membuat 1 admin, 2 staff, dan 51 mahasiswa secara otomatis.*

---

## 📝 Catatan Pengembangan

- Gunakan `npm run dev` saat development
- Gunakan `npm run build` untuk production
- Tailwind CSS dikonfigurasi di `tailwind.config.js`
- Vite dikonfigurasi di `vite.config.js`

---

## 🔧 Troubleshooting

### Error: "No application encryption key has been specified"
```bash
php artisan key:generate
```

### Error: Storage link tidak berfungsi
```bash
php artisan storage:link
```

### Error: Gambar tidak muncul setelah upload
Pastikan sudah menjalankan:
```bash
php artisan storage:link
```
Dan cek folder `storage/app/public/bukti_laporan` sudah ada.

### Error: npm run dev gagal
```bash
npm install
npm run dev
```

---

## 📸 Screenshot

### Dashboard Mahasiswa
Menampilkan statistik pengaduan dan daftar pengaduan yang telah dibuat.

### Dashboard Admin/Staff
Menampilkan semua pengaduan dari seluruh mahasiswa dengan fitur filter lengkap.

### Form Pengaduan
Form untuk membuat pengaduan baru dengan upload foto bukti.

---

## 🚀 Fitur Tambahan yang Bisa Dikembangkan

- [ ] Notifikasi real-time menggunakan WebSocket
- [ ] Export laporan ke PDF/Excel
- [ ] Sistem rating untuk pengaduan yang selesai
- [ ] Upload multiple images
- [ ] Chat/komentar pada pengaduan
- [ ] Email notification
- [ ] Dashboard analytics dengan chart
- [ ] Mobile responsive optimization

---

## 📄 Lisensi

Proyek ini menggunakan lisensi **MIT** dan bebas dikembangkan untuk keperluan akademik maupun non-komersial.

---

Dikembangkan oleh **Muhamad Arief Rachmatullah**  
📌 Repository: https://github.com/AriefRac/Complaint-System-Laravel
