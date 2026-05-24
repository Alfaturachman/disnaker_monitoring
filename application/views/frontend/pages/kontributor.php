<section class="page-hero kontributor-hero">
  <div class="kontributor-hero-glow"></div>
  <div class="page-hero-overlay"></div>
  <div class="page-hero-content">
    <h1>Kontributor</h1>
    <p>Bagikan informasi dan berita terkait ketenagakerjaan di Kota Semarang</p>
  </div>
</section>

<section class="page-body kontributor-body">
  <div class="container">
    <div class="page-card kontributor-card">
      <div class="kontributor-card-header">
        <div class="header-icon">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
        </div>
        <h2>Tambah Media Baru</h2>
        <p>Isi formulir di bawah untuk menambahkan berita ke sistem monitoring</p>
      </div>

      <div class="kontributor-card-body">
        <?php if (!$this->session->userdata('user_id')): ?>
          <div class="login-alert">
            <div class="alert-icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="28" height="28"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h3>Perhatian!</h3>
            <p>Anda harus <strong>login</strong> terlebih dahulu untuk menambahkan media berita.</p>
            <a href="<?= base_url('auth/login') ?>" class="btn-login-now">Login Sekarang</a>
          </div>
        <?php else: ?>
          <?php if (isset($error) && $error): ?>
            <div class="error-alert">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
              <?= $error ?>
            </div>
          <?php endif; ?>

          <?= validation_errors('<div class="error-alert"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>', '</div>'); ?>

          <form action="<?= base_url('kontributor/create') ?>" method="post" enctype="multipart/form-data" class="kontributor-form">
            <div class="form-row">
              <div class="form-group">
                <label for="nama">Nama Media</label>
                <input type="text" name="nama" id="nama" class="form-input" placeholder="Masukkan nama media/sumber" value="<?= set_value('nama') ?>" required>
              </div>
              <div class="form-group">
                <label for="id_kategori">Kategori</label>
                <select name="id_kategori" id="id_kategori" class="form-input" required>
                  <option value="">Pilih kategori</option>
                  <?php foreach ($kategori as $kat): ?>
                    <option value="<?= $kat->id ?>" <?= set_select('id_kategori', $kat->id) ?>><?= $kat->nama_kategori ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="judul">Judul Berita</label>
              <input type="text" name="judul" id="judul" class="form-input" placeholder="Masukkan judul berita" value="<?= set_value('judul') ?>" required>
            </div>

            <div class="form-group">
              <label for="url">URL Berita</label>
              <input type="url" name="url" id="url" class="form-input" placeholder="https://example.com/berita" value="<?= set_value('url') ?>" required>
            </div>

            <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <textarea name="deskripsi" id="deskripsi" class="form-input form-textarea" rows="4" placeholder="Masukkan deskripsi berita"><?= set_value('deskripsi') ?></textarea>
            </div>

            <div class="form-group">
              <label for="gambar">Upload Gambar</label>
              <div class="file-upload" id="fileUpload">
                <input type="file" name="gambar" id="gambar" accept="image/*" required>
                <div class="file-upload-placeholder">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="32" height="32"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                  <span>Klik untuk upload gambar</span>
                  <span class="file-hint">JPG, PNG atau GIF. Maks 2MB.</span>
                </div>
                <div class="file-name" id="fileName"></div>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn-submit">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/><polyline points="17 21 17 13 7 13 7 21"/><polyline points="7 3 7 8 15 8"/></svg>
                Simpan Media
              </button>
            </div>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php if ($this->session->flashdata('success')): ?>
<div class="page-toast" id="successToast">
  <div class="toast-icon">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><polyline points="9 11 12 14 22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
  </div>
  <span>Media berhasil ditambahkan!</span>
  <button onclick="this.parentElement.remove()">&times;</button>
</div>
<script>setTimeout(function(){var t=document.getElementById('successToast');if(t)t.remove();},5000);</script>
<?php endif; ?>

<script>
document.getElementById('gambar')?.addEventListener('change', function() {
  var name = this.files && this.files[0] ? this.files[0].name : '';
  var el = document.getElementById('fileName');
  if (el) el.textContent = name;
});
</script>

<style>
.kontributor-card {
  max-width: 720px;
  margin: 0 auto;
}

.kontributor-card-header {
  text-align: center;
  padding: 32px 32px 0;
}

.header-icon {
  width: 56px;
  height: 56px;
  background: #eff6ff;
  border-radius: 14px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  color: #2563eb;
  margin-bottom: 16px;
}

.kontributor-card-header h2 {
  font-size: 1.35rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 6px;
}

.kontributor-card-header p {
  font-size: 0.9rem;
  color: #64748b;
  margin-bottom: 0;
}

.kontributor-card-body {
  padding: 28px 32px 32px;
}

.login-alert {
  text-align: center;
  padding: 40px 20px;
}

.alert-icon {
  width: 56px;
  height: 56px;
  background: #fef3c7;
  border-radius: 14px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  color: #d97706;
  margin-bottom: 16px;
}

.login-alert h3 {
  font-size: 1.15rem;
  font-weight: 700;
  color: #0f172a;
  margin-bottom: 8px;
}

.login-alert p {
  font-size: 0.92rem;
  color: #64748b;
  margin-bottom: 20px;
}

.btn-login-now {
  display: inline-flex;
  padding: 10px 28px;
  background: #2563eb;
  color: #fff;
  border-radius: 10px;
  font-size: 0.9rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s;
}

.btn-login-now:hover {
  background: #1d4ed8;
  color: #fff;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(37,99,235,0.3);
}

.kontributor-form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 20px;
}

.form-group {
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.form-group label {
  font-size: 0.85rem;
  font-weight: 600;
  color: #334155;
}

.form-textarea {
  resize: vertical;
  min-height: 100px;
}

.file-upload {
  position: relative;
  border: 2px dashed #e2e8f0;
  border-radius: 12px;
  padding: 28px 20px;
  text-align: center;
  cursor: pointer;
  transition: all 0.2s;
}

.file-upload:hover {
  border-color: #93c5fd;
  background: #f8fafc;
}

.file-upload input[type="file"] {
  position: absolute;
  inset: 0;
  opacity: 0;
  cursor: pointer;
}

.file-upload-placeholder {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  color: #64748b;
}

.file-upload-placeholder svg { color: #94a3b8; }

.file-upload-placeholder span {
  font-size: 0.9rem;
  font-weight: 500;
  color: #475569;
}

.file-hint {
  font-size: 0.78rem !important;
  font-weight: 400 !important;
  color: #94a3b8 !important;
}

.file-name {
  margin-top: 8px;
  font-size: 0.82rem;
  color: #2563eb;
  font-weight: 500;
}

.form-actions {
  display: flex;
  justify-content: flex-end;
  padding-top: 4px;
}

.btn-submit {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 12px 28px;
  background: #2563eb;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 0.9rem;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.2s;
  font-family: inherit;
}

.btn-submit:hover {
  background: #1d4ed8;
  transform: translateY(-1px);
  box-shadow: 0 4px 12px rgba(37,99,235,0.3);
}

@media (max-width: 640px) {
  .kontributor-card { border-radius: 0; border-left: none; border-right: none; }
  .kontributor-card-header { padding: 24px 20px 0; }
  .kontributor-card-body { padding: 20px; }
  .form-row { grid-template-columns: 1fr; }
}
</style>