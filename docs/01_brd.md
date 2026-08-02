# Business Requirements Document (BRD)
## Sistem Monitoring Media Disnaker

---

### 1. Ringkasan Eksekutif
Sistem Monitoring Media Dinas Tenaga Kerja (Disnaker) adalah platform berbasis web yang dirancang untuk memantau, mengagregasi, mengategorikan, dan menganalisis pemberitaan media massa serta media digital terkait isu ketenagakerjaan (lowongan kerja, pelatihan, PHK, mediasi hubungan industrial, UMKM, dan kegiatan kedinasan).

Platform ini memfasilitasi koordinasi antara pengelola data (Admin), jajaran pimpinan (Pemimpin), dan publik/stakeholder eksternal (Kompetitor/Instansi) dalam menyajikan transparansi informasi dan mendukung pengambilan keputusan strategis berbasis data (*data-driven decision making*).

---

### 2. Latar Belakang & Masalah (Problem Statement)
Sebelum adanya sistem ini, pemantauan berita dan pemberitaan publik seputar isu ketenagakerjaan mengalami beberapa kendala utama:
1. **Pemantauan Manual**: Pengumpulan berita dari media online dilakukan secara manual tanpa pengelompokan yang terpusat.
2. **Kurangnya Validasi & Verifikasi**: Informasi yang masuk perlu melewati proses persetujuan (*approval flow*) sebelum dipublikasikan ke publik.
3. **Penyajian Laporan Lambat**: Pembuatan rekapitulasi bulanan untuk jajaran pimpinan memerlukan waktu lama karena data tersebar.
4. **Keamanan Data**: Dokumentasi publikasi memerlukan kontrol akses berbasis peran (RBAC) agar data internal kedinasan terlindungi.

---

### 3. Tujuan Bisnis (Business Goals & Objectives)
- **Sentralisasi Informasi**: Menyediakan satu portal utama untuk mengelola seluruh data pemberitaan media seputar Dinas Tenaga Kerja.
- **Validasi Bergradasi**: Menerapkan alur persetujuan (*disetujui*, *belum disetujui*, *tolak*) untuk menjaga akurasi informasi publik.
- **Pelaporan Otomatis**: Memfasilitasi cetak laporan rekapitulasi bulanan berformat PDF dengan sekali klik.
- **Meningkatkan Efisiensi Ops**: Mengurangi waktu rekapitulasi berita hingga 80%.

---

### 4. Pemangku Kepentingan (Target Audience & Stakeholders)
1. **Admin (Pengelola Data)**: Bertanggung jawab memasukkan data media, mengedit, memverifikasi, serta mengelola kategori dan pengguna.
2. **Pemimpin (Dinas / Kepala)**: Memantau laporan tren berita bulanan, mengevaluasi isu ketenagakerjaan terkini, dan mengunduh laporan PDF.
3. **Kompetitor / Instansi Eksternal**: Pengguna terdaftar dari pihak luar yang dapat mendaftarkan akun untuk berpartisipasi dan memantau portal.
4. **Masyarakat Umum (Public)**: Pengunjung web yang dapat membaca berita terkini yang telah disetujui.

---

### 5. Indikator Keberhasilan (KPIs & Metrics)
- **Akurasi Data**: 100% berita publik terverifikasi oleh Admin/Pemimpin.
- **Performa Sistem**: Waktu muat halaman kurang dari 2 detik.
- **Ketersediaan Layanan**: Uptime sistem 99.5% memanfaatkan infrastruktur kontainer Docker.
