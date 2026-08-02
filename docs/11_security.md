# Keamanan Aplikasi & Mitigasi OWASP Top 10
## Sistem Monitoring Media Disnaker

---

### 1. Ringkasan Fitur Keamanan

Sistem Monitoring Media Disnaker telah dikonfigurasi dan diperkuat (*security hardening*) terhadap potensi ancaman keamanan siber utama.

| Area Keamanan | Mekanisme Perlindungan | Status Implemetasi |
| :--- | :--- | :---: |
| **Broken Access Control** | Otorisasi berbasis peran (RBAC) pada constructor controller backend | Aktif |
| **CSRF Protection** | Token CSRF pada seluruh masukan form POST | Aktif |
| **Session Security** | Session cookie dengan atribut `HttpOnly = TRUE`, `SameSite = Lax` | Aktif |
| **Encryption Key** | Kunci enkripsi 32-karakter acak terkonfigurasi di `config.php` | Aktif |
| **SQL Injection Defense** | Query builder / Active Record dengan prepared statement parameters | Aktif |
| **XSS Defense** | Sanitasi input data `trim`, `html_escape()`, dan tipe data spesifik | Aktif |
| **Password Storage** | Algoritma `PASSWORD_DEFAULT` (BCrypt dengan salt otomatis) | Aktif |
| **Physical Storage Leak** | Pembersihan file fisik gambar (`unlink`) saat record berita dihapus | Aktif |

---

### 2. Penjelasan Mitigasi Keamanan Utama

#### 2.1 Proteksi Broken Access Control (OWASP A01:2021)
Controller backend (`Media.php`, `Laporan.php`, `Cetak.php`, `User.php`, `Kategori.php`) dilindungi pemeriksaan sesi di level `__construct()`:

```php
if (!$this->session->userdata('logged_in')) {
    $this->session->set_flashdata('message', 'Silakan login terlebih dahulu!');
    redirect('auth/login');
}

$userType = $this->session->userdata('user_type');
if (!in_array($userType, ['admin', 'pemimpin'])) {
    $this->session->set_flashdata('message', 'Anda tidak memiliki akses ke halaman ini!');
    redirect('home');
}
```

#### 2.2 Proteksi Cross-Site Request Forgery / CSRF (OWASP A01:2021 / A05:2021)
Fitur CSRF diaktifkan di `application/config/config.php`:
```php
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_test_name';
$config['csrf_cookie_name'] = 'csrf_cookie_name';
$config['csrf_expire'] = 7200;
```

#### 2.3 Keamanan Sesi & Cookie (OWASP A07:2021)
Untuk mencegah pencurian cookie session melalui serangan Cross-Site Scripting (XSS), cookie dikunci agar hanya dapat diakses melalui protokol HTTP(S) dan tidak dapat dibaca oleh script JavaScript client-side:
```php
$config['cookie_httponly'] = TRUE;
$config['cookie_samesite'] = 'Lax';
```
