# Dokumentasi Routing & API Endpoints
## Sistem Monitoring Media Disnaker

---

### 1. Daftar Endpoint Halaman Publik (Frontend)

| HTTP Method | URL Path | Controller & Method | Otorisasi Akses | Deskripsi |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/` | `Home::index` | Public | Menampilkan halaman utama portal berita |
| `GET` | `/home` | `Home::index` | Public | Alias halaman utama |
| `GET` | `/home/update_view/{id}` | `Home::update_view` | Public | Menambah counter view berita & redirect ke URL asli |
| `GET` | `/berita` | `Berita::index` | Public | Daftar berita publik dengan pencarian/kategori |
| `POST` | `/berita` | `Berita::index` | Public | Memproses formulir pencarian berita |
| `GET` | `/berita/detail/{id}` | `Berita::detail` | Public | Menampilkan detail berita |
| `GET` | `/kontak` | `Kontak::index` | Public | Halaman informasi kontak dinas |

---

### 2. Daftar Endpoint Autentikasi (`/auth`)

| HTTP Method | URL Path | Controller & Method | Otorisasi Akses | Deskripsi |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/auth/login` | `Auth::login` | Public | Halaman formulir login |
| `POST` | `/auth/login` | `Auth::login` | Public | Memproses login user & pembentukan session |
| `GET` | `/auth/register` | `Auth::register` | Public | Halaman formulir registrasi kompetitor |
| `POST` | `/auth/register` | `Auth::register` | Public | Memproses pendaftaran pengguna baru |
| `GET` | `/auth/logout` | `Auth::logout` | Authenticated | Menghancurkan session & redirect ke login |

---

### 3. Daftar Endpoint Panel Management Backend

| HTTP Method | URL Path | Controller & Method | Role Diizinkan | Deskripsi |
| :--- | :--- | :--- | :--- | :--- |
| `GET` | `/dashboard` | `Dashboard::index` | `admin`, `pemimpin` | Ringkasan statistik & grafik berita |
| `GET` | `/kategori` | `Kategori::index` | `admin`, `pemimpin` | Daftar kategori berita |
| `GET` | `/kategori/add` | `Kategori::add` | `admin`, `pemimpin` | Form tambah kategori |
| `POST` | `/kategori/create` | `Kategori::create` | `admin`, `pemimpin` | Simpan data kategori baru |
| `GET` | `/kategori/edit/{id}` | `Kategori::edit` | `admin`, `pemimpin` | Form edit kategori |
| `POST` | `/kategori/update/{id}` | `Kategori::update` | `admin`, `pemimpin` | Update data kategori |
| `POST` | `/kategori/delete/{id}` | `Kategori::delete` | `admin`, `pemimpin` | Hapus kategori |
| `GET` | `/media` | `Media::index` | `admin`, `pemimpin` | Daftar postingan media |
| `GET` | `/media/add` | `Media::add` | `admin`, `pemimpin` | Form tambah postingan media |
| `POST` | `/media/create` | `Media::create` | `admin`, `pemimpin` | Simpan postingan media baru + upload gambar |
| `GET` | `/media/edit/{id}` | `Media::edit` | `admin`, `pemimpin` | Form edit media |
| `POST` | `/media/edit/{id}` | `Media::edit` | `admin`, `pemimpin` | Update data media + ganti gambar |
| `POST` | `/media/update_status/{id}`| `Media::update_status` | `admin`, `pemimpin` | Ubah status verifikasi (disetujui/tolak) |
| `POST` | `/media/delete_media/{id}` | `Media::delete_media` | `admin`, `pemimpin` | Hapus media + gambar fisik di `./uploads/` |
| `GET` | `/user` | `User::index` | `admin`, `pemimpin` | Daftar pengguna sistem |
| `POST` | `/user/create` | `User::create` | `admin`, `pemimpin` | Tambah pengguna baru |
| `POST` | `/user/edit/{id}` | `User::edit` | `admin`, `pemimpin` | Edit data pengguna |
| `POST` | `/user/delete/{id}` | `User::delete` | `admin`, `pemimpin` | Hapus akun pengguna secara cascade |
| `GET` | `/laporan` | `Laporan::index` | `admin`, `pemimpin` | Rekapitulasi laporan media per bulan |
| `GET` | `/cetak/laporan` | `Cetak::laporan` | `admin`, `pemimpin` | Generate & download PDF laporan lengkap |
| `GET` | `/cetak/laporan_per_bulan` | `Cetak::laporan_per_bulan` | `admin`, `pemimpin` | Download PDF laporan media per bulan |
