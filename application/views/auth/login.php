<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      min-height: 100vh;
      display: flex;
      background: #0b1120;
    }

    .login-container {
      display: flex;
      width: 100%;
      min-height: 100vh;
    }

    .login-brand {
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

    .login-brand::before {
      content: '';
      position: absolute;
      width: 600px;
      height: 600px;
      background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, transparent 70%);
      top: -200px;
      right: -200px;
      border-radius: 50%;
    }

    .login-brand::after {
      content: '';
      position: absolute;
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, rgba(99,102,241,0.1) 0%, transparent 70%);
      bottom: -100px;
      left: -100px;
      border-radius: 50%;
    }

    .login-brand-content {
      position: relative;
      z-index: 1;
      text-align: center;
      max-width: 420px;
    }

    .login-brand-icon {
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

    .login-brand-icon svg {
      width: 40px;
      height: 40px;
      fill: #fff;
    }

    .login-brand h1 {
      font-size: 28px;
      font-weight: 800;
      color: #fff;
      margin-bottom: 8px;
    }

    .login-brand p {
      font-size: 15px;
      color: #94a3b8;
      line-height: 1.6;
    }

    .login-brand-features {
      margin-top: 48px;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }

    .login-brand-feature {
      display: flex;
      align-items: center;
      gap: 14px;
      text-align: left;
    }

    .login-brand-feature-icon {
      width: 36px;
      height: 36px;
      background: rgba(37,99,235,0.15);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .login-brand-feature-icon svg {
      width: 18px;
      height: 18px;
      stroke: #60a5fa;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .login-brand-feature-text h3 {
      font-size: 14px;
      font-weight: 600;
      color: #e2e8f0;
      margin-bottom: 2px;
    }

    .login-brand-feature-text p {
      font-size: 12px;
      color: #64748b;
    }

    .login-form-wrapper {
      width: 480px;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 40px;
      background: #fff;
      position: relative;
    }

    .login-form-wrapper .back-home {
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

    .login-form-wrapper .back-home:hover {
      color: #2563eb;
    }

    .login-form-wrapper .back-home svg {
      width: 16px;
      height: 16px;
      stroke: currentColor;
      fill: none;
      stroke-width: 2;
      stroke-linecap: round;
      stroke-linejoin: round;
    }

    .login-form-inner {
      max-width: 360px;
      width: 100%;
      margin: 0 auto;
    }

    .login-form-inner h2 {
      font-size: 24px;
      font-weight: 700;
      color: #0f172a;
      margin-bottom: 4px;
    }

    .login-form-inner .login-subtitle {
      font-size: 14px;
      color: #64748b;
      margin-bottom: 32px;
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
      margin-bottom: 20px;
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
      padding: 12px 14px 12px 44px;
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

    .login-form-inner .form-footer {
      margin-top: 24px;
      text-align: center;
    }

    .login-form-inner .form-footer a {
      color: #2563eb;
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      transition: color 0.2s;
    }

    .login-form-inner .form-footer a:hover {
      color: #1d4ed8;
      text-decoration: underline;
    }

    .login-form-inner .form-footer .divider {
      color: #cbd5e1;
      margin: 0 8px;
    }

    @media (max-width: 900px) {
      .login-brand { display: none; }
      .login-form-wrapper {
        width: 100%;
        min-height: 100vh;
        padding: 40px 24px;
      }
      .login-form-wrapper .back-home { left: 24px; }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-brand">
      <div class="login-brand-content">
        <div class="login-brand-icon">
          <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
          </svg>
        </div>
        <h1>Media Monitoring</h1>
        <p>Disnaker Kota Semarang<br>Pantau pemberitaan media secara real-time</p>
        <div class="login-brand-features">
          <div class="login-brand-feature">
            <div class="login-brand-feature-icon">
              <svg viewBox="0 0 24 24"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
            </div>
            <div class="login-brand-feature-text">
              <h3>Monitoring Real-time</h3>
              <p>Pantau berita dari berbagai sumber media</p>
            </div>
          </div>
          <div class="login-brand-feature">
            <div class="login-brand-feature-icon">
              <svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
            </div>
            <div class="login-brand-feature-text">
              <h3>Laporan Berkala</h3>
              <p>Data tersaji dalam bentuk grafik dan statistik</p>
            </div>
          </div>
          <div class="login-brand-feature">
            <div class="login-brand-feature-icon">
              <svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div class="login-brand-feature-text">
              <h3>Akses Aman</h3>
              <p>Setiap pengguna memiliki akses sesuai perannya</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="login-form-wrapper">
      <a href="<?= base_url('home') ?>" class="back-home">
        <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Kembali ke Beranda
      </a>
      <div class="login-form-inner">
        <h2>Selamat Datang</h2>
        <p class="login-subtitle">Silakan login untuk melanjutkan</p>

        <?php if ($this->session->flashdata('message')): ?>
          <div class="alert-message error">
            <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>
            <?= $this->session->flashdata('message') ?>
          </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/login') ?>" method="POST">
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
              <input type="password" name="password" placeholder="Masukkan password" required>
            </div>
          </div>
          <button type="submit" class="btn-submit">Login</button>
        </form>

        <div class="form-footer">
          <a href="<?= base_url('auth/register') ?>">Belum punya akun? Daftar</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
