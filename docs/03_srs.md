# Software Requirements Specification (SRS)
## Sistem Monitoring Media Disnaker

---

### 1. Pendahuluan
Dokumen ini mendefinisikan kebutuhan fungsional dan non-fungsional perangkat lunak Sistem Monitoring Media Dinas Tenaga Kerja.

---

### 2. Kebutuhan Fungsional (Functional Requirements)

| Kode | Nama Fitur | Deskripsi Fungsional |
| :--- | :--- | :--- |
| **F-01** | Autentikasi User | Memproses registrasi, login pengguna berbasis bcrypt hash, dan logout aman. |
| **F-02** | Otorisasi Akses (RBAC) | Membatasi halaman backend khusus role `admin` dan `pemimpin`. |
| **F-03** | Manajemen Kategori | Menyediakan fungsi Tambah, Baca, Edit, dan Hapus (CRUD) kategori berita. |
| **F-04** | Manajemen Media Berita | Mengelola postingan berita, upload gambar, deskripsi, URL sumber, dan views. |
| **F-05** | Approval Status Berita | Mengubah status berita menjadi `disetujui`, `belum disetujui`, atau `tolak`. |
| **F-06** | Hapus File Physical | Menghapus file gambar fisik dari direktori `./uploads/` saat berita dihapus. |
| **F-07** | Manajemen Pengguna | Mengelola akun user beserta data detail pada tabel `admin`, `pemimpin`, `kompetitor`. |
| **F-08** | Pencarian & Filter Berita | Mencari berita berdasarkan kata kunci dan menyaring berdasarkan kategori/bulan. |
| **F-09** | Ekspor Laporan PDF | Menggenerate file PDF berformat Landscape A4 menggunakan engine Dompdf. |
| **F-10** | Counter Views Berita | Menghitung dan menambahkan jumlah pembaca (*view counter*) saat artikel dibaca. |

---

### 3. Kebutuhan Non-Fungsional (Non-Functional Requirements)

#### 3.1 Keamanan (Security)
- **NFR-SEC-01**: Proteksi CSRF (Cross-Site Request Forgery) wajib aktif untuk seluruh formulir masukan data.
- **NFR-SEC-02**: Cookie session wajib menggunakan atribut `HttpOnly = TRUE` dan `SameSite = Lax`.
- **NFR-SEC-03**: Seluruh kata sandi disimpan menggunakan algoritma standar industri `PASSWORD_DEFAULT` (BCrypt).
- **NFR-SEC-04**: Penguraian kueri database menggunakan Active Record / Query Builder untuk mencegah SQL Injection.

#### 3.2 Kinerja & Portabilitas (Performance & Portability)
- **NFR-PERF-01**: Aplikasi dapat dijalankan di dalam kontainer Docker berbasis PHP 8.3 Apache.
- **NFR-PERF-02**: Waktu respon pengujian unit & feature test kurang dari 2 detik menggunakan database pengujian SQLite terisolasi.
- **NFR-RELI-01**: Penanganan error terstruktur tanpa menampilkan stack trace sensitif di lingkungan produksi.
