# 📢 Complaint System Laravel

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
- Mengirim pengaduan fasilitas
- Upload foto bukti
- Melihat status pengaduan (Pending / Proses / Selesai)
- Riwayat pengaduan

### 👷 Staff
- Melihat pengaduan masuk
- Mengubah status pengaduan
- Memberikan tanggapan

### 🛠️ Admin
- Manajemen user (CRUD)
- Manajemen kategori pengaduan
- Kontrol hak akses

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

## 🧪 Akun Default (Jika Ada Seeder)

Silakan cek file `DatabaseSeeder.php` atau tabel `users` di database untuk akun admin/staff default.

---

## 📝 Catatan Pengembangan

- Gunakan `npm run dev` saat development
- Gunakan `npm run build` untuk production
- Tailwind CSS dikonfigurasi di `tailwind.config.js`
- Vite dikonfigurasi di `vite.config.js`

---

## 📄 Lisensi

Proyek ini menggunakan lisensi **MIT** dan bebas dikembangkan untuk keperluan akademik maupun non-komersial.

---

Dikembangkan oleh **Muhamad Arief Rachmatullah**  
📌 Repository: https://github.com/AriefRac/Complaint-System-Laravel
