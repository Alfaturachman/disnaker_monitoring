# Architecture Decision Log (ADR)
## Sistem Monitoring Media Disnaker

---

### ADR-001: Penggunaan SQLite3 untuk Isolated Automated Testing
- **Status**: Disetujui & Diimplementasikan
- **Konteks**: Pengujian otomatis (Unit Test & Feature Test) memerlukan eksekusi cepat tanpa ketergantungan pada server MySQL lokal yang harus terus berjalan.
- **Keputusan**: Menggunakan driver SQLite3 terisolasi (`application/config/testing/database.php` dan `init_db.php`) khusus untuk environment `testing`.
- **Dampak / Trade-off**:
  - *Positif*: Pengujian 38 test case berjalan super cepat (~1.4 detik) dan dapat dijalankan di mana saja (termasuk CI/CD runner) tanpa setup MySQL.
  - *Negatif*: Sintaks SQL spesifik MySQL (seperti `AUTO_INCREMENT`) harus disesuaikan di file inisialisasi SQLite (`PRIMARY KEY AUTOINCREMENT`).

---

### ADR-002: Patching Kompatibilitas PHP 8.3 pada Framework CodeIgniter 3
- **Status**: Disetujui & Diimplementasikan
- **Konteks**: PHP 8.2+ memberikan deprecation warning pada *dynamic properties* dan tipe kembalian `ArrayAccess`.
- **Keputusan**: Menambahkan atribut `#[\AllowDynamicProperties]` dan `#[\ReturnTypeWillChange]` pada core test runner (`CIPHPUnitTestFileCache`, `CIPHPUnitTestCase`, `CI_Loader`).
- **Dampak / Trade-off**:
  - *Positif*: Aplikasi & test runner berjalan 100% bersih tanpa warning/error di PHP 8.3.10.
  - *Negatif*: Memerlukan dokumentasi khusus apabila framework di-update di kemudian hari.

---

### ADR-003: Containerization Menggunakan Docker Compose (PHP 8.3 Apache + MySQL 8.0)
- **Status**: Disetujui & Diimplementasikan
- **Konteks**: Memudahkan proses pengujian, pembagian lingkungan pengembangan (*development environment*), dan deployment ke server tanpa perbedaan versi dependensi.
- **Keputusan**: Membuat `Dockerfile` (PHP 8.3 Apache + extension gd/mysqli/zip) dan `docker-compose.yml` (App, DB MySQL 8.0, phpMyAdmin).
- **Dampak / Trade-off**:
  - *Positif*: *Consitent runtime environment* antara lokal, CI/CD, dan server produksi.
  - *Negatif*: Memerlukan Docker Engine terinstal pada komputer pengembang.

---

### ADR-004: Otorisasi Berbasis Role di level Constructor Controller (RBAC)
- **Status**: Disetujui & Diimplementasikan
- **Konteks**: Menghindari *Broken Access Control* pada rute backend.
- **Keputusan**: Memasukkan validasi session dan pemeriksaan role `admin` & `pemimpin` langsung di method `__construct()` seluruh controller backend (`Media`, `Laporan`, `Cetak`, `User`, `Kategori`).
- **Dampak / Trade-off**:
  - *Positif*: Menjamin keamanan 100% pada seluruh method di dalam controller tersebut tanpa terkecuali.
  - *Negatif*: Method baru di controller tersebut secara otomatis memerlukan autentikasi login.
