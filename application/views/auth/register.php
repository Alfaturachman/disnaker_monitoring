<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Daftar Akun</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      background: #0b1120;
    }

    .register-container {
      display: flex;
      width: 100%;
      min-height: 100vh;
    }

    .register-brand {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 60px 40px;
      background: linear-gradient(135deg, #0b1120 0%, #162544 50%, #0f1f3d 100%);
      position: relative;
      overflow: hidden;
    }

    .register-brand::before {
      content: '';
      position: absolute;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, transparent 70%);
      top: -200px;
      right: -200px;
      border-radius: 50%;
    }

    .register-brand::after {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 70%);
      bottom: -100px;
      left: -100px;
      border-radius: 50%;
    }

    .register-brand-content {
      position: relative;
      z-index: 1;
      text-align: center;
      max-width: 420px;
    }

    .register-brand-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #2563eb, #6366f1);
      border-radius: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 28px;
      box-shadow: 0 8px 32px rgba(37,99,235,0.3);
    }

    .register-brand-icon svg {
      width: 40px;
      height: 40px;
      fill: #fff;
    }

    .register-brand h1 {
      font-size: 28px;
      font-weight: 800;
      color: #fff;
      margin-bottom: 8px;
    }

    .register-brand p {
      font-size: 15px;
      color: #94a3b8;
      line-height: 1.6;
    }

    .register-brand-steps {
      margin-top: 48px;
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .register-brand-step {
      display: flex;
      align-items: center;
      gap: 16px;
      text-align: left;
    }

    .register-brand-step-number {
      width: 36px;
      height: 36px;
      background: rgba(37,99,235,0.15);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
      font-size: 14px;
      font-weight: 700;
      color: #60a5fa;
    }

    .register-brand-step-text h3 {
      font-size: 14px;
      font-weight: 600;
      color: #e2e8f0;
      margin-bottom: 2px;
    }

    .register-brand-step-text p {
      font-size: 12px;
      color: #64748b;
    }

    .register-form-wrapper {
      width: 520px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 40px;
      background: #fff;
      position: relative;
    }

    .register-form-wrapper .back-home {
      position: absolute;
      top: 24px;
      left: 40px;
      font-size: 13px;
      color: #64748b;
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s;
    }

    .register-form-wrapper .back-home:hover {
      color: #2563eb;
    }

    .register-form-wrapper .back-home svg {
      width: 16px;
      height: 16px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .register-form-inner {
      max-width: 400px;
      width: 100%;
      margin: 0 auto;
    }

    .register-form-inner h2 {
      font-size: 24px;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 4px;
    }

    .register-form-inner .register-subtitle {
      font-size: 14px;
      color: #64748b;
      margin-bottom: 28px;
    }

    .alert-message {
      padding: 12px 16px;
      border-radius: 10px;
      font-size: 13px;
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .alert-message.error {
      background: #fef2f2;
      color: #dc2626;
      border: 1px solid #fecaca;
    }

    .alert-message.success {
      background: #f0fdf4;
      color: #16a34a;
      border: 1px solid #bbf7d0;
    }

    .alert-message svg {
      width: 18px;
      height: 18px;
      flex-shrink: 0;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .form-group {
      margin-bottom: 16px;
    }

    .form-group label {
      display: block;
      font-size: 13px;
      font-weight: 600;
      color: #334155;
      margin-bottom: 6px;
    }

    .form-group .input-wrapper {
      position: relative;
    }

    .form-group .input-wrapper svg {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      width: 18px;
      height: 18px;
      stroke: #94a3b8;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
      pointer-events: none;
      transition: stroke 0.2s;
    }

    .form-group .input-wrapper:focus-within svg {
      stroke: #2563eb;
    }

    .form-group input {
      width: 100%;
      padding: 11px 14px 11px 44px;
      border: 1.5px solid #e2e8f0;
      border-radius: 10px;
      font-size: 14px;
      font-family: 'Inter', sans-serif;
      color: #0f172a;
      background: #f8fafc;
      transition: all 0.2s;
      outline: none;
    }

    .form-group input:focus {
      border-color: #2563eb;
      background: #fff;
      box-shadow: 0 0 0 3px rgba(37,99,235,0.1);
    }

    .form-group input::placeholder {
      color: #94a3b8;
    }

    .btn-submit {
      width: 100%;
      padding: 12px;
      background: linear-gradient(135deg, #2563eb, #1d4ed8);
      color: #fff;
      border: none;
      border-radius: 10px;
      font-size: 15px;
      font-weight: 600;
      font-family: 'Inter', sans-serif;
      cursor: pointer;
      transition: all 0.2s;
      margin-top: 8px;
    }

    .btn-submit:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 16px rgba(37,99,235,0.35);
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    .register-form-inner .form-footer {
      margin-top: 20px;
      text-align: center;
    }

    .register-form-inner .form-footer a {
      color: #2563eb;
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      transition: color 0.2s;
    }

    .register-form-inner .form-footer a:hover {
      color: #1d4ed8;
      text-decoration: underline;
    }

    @media (max-width: 900px) {
      .register-brand { display: none; }
      .register-form-wrapper {
        width: 100%;
        min-height: 100vh;
        padding: 60px 24px;
      }
      .register-form-wrapper .back-home { left: 24px; top: 16px; }
    }
  </style>
</head>
<body>
  <div class="register-container">
    <div class="register-brand">
      <div class="register-brand-content">
        <div class="register-brand-icon">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="8.5" cy="7" r="4"/>
            <line x1="20" y1="8" x2="20" y2="14"/>
            <line x1="23" y1="11" x2="17" y2="11"/>
          </svg>
        </div>
        <h1>Daftar Akun</h1>
        <p>Bergabunglah sebagai kontributor<br>Media Monitoring Disnaker Kota Semarang</p>
        <div class="register-brand-steps">
          <div class="register-brand-step">
            <div class="register-brand-step-number">1</div>
            <div class="register-brand-step-text">
              <h3>Lengkapi Data Diri</h3>
              <p>Isi informasi pribadi dan instansi Anda</p>
            </div>
          </div>
          <div class="register-brand-step">
            <div class="register-brand-step-number">2</div>
            <div class="register-brand-step-text">
              <h3>Verifikasi Akun</h3>
              <p>Tim kami akan memverifikasi pendaftaran</p>
            </div>
          </div>
          <div class="register-brand-step">
            <div class="register-brand-step-number">3</div>
            <div class="register-brand-step-text">
              <h3>Mulai Berkontribusi</h3>
              <p>Kirimkan berita dan pantau media</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="register-form-wrapper">
      <a href="<?= base_url('home') ?>" class="back-home">
        <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Kembali ke Beranda
      </a>
      <div class="register-form-inner">
        <h2>Buat Akun Baru</h2>
        <p class="register-subtitle">Isi data dengan lengkap untuk mendaftar</p>

        <?php if ($this->session->flashdata('message')): ?>
          <div class="alert-message error">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            <?= $this->session->flashdata('message') ?>
          </div>
        <?php endif; ?>

        <?php if (validation_errors()): ?>
          <div class="alert-message error">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            <?= validation_errors() ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/register') ?>" method="POST">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
              <input type="text" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
          </div>
          <div class="form-group">
            <label>Email</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <input type="email" name="email" placeholder="Masukkan email" required>
            </div>
          </div>
          <div class="form-group">
            <label>Password</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input type="password" name="password" placeholder="Min. 6 karakter" required>
            </div>
          </div>
          <div class="form-group">
            <label>Konfirmasi Password</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input type="password" name="password_confirm" placeholder="Ulangi password" required>
            </div>
          </div>
          <div class="form-group">
            <label>Nomor Telepon</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <input type="text" name="telp" placeholder="Masukkan nomor telepon" required>
            </div>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <input type="text" name="alamat" placeholder="Masukkan alamat" required>
            </div>
          </div>
          <div class="form-group">
            <label>Instansi</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
              <input type="text" name="instansi" placeholder="Masukkan instansi" required>
            </div>
          </div>
          <div class="form-group">
            <label>Jabatan</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
              <input type="text" name="jabatan" placeholder="Masukkan jabatan di instansi" required>
            </div>
          </div>
          <div class="form-group">
            <label>Alasan Mendaftar</label>
            <div class="input-wrapper">
              <svg viewBox="0 0 24 24"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
              <input type="text" name="alasan" placeholder="Alasan menjadi kontributor" required>
            </div>
          </div>
          <button type="submit" class="btn-submit">Daftar</button>
        </form>

        <div class="form-footer">
          <a href="<?= base_url('auth/login') ?>">Sudah punya akun? Masuk</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
