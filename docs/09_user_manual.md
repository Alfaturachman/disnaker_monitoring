# Panduan Penggunaan Aplikasi (User Manual)
## Sistem Monitoring Media Disnaker

---

### 0. Alamat Akses Aplikasi
Alamat bergantung pada metode deployment:

- **Docker (default)** — `http://localhost:8080/` (sesuai `docker-compose.yml`).
- **Laragon manual** — `http://localhost/disnaker-monitoring/` (sesuai `base_url` di `application/config/config.php`).

### 1. Panduan Pengunjung Umum (Public View)
1. **Membaca Berita Terkini**: Akses halaman utama portal (lihat alamat pada bagian atas). Berita yang ditampilkan adalah pemberitaan yang telah diverifikasi dan `disetujui`.
2. **Pencarian Berita**: Ketik kata kunci pada kotak pencarian di halaman `/berita` lalu tekan **Enter** atau tombol **Cari**.
3. **Filter Kategori**: Klik nama kategori pada bagian samping/menu berita untuk menyaring pemberitaan berdasarkan topik spesifik (seperti *Pelatihan*, *Lowongan*, *PHK*).
4. **Membaca Berita Lengkap**: Klik judul artikel atau gambar berita untuk membuka detail halaman dan diarahkan ke sumber berita resmi.

---

### 2. Panduan Administrator (Pengelola Backend)
1. **Login Aplikasi**:
   - Buka `http://localhost:8080/auth/login`.
   - Masukkan email dan password terdaftar.
   - Tekan **Login**. Setelah berhasil, sistem akan mengarahkan ke Halaman Dashboard.
2. **Mengelola Data Kategori**:
   - Buka menu **Data Kategori**.
   - Tekan **Tambah Kategori**, isi nama kategori baru, lalu simpan.
   - Gunakan tombol **Edit** untuk memperbarui nama kategori atau **Hapus** untuk menghapus kategori.
3. **Mengunggah & Mengelola Berita Media**:
   - Buka menu **Data Media** -> **Tambah Media**.
   - Isi formulir (Nama Wartawan/Media, Judul Berita, URL Sumber, Status Verifikasi, Deskripsi, Kategori, dan File Gambar).
   - Tekan **Simpan**.
4. **Menyetujui / Menolak Berita**:
   - Pada tabel Data Media, gunakan dropdown/tombol **Status** untuk mengubah status berita dari `belum disetujui` menjadi `disetujui` atau `tolak`.
5. **Menghapus Berita**:
   - Klik tombol **Hapus** pada baris berita. Sistem secara otomatis menghapus record di database beserta file gambar fisiknya.
6. **Mengelola Akun Pengguna**:
   - Buka menu **Data User** untuk melihat daftar pengguna, mengedit peran (*role*), atau menambah akun admin/pemimpin baru.

---

### 3. Panduan Pemimpin (Kepala Dinas / Management)
1. **Melihat Dashboard Statistik**:
   - Login menggunakan akun ber-role `pemimpin`.
   - Buka menu **Dashboard** untuk memantau rekapitulasi jumlah berita per status.
2. **Mencetak Laporan Rekapitulasi PDF**:
   - Buka menu **Laporan Media**.
   - Pilih bulan laporan yang diinginkan.
   - Tekan tombol **Cetak PDF**. File PDF berformat A4 Landscape akan langsung terunduh secara otomatis.
