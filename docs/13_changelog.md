# System Changelog & Version History
## Sistem Monitoring Media Disnaker

---

### [v1.1.0] - 2026-08-03
#### Added
- Dokumentasi proyek lengkap 13 bagian di folder `docs/`.
- Containerization lingkungan pengembangan & produksi menggunakan **Docker** (PHP 8.3 Apache) dan **Docker Compose** (Web, MySQL 8.0, phpMyAdmin).
- Automated CI/CD Pipeline menggunakan **GitHub Actions** (`.github/workflows/ci.yml`) untuk pengujian otomatis dan validasi build Docker.
- 38 Automated Unit & Feature Tests (`application/tests/`) berbasis PHPUnit 9.6 dan SQLite test database.

#### Security Hardening
- Mengaktifkan Cross-Site Request Forgery (CSRF) Protection (`$config['csrf_protection'] = TRUE`).
- Mengamankan cookie session dengan atribut `HttpOnly = TRUE` dan `SameSite = Lax`.
- Menerapkan Role-Based Access Control (RBAC) pada constructor `Media.php`, `Laporan.php`, dan `Cetak.php`.
- Mengkonfigurasi `encryption_key` 32-karakter acak pada `config.php`.

#### Fixed
- Memperbaiki bug output header PDF pada `Laporan.php` yang menyebabkan file PDF terunduh rusak (*corrupted PDF*).
- Memperbaiki *storage file leak* dengan menambahkan penghapusan file gambar fisik (`unlink`) dari `./uploads/` saat berita dihapus.
- Memperbaiki *form validation bypass* pada pembuatan pengguna baru di `User.php`.
- Memperbaiki kompatibilitas nama file model `Dashboard_model.php` untuk OS *case-sensitive* Linux.
- Mengubah skema DDL tabel `kompetitor` pada `disnaker-monitoring.sql` dengan menambahkan kolom `instansi`, `jabatan`, dan `alasan`.

---

### [v1.0.0] - 2024-12-25
#### Added
- Rilis awal Sistem Monitoring Media Disnaker berbasis CodeIgniter 3.
- Modul Pengelolaan Kategori Berita.
- Modul Pengelolaan Postingan Media & Upload Gambar.
- Modul Approval Status Berita (`disetujui`, `belum disetujui`, `tolak`).
- Modul Pengelolaan User (Admin, Pemimpin, Kompetitor).
- Portal Berita Publik Front-end & Counter View Pembaca.
- Fitur Ekspor Laporan PDF Bulanan menggunakan Dompdf.
