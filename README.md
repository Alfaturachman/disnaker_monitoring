# Disnaker Monitoring — Media Monitoring Dinas Tenaga Kerja Kota Semarang

Aplikasi **media monitoring** berbasis web untuk memantau, mengelola, memverifikasi, dan melaporkan pemberitaan terkait Dinas Tenaga Kerja Kota Semarang di berbagai media massa.

---

## Fitur Utama & Keamanan

- **Landing Page Publik** — Hero banner, statistik pemberitaan, daftar berita disetujui, & pencarian berita.
- **Manajemen Berita/Media** — CRUD postingan media, unggah gambar, & workflow moderasi status (*disetujui*, *belum disetujui*, *tolak*).
- **Kategori Berita** — Pengelompokan berita (Lowongan, Pelatihan, Bisnis, UMKM, Pabrik, Buruh, PHK, Mediasi).
- **Dashboard Admin & Pemimpin** — Ringkasan data & grafik statistik.
- **Laporan PDF** — Cetak laporan bulanan berformat A4 Landscape menggunakan Dompdf.
- **Security Hardened** — Proteksi CSRF aktif, cookie `HttpOnly`, otorisasi RBAC bergradasi, & enkripsi password BCrypt.
- **Automated Testing** — 38 unit & feature tests berbasis PHPUnit 9.6 + SQLite test database terisolasi.
- **Docker & CI/CD** — Siap di-deploy dengan Docker Compose (PHP 8.3 Apache + MySQL 8.0 + phpMyAdmin) dan GitHub Actions CI/CD.

---

## Tech Stack

| Komponen | Teknologi |
| :--- | :--- |
| **Framework** | CodeIgniter 3.1.x (MVC PHP) |
| **Language** | PHP `8.3.10` (Dukungan PHP 7.4 - 8.3) |
| **Database (Prod)** | MySQL `8.0.30` |
| **Database (Test)** | SQLite3 / PDO SQLite (In-Memory / File DB) |
| **PDF Generation** | Dompdf `^3.0` |
| **Testing** | PHPUnit `9.6.22` + `ci-phpunit-test` |
| **Container & CI/CD**| Docker, Docker Compose, GitHub Actions |
| **Backend UI** | SB Admin 2 (Bootstrap 4.6, jQuery 3.6, Chart.js 2.9, DataTables) |
| **Frontend UI** | Themefisher Bingo HTML Template |
| **Autentikasi** | Session-based + BCrypt (`password_hash` / `password_verify`) |

---

## Struktur Aplikasi

```text
disnaker-monitoring/
├── application/              # Kode utama CodeIgniter 3
│   ├── config/               # Konfigurasi (database, routes, app, security, testing)
│   ├── controllers/          # Controllers (Auth, Media, Kategori, User, Laporan, Cetak, dll)
│   ├── models/               # Models (Auth_model, MediaModel, KategoriModel, UserModel, Dashboard_model)
│   ├── views/                # Views (auth, backend, frontend, pdf)
│   └── tests/                # Automated PHPUnit test suite (models & controllers)
├── assets/                   # Asset statis (CSS, JS, Images, SB Admin 2, Bingo Theme)
├── docs/                     # Dokumentasi sistem lengkap 13-bagian
├── uploads/                  # Direktori simpan gambar media
├── api/                      # REST API standalone
├── Dockerfile                # Image PHP 8.3 Apache
├── docker-compose.yml        # Orchestration Web, MySQL 8.0 & phpMyAdmin
├── .github/workflows/        # CI/CD Pipeline GitHub Actions
├── index.php                 # Front controller
├── composer.json             # Dependensi PHP Composer
└── disnaker-monitoring.sql   # Skema database MySQL
```

---

## Dokumentasi Proyek (docs/)

Dokumentasi sistem lengkap tersedia di folder `docs/`:

- [01_brd.md](docs/01_brd.md) — Business Requirements Document
- [02_prd.md](docs/02_prd.md) — Product Requirements Document (User Stories & Flow)
- [03_srs.md](docs/03_srs.md) — Software Requirements Specification
- [04_architecture.md](docs/04_architecture.md) — System Architecture (Diagram MVC & Tech Stack)
- [05_database.md](docs/05_database.md) — ERD, Database Schema & Data Dictionary
- [06_desain.md](docs/06_desain.md) — UI/UX Guidelines, Color Palette & Typography
- [07_routing.md](docs/07_routing.md) — API Routing & Endpoints Mapping
- [08_testing.md](docs/08_testing.md) — Testing Strategy & QA Report
- [09_user_manual.md](docs/09_user_manual.md) — Panduan Penggunaan Pengunjung, Admin, & Pemimpin
- [10_deployment.md](docs/10_deployment.md) — Docker, Environment Variables & CI/CD
- [11_security.md](docs/11_security.md) — Security Hardening, CSRF & RBAC Authorization
- [12_decision_log.md](docs/12_decision_log.md) — Architecture Decision Records (ADR)
- [13_changelog.md](docs/13_changelog.md) — Release Notes & Version History

---

## Database & Hak Akses

**Nama database:** `disnaker-monitoring`

### Matriks Role & Otorisasi Access

| Role | Akses Utama | URL Akses |
| :--- | :--- | :--- |
| **Admin** | Full Access (Dashboard, Kategori, Media, User, Laporan, Cetak PDF) | `/dashboard`, `/media`, `/user`, `/kategori` |
| **Pemimpin** | Terbatas (Dashboard, Media View, Laporan, Cetak PDF) | `/dashboard`, `/media`, `/laporan` |
| **Kompetitor** | Public Access & Form Pendaftaran Kontributor | `/home`, `/berita`, `/kontak` |

---

## Instalasi & Setup Lokal

### Cara 1: Menggunakan Docker Compose (Direkomendasikan)

```bash
# 1. Clone repository
git clone https://github.com/Alfaturachman/disnaker_monitoring.git
cd disnaker-monitoring

# 2. Build dan jalankan seluruh service
docker compose up -d --build
```
- **Web App**: `http://localhost:8080`
- **phpMyAdmin**: `http://localhost:8081`
- **MySQL Host**: `localhost:3306` (User: `root`, Password: `root`)

---

### Cara 2: Manual (Laragon / XAMPP)

1. **Clone & Install Dependensi**:
   ```bash
   git clone https://github.com/Alfaturachman/disnaker_monitoring.git
   cd disnaker-monitoring
   composer install
   ```
2. **Impor Database**:
   Impor file `disnaker-monitoring.sql` ke MySQL database bernama `disnaker-monitoring`.
3. **Konfigurasi Database**:
   Sesuaikan `application/config/database.php` dengan kredensial MySQL lokal.
4. **Akses Aplikasi**:
   Buka `http://localhost/disnaker-monitoring/` di browser.

---

## Menguji Aplikasi (Automated Testing)

Pengujian unit dan feature test dijalankan dengan perintah:

```bash
# Jalankan seluruh test suite (38 tests)
vendor\bin\phpunit -c application/tests/phpunit.xml

# Jalankan Unit Tests (Model) saja
vendor\bin\phpunit -c application/tests/phpunit.xml --testsuite "Unit Tests (Models)"

# Jalankan Feature Tests (Controller) saja
vendor\bin\phpunit -c application/tests/phpunit.xml --testsuite "Feature Tests (Controllers)"
```

---

## Fitur Keamanan yang Terkonfigurasi

1. **CSRF Protection**: Terintegrasi pada seluruh form masukan POST (`$config['csrf_protection'] = TRUE`).
2. **Session Cookie Security**: Cookie session dikunci dengan atribut `HttpOnly = TRUE` dan `SameSite = Lax`.
3. **RBAC Authorization**: Pengecekan autentikasi & peran pengguna otomatis di `__construct()` controller backend.
4. **File Storage Cleanup**: Penghapusan fisik file gambar dari direktori `./uploads/` saat record media dihapus.
