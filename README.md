# Disnaker Monitoring — Media Monitoring Dinas Tenaga Kerja Kota Semarang

Aplikasi **media monitoring** berbasis web untuk memantau, mengelola, dan melaporkan pemberitaan terkait Dinas Tenaga Kerja Kota Semarang di berbagai media massa.

---

## Tech Stack

| Komponen           | Teknologi                                                                       |
| ------------------ | ------------------------------------------------------------------------------- |
| **Framework**      | CodeIgniter 3 (MVC PHP)                                                         |
| **PHP**            | >= 5.3.7                                                                        |
| **Database**       | MySQL 8.0.30                                                                    |
| **PDF Generation** | Dompdf ^3.0                                                                     |
| **Backend UI**     | SB Admin 2 (Bootstrap 4.6, jQuery 3.6, Chart.js 2.9, DataTables, FontAwesome 5) |
| **Frontend UI**    | Themefisher Bingo HTML Template                                                 |
| **Autentikasi**    | Session-based + Bcrypt (`password_hash` / `password_verify`)                    |
| **REST API**       | Standalone raw PHP di folder `api/` (terpisah dari CI)                          |

---

## Struktur Aplikasi

```
disnaker-monitoring/
├── application/              # Kode utama CodeIgniter 3
│   ├── config/               # Konfigurasi (database, routes, app, autoload)
│   ├── controllers/          # MVC Controllers (14 file)
│   ├── libraries/            # Library kustom (Dompdf_gen)
│   ├── models/               # MVC Models (7 file)
│   └── views/                # MVC Views (38 file)
│       ├── auth/             # Login & Register
│       ├── backend/          # Dashboard admin & pemimpin
│       │   ├── partials/     # Header & footer backend
│       │   ├── kategori/     # CRUD kategori
│       │   ├── media/        # CRUD media/berita
│       │   ├── laporan/      # Manajemen laporan
│       │   ├── user/         # Manajemen user
│       │   ├── profile/      # Edit profile
│       │   ├── jadwal/       # Jadwal
│       │   └── pdf/          # Template cetak PDF
│       ├── frontend/         # Halaman publik
│       │   ├── partials/     # Header & footer frontend
│       │   └── pages/        # Home, Berita, Kontak, Kontributor
│       └── errors/           # Template error
├── assets/                   # Aset frontend
│   ├── css/ / js/ / images/  # File kustom
│   ├── sbadmin/              # SB Admin 2 (backend theme)
│   └── theme/                # Themefisher Bingo (frontend theme)
├── api/                      # REST API standalone (raw PHP)
├── system/                   # CodeIgniter 3 system core
├── uploads/                  # Upload gambar
├── vendor/                   # Composer dependencies (dompdf, phpunit)
├── index.php                 # Front controller
├── composer.json
└── disnaker-monitoring.sql   # Database dump
```

---

## Database

**Nama database:** `disnaker-monitoring`

### Tabel

| Tabel        | Keterangan                                                   | Relasi                              |
| ------------ | ------------------------------------------------------------ | ----------------------------------- |
| `user`       | Login credentials (email + bcrypt password)                  | Parent ke admin/pemimpin/kompetitor |
| `admin`      | Data admin (nama, nip, telp, alamat)                         | FK `id_user` → `user.id`            |
| `pemimpin`   | Data pimpinan (nama, nip, telp, alamat)                      | FK `id_user` → `user.id`            |
| `kompetitor` | Data kontributor (nama, telp, alamat)                        | FK `id_user` → `user.id`            |
| `kategori`   | Kategori berita (8 seed: Lowongan, Pelatihan, dll)           | Referenced by `media`               |
| `media`      | Artikel/berita (judul, url, status, gambar, deskripsi, view) | FK `id_kategori` → `kategori.id`    |

### Role & Hak Akses

| Role           | Tabel        | Akses                                                                   |
| -------------- | ------------ | ----------------------------------------------------------------------- |
| **Admin**      | `admin`      | Full: Dashboard, User CRUD, Kategori CRUD, Media CRUD, Laporan, Profile |
| **Pemimpin**   | `pemimpin`   | Terbatas: Dashboard, Kategori, Media, Laporan, Profile                  |
| **Kompetitor** | `kompetitor` | Hanya frontend publik + form kontributor                                |

---

## Controllers

| Controller    | Method Utama                                                                | Fungsi                             | Akses           |
| ------------- | --------------------------------------------------------------------------- | ---------------------------------- | --------------- |
| `Home`        | `index()`, `update_view($id)`                                               | Landing page, counter view         | Public          |
| `Berita`      | `index($kategori_id)`, `detail($id)`                                        | Daftar & detail berita             | Public          |
| `Kontak`      | `index()`                                                                   | Halaman kontak                     | Public          |
| `Kontributor` | `index()`, `create()`                                                       | Form pendaftaran kontributor       | Public          |
| `Auth`        | `register()`, `login()`, `logout()`                                         | Autentikasi                        | Public          |
| `Dashboard`   | `index()`                                                                   | Dashboard dengan chart & statistik | Admin, Pemimpin |
| `Kategori`    | `add()`, `create()`, `edit($id)`, `update($id)`, `delete($id)`              | CRUD kategori                      | Admin, Pemimpin |
| `Media`       | `add()`, `create()`, `edit($id)`, `delete_media($id)`, `update_status($id)` | CRUD media + upload gambar         | Admin, Pemimpin |
| `Laporan`     | `add()`, `create()`, `delete($id)`, `update_status($id)`                    | Manajemen laporan                  | Multi-role      |
| `User`        | `create()`, `edit($id)`, `delete($id)`                                      | Manajemen user                     | Admin, Pemimpin |
| `Profile`     | `index()`, `update()`, `profile()`                                          | Edit profile & ganti password      | Login           |
| `Cetak`       | `laporan()`, `laporan_per_bulan()`                                          | Cetak PDF (Dompdf)                 | Login           |

---

## Models

| Model             | Tabel Utama                               | Method Kunci                                                                                                                                               |
| ----------------- | ----------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `Auth_model`      | `user`, `kompetitor`, `admin`, `pemimpin` | `login()`, `register()`, `emailExists()`, `getUserType()`, `getUserDetails()`                                                                              |
| `MediaModel`      | `media`, `kategori`                       | `getAllMedia()`, `insert_media()`, `updateStatus()`, `getMediaByWeek/Month/Year()`, `increment_view()`, `get_total_by_status()`, `get_total_by_category()` |
| `Berita_model`    | `kategori`, `media`                       | `get_all_kategori()`, `get_berita_by_kategori()`, `search_berita()`                                                                                        |
| `Dashboard_modal` | `media`                                   | `get_total_by_status()`                                                                                                                                    |
| `KategoriModel`   | `kategori`                                | `getAllKategori()`, `insert/update/delete_kategori()`                                                                                                      |
| `UserModel`       | `user`, `admin`, `pemimpin`, `kompetitor` | `getAllUser()`, `getUserById()`, `updateAdmin/Pemimpin/User()`, `deleteUser()`                                                                             |
| `ProfileModel`    | `user`, `admin`, `pemimpin`               | `get_user_by_id()`, `verify_password()`, `update_user/admin/pemimpin()`                                                                                    |

---

## Routes

```php
$route['default_controller'] = 'home';
$route['dashboard']          = 'dashboard';
$route['404_override']       = '';
$route['translate_uri_dashes'] = FALSE;
```

Sistem menggunakan **auto-routing** CodeIgniter 3 → URL pattern: `controller/method/param`

Contoh URL:

- `/` atau `/home` → halaman utama
- `/berita/detail/5` → detail berita ID 5
- `/kategori/edit/3` → edit kategori ID 3
- `/cetak/laporan` → cetak PDF
- `/auth/login` → halaman login

---

## Autentikasi

1. Login via `Auth::login()` → validasi bcrypt → session (`logged_in`, `user_id`, `user_type`, `user_name`)
2. Session disimpan di file (driver `files`), expire 2 jam
3. Authorisasi di construct controller:
   ```php
   if (!$this->session->userdata('logged_in')) { redirect('auth/login'); }
   $userType = $this->session->userdata('user_type');
   if (!in_array($userType, ['admin', 'pemimpin'])) { redirect('home'); }
   ```
4. Logout via `Auth::logout()` → destroy session

---

## REST API

Folder `api/` berisi **18 endpoint standalone** (raw PHP, tidak menggunakan CI) untuk integrasi mobile/eksternal:

- `connection.php` — Koneksi MySQLi (di-include endpoint lain)
- `login.php` — Auth via JSON
- `get_all_media.php`, `get_media_admin.php`, `get_media_kontributor.php` — Data media
- `get_rekap_kontributor.php`, `get_rekap_pemimpin.php` — Rekap data
- `get_stats_kontributor.php`, `get_stats_pemimpin.php` — Statistik
- `post_media_admin.php`, `post_media_kontributor.php` — Create media
- `post_kompetitor.php`, `post_admin.php`, `post_pemimpin.php` — Register user
- `update_media_admin.php`, `update_media_kontributor.php`, `update_surat_balasan.php` — Update
- `delete_media.php` — Hapus media

---

## Instalasi & Setup

### Prasyarat

- PHP >= 5.3.7
- MySQL 5.7+ / MariaDB / MySQL 8.x
- Composer
- Apache dengan mod_rewrite (atau Nginx)

### Langkah

1. **Clone project**

   ```bash
   git clone <repo-url> disnaker-monitoring
   cd disnaker-monitoring
   ```

2. **Buat database**

   ```bash
   mysql -u root -p < disnaker-monitoring.sql
   ```

3. **Install dependencies**

   ```bash
   composer install
   ```

4. **Konfigurasi database**
   Edit `application/config/database.php`:

   ```php
   'hostname' => 'localhost',
   'username' => 'root',
   'password' => '',
   'database' => 'disnaker-monitoring',
   ```

5. **Konfigurasi base URL**
   Edit `application/config/config.php`:

   ```php
   $config['base_url'] = 'http://localhost/disnaker-monitoring/';
   ```

6. **Akses aplikasi**
   Buka `http://localhost/disnaker-monitoring/`

### Login Default

| Role  | Email             | Password                        |
| ----- | ----------------- | ------------------------------- |
| Admin | `admin@gmail.com` | (ada di SQL dump — bcrypt hash) |

> Password default bisa dicek di file SQL dump atau melalui fitur register.

---

## Fitur

- **Landing Page Publik** — Hero, grafik statistik, daftar berita terbaru
- **Manajemen Berita/Media** — CRUD dengan upload gambar & workflow moderasi (disetujui / belum disetujui / tolak)
- **Kategori Berita** — 8 kategori (Lowongan, Pelatihan, Bisnis, UMKM, Pabrik, Buruh, PHK, Mediasi)
- **Kontributor** — Form pendaftaran kontributor publik
- **Dashboard Admin & Pemimpin** — Statistik dengan Chart.js / ApexCharts
- **Laporan PDF** — Cetak laporan & laporan per bulan dengan Dompdf
- **Manajemen User** — CRUD user dengan 3 role
- **Search Berita** — Pencarian berita publik
- **View Counter** — Hitungan jumlah view per artikel
- **REST API** — Endpoint untuk integrasi eksternal

---

## Environment

Environment ditentukan di `index.php`:

```php
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');
```

Setel variabel server `CI_ENV` ke `production` untuk production (menonaktifkan DB debug).

---

## Catatan Pengembangan

- CSRF protection **tidak aktif** (`false`)
- Encryption key **kosong** — sesi tidak dienkripsi
- Log threshold: level 4 (All Messages) — disarankan turunkan ke 1 di production
- `Dompdf_gen` library ada tapi tidak digunakan (controller langsung panggil Dompdf via vendor)
- Beberapa controller masih menjalankan query langsung tanpa model
- File `application/views/frontend/pages/kontributor.php` mengandung merge conflict marker (`<<<<<<< HEAD`)
- Pastikan folder `uploads/` dan `application/cache/` writable
