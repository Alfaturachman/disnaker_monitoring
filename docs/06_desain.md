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

---

### 4. Design System Resmi (Tema "Semarang Red")

> Sumber otoritatif saat ini adalah file `skill.sh` di root proyek. Gunakan panduan ini
> sebagai standar tunggal untuk styling — bukan skema biru pada bagian di atas.

#### 4.1 Design Tokens (CSS Variables)

Semua komponen **WAJIB** menggunakan CSS variables berikut:

| Token | Nilai | Keterangan |
|-------|-------|------------|
| `--brand-50` | `#fef2f2` | lightest red background |
| `--brand-100` | `#fee2e2` | light red border/hover |
| `--brand-500` | `#ef4444` | accent red |
| `--brand-600` | `#dc2626` | primary red text/icon |
| `--brand-700` | `#b91c1c` | primary button, active state |
| `--brand-800` | `#991b1b` | button hover, dark bg |
| `--brand-900` | `#7f1d1d` | darker bg |
| `--brand-950` | `#450a0a` | darkest bg, footer, hero overlay |
| `--gray-50` | `#f8fafc` | page bg |
| `--gray-100` | `#f1f5f9` | section bg |
| `--gray-200` | `#e2e8f0` | border |
| `--gray-500` | `#64748b` | secondary text |
| `--gray-700` | `#334155` | body text |
| `--gray-900` | `#0f172a` | heading text |
| `--font-sans` | `'Inter', system-ui, sans-serif` | body typography |
| `--font-display` | `'Plus Jakarta Sans', sans-serif` | heading typography |

#### 4.2 Aturan Komponen

- **Button Primary**: bg `var(--brand-700)`, hover `var(--brand-800)`, teks `#fff`, font `var(--font-display)`, shadow `0 4px 6px -1px rgba(185, 28, 28, 0.2)`, hover `translateY(-1px)`.
- **Button Secondary**: transparan, border `2px solid rgba(255,255,255,0.25)`, teks `#fff`, hover bg `rgba(255,255,255,0.1)`.
- **Filter Chip**: pill (`border-radius: 999px`); aktif bg `var(--brand-700)` + teks putih; hover bg `var(--brand-50)` + indikator underline.
- **Card**: bg `#fff`, border `1px solid var(--gray-200)`, hover `translateY(-4px)` + shadow-lg + border `brand-100`.
- **Feature Icon Box**: 48×48, bg `var(--brand-50)`, ikon `var(--brand-600)`.
- **Section Badge**: pill, bg `var(--brand-50)`, teks `var(--brand-700)`, uppercase, weight 600.

#### 4.3 Layout

- Hero: `height: 100vh` (max `900px`); Page hero `min-height: 300px` gradasi `brand-950→brand-800`.
- Section padding: `5rem 0`; container `max-width: 1200px`, padding `0 24px`.
- Navbar `72px`; halaman non-home `padding-top: 72px`.
- Login page bg: `linear-gradient(135deg, #7f1d1d, var(--brand-800) 50%, var(--brand-700))`.
- Footer: `linear-gradient(135deg, var(--brand-950), #1a0303)`.

#### 4.4 Responsive Breakpoints

| Breakpoint | Tipe | Perilaku |
|-----------|------|----------|
| `992px` | Tablet | grid 2 kolom |
| `768px` | Mobile | navbar bertumpuk, satu kolom |
| `640px` | Mobile kecil | padding compact, tombol ditumpuk |

#### 4.5 Naming Conventions

- Class: `lowercase-hyphenated` (BEM-like).
- CSS variable: `--kebab-case`.
- File: lowercase dengan underscore (`_`) untuk PHP views.
- Halaman: kelas `page-{name}` pada `<body>`.

#### 4.6 Aturan Terlarang (Forbidden)

- Dilarang menggunakan warna biru (`#2563eb`, `#1d4ed8`, dst).
- Dilarang menggunakan font `Catamaran` — gunakan `--font-display`.
- Dilarang menulis warna hex langsung — selalu gunakan CSS variables.
- Dilarang menaruh `<style>` di BOTTOM file — taruh di TOP.
- Dilarang menggunakan inline-style untuk warna/font.
