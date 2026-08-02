# Panduan Desain & System UI/UX
## Sistem Monitoring Media Disnaker

---

### 1. Prinsip Desain (Design Principles)
Antarmuka pengguna (UI) dirancang mengacu pada prinsip modern kedinasan:
- **Profesional & Bersih**: Layout bertema biru kedinasan (*Corporate Blue*) dipadukan dengan latar belakang putih netral untuk tingkat pembacaan yang optimal.
- **Responsif**: Desain dinamis beradaptasi sempurna di layar Desktop, Tablet, maupun Smartphone (*Mobile-first approach*).
- **Aksesibel**: Kontras warna tinggi dan navigasi intuitif berbasis kartu (*Card layout*) serta tabel data interaktif.

---

### 2. Palette Warna & Tipografi

#### 2.1 Skema Warna (Color Palette)
- **Primary Color**: `#0d6efd` (Royal Blue - Aksesibilitas & Navigasi Utama)
- **Secondary Color**: `#198754` (Success Green - Status Disetujui / Tombol Tambah)
- **Warning Color**: `#ffc107` (Amber Gold - Status Belum Disetujui)
- **Danger Color**: `#dc3545` (Crimson Red - Status Ditolak / Hapus Data)
- **Background Light**: `#f8f9fa` (Light Gray - Latar Belakang Panel)
- **Dark Neutral**: `#212529` (Charcoal - Teks Utama & Header Navbar)

#### 2.2 Tipografi (Typography System)
- **Font Family**: Google Fonts `Inter`, `Roboto`, system-ui, sans-serif
- **Heading 1**: 28px / SemiBold (Judul Halaman Panel)
- **Heading 2**: 22px / Medium (Judul Kartu Berita / Section)
- **Body Text**: 14px / Regular (Isi Berita & Tabel Data)
- **Caption / Meta**: 12px / Muted (Tanggal & View Count)

---

### 3. Komponen Utama Layout UI

1. **Top Navbar**: Menampilkan logo Disnaker, indikator status login, dan nama akun pengguna terautentikasi.
2. **Side Navigation**: Akses navigasi cepat ke Dashboard, Data Media, Data Kategori, Data User, Laporan, dan Logout.
3. **Data Table Component**: Tabel data interaktif yang dilengkapi pencarian, pagination, badge status, dan tombol aksi (Edit/Status/Hapus).
4. **News Cards (Frontend)**: Kartu grid berita publik yang menampilkan gambar pendukung, badge kategori, tanggal posting, dan counter pembaca.
