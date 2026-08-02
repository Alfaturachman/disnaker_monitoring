# Dokumentasi Strategi Pengujian & QA (Testing)
## Sistem Monitoring Media Disnaker

---

### 1. Strategi Pengujian (Testing Strategy)
Pengujian otomatis dilakukan menggunakan **PHPUnit 9.6** terintegrasi dengan **ci-phpunit-test** dan database SQLite terisolasi (*in-memory / file DB*).

Strategi pengujian mencakup 2 lapisan utama:
1. **Unit Tests (Model)**: Memastikan kueri database, CRUD, kalkulasi data, dan logika relasi pada tabel bekerja dengan benar.
2. **Feature Tests (Controller)**: Memastikan otorisasi RBAC, alur HTTP request/response, redirect, dan pengubahan state berjalan sesuai spesifikasi tanpa regresi.

---

### 2. Ringkasan Pengujian Otomatis

```text
Database test.sqlite initialized successfully.
PHPUnit 9.6.22 by Sebastian Bergmann and contributors.

Unit Tests (Models)         : 18 tests, 34 assertions (100% OK)
Feature Tests (Controllers)  : 20 tests, 37 assertions (100% OK)
------------------------------------------------------------------
Total Execution             : 38 tests, 71 assertions (100% Passed)
Execution Time              : ~1.4 detik
```

---

### 3. Matriks Cakupan Test Case

#### 3.1 Unit Test Models (`application/tests/models/`)
| Nama Test File | Metode yang Diuji | Status |
| :--- | :--- | :---: |
| `Auth_model_test.php` | `register()`, `emailExists()`, `login()`, `getUserType()`, `getUserDetails()` | PASSED |
| `KategoriModel_test.php` | `insert_kategori()`, `getAllKategori()`, `getKategoriById()`, `update_kategori()`, `delete_kategori()` | PASSED |
| `UserModel_test.php` | `getAllUser()`, `getUserByEmail()`, `getUserById()`, `updateAdmin()`, `deleteUser()` | PASSED |
| `Berita_model_test.php` | `get_all_kategori()`, `get_berita_by_kategori()`, `search_berita()` | PASSED |

#### 3.2 Feature Test Controllers (`application/tests/controllers/`)
| Nama Test File | Skenario Pengujian | Status |
| :--- | :--- | :---: |
| `Auth_test.php` | Render halaman login & registrasi, registrasi kompetitor, login valid admin, login invalid, logout session destroy | PASSED |
| `Kategori_test.php` | Proteksi unauthenticated (redirect login), proteksi role unauthorized (redirect home), admin access, create, update, delete | PASSED |
| `Media_test.php` | Proteksi guest & kompetitor, admin view media list, update status (disetujui/tolak), delete media | PASSED |

---

### 4. Perintah Eksekusi Pengujian

```bash
# Menjalankan seluruh test suite
vendor\bin\phpunit -c application/tests/phpunit.xml

# Menjalankan test suite Model saja
vendor\bin\phpunit -c application/tests/phpunit.xml --testsuite "Unit Tests (Models)"

# Menjalankan test suite Controller saja
vendor\bin\phpunit -c application/tests/phpunit.xml --testsuite "Feature Tests (Controllers)"
```
