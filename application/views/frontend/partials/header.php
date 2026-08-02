<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistem Media Monitoring Dinas Tenaga Kerja Kota Semarang">
  <title>Dinas Tenaga Kerja Kota Semarang</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/themefisher-font/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/animate/animate.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/lightbox2/css/lightbox.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/sbadmin/vendor/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/frontend.css') ?>">

  <style>
    :root {
      --brand-50: #fef2f2;
      --brand-100: #fee2e2;
      --brand-500: #ef4444;
      --brand-600: #dc2626;
      --brand-700: #b91c1c;
      --brand-800: #991b1b;
      --brand-900: #7f1d1d;
      --brand-950: #450a0a;

      --gray-50: #f8fafc;
      --gray-100: #f1f5f9;
      --gray-200: #e2e8f0;
      --gray-300: #cbd5e1;
      --gray-400: #94a3b8;
      --gray-500: #64748b;
      --gray-600: #475569;
      --gray-700: #334155;
      --gray-800: #1e293b;
      --gray-900: #0f172a;

      --font-sans: 'Inter', system-ui, -apple-system, sans-serif;
      --font-display: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;

      --radius-md: 0.5rem;
      --radius-lg: 0.75rem;
      --radius-xl: 1rem;
      --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
      --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
      --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.05), 0 4px 6px -4px rgb(0 0 0 / 0.05);

      --transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
    }

    *, *::before, *::after { box-sizing: border-box; }
    html { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; }

    body {
      font-family: var(--font-sans);
      color: var(--gray-700);
      line-height: 1.5;
      margin: 0;
    }

    a { color: inherit; text-decoration: none; }
    img { max-width: 100%; height: auto; display: block; }

    /* ── Navigation ── */
    .navbar-disnaker {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      z-index: 1030;
      background: transparent;
      transition: var(--transition);
    }

    .navbar-disnaker.scrolled {
      background: #fff;
      border-bottom: 1px solid var(--gray-200);
      box-shadow: var(--shadow-sm);
    }

    .navbar-disnaker .container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 72px;
      padding: 0 24px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .navbar-disnaker .nav-brand {
      display: flex;
      align-items: center;
      gap: 12px;
      text-decoration: none;
    }

    .navbar-disnaker .nav-brand img {
      width: 38px;
      height: 38px;
    }

    .navbar-disnaker .nav-brand-text {
      display: flex;
      flex-direction: column;
    }

    .navbar-disnaker .nav-brand-name {
      font-family: var(--font-display);
      font-size: 1rem;
      font-weight: 800;
      letter-spacing: -0.01em;
      color: #fff;
      transition: var(--transition);
      line-height: 1.2;
    }

    .navbar-disnaker .nav-brand-sub {
      font-size: 0.65rem;
      font-weight: 500;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.7);
      transition: var(--transition);
    }

    .navbar-disnaker.scrolled .nav-brand-name { color: var(--gray-900); }
    .navbar-disnaker.scrolled .nav-brand-sub { color: var(--gray-500); }

    .navbar-disnaker .nav-links {
      display: flex;
      align-items: center;
      gap: 2px;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .navbar-disnaker .nav-links a {
      text-decoration: none;
      padding: 8px 16px;
      border-radius: var(--radius-md);
      font-size: 0.875rem;
      font-weight: 500;
      transition: var(--transition);
      color: rgba(255, 255, 255, 0.8);
    }

    .navbar-disnaker .nav-links a:hover {
      background: rgba(255, 255, 255, 0.1);
      color: #fff;
    }

    .navbar-disnaker .nav-links a.active {
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
      font-weight: 600;
    }

    .navbar-disnaker.scrolled .nav-links a { color: var(--gray-600); }
    .navbar-disnaker.scrolled .nav-links a:hover { background: var(--brand-50); color: var(--brand-700); }
    .navbar-disnaker.scrolled .nav-links a.active { background: var(--brand-50); color: var(--brand-700); }

    .navbar-disnaker .nav-right {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    /* Login Button */
    .btn-login-nav {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 8px 20px;
      background: #fff;
      color: var(--brand-700);
      border: none;
      border-radius: var(--radius-md);
      font-size: 0.85rem;
      font-weight: 600;
      font-family: var(--font-sans);
      cursor: pointer;
      transition: var(--transition);
      text-decoration: none;
    }

    .btn-login-nav:hover {
      background: var(--brand-50);
      transform: translateY(-1px);
      box-shadow: var(--shadow-sm);
    }

    .navbar-disnaker.scrolled .btn-login-nav {
      background: var(--brand-700);
      color: #fff;
      box-shadow: 0 4px 6px -1px rgba(185, 28, 28, 0.2);
    }

    .navbar-disnaker.scrolled .btn-login-nav:hover {
      background: var(--brand-800);
      transform: translateY(-1px);
      box-shadow: 0 6px 12px -2px rgba(185, 28, 28, 0.25);
    }

    /* Profile Button */
    .btn-profile {
      display: flex;
      align-items: center;
      gap: 8px;
      padding: 6px 14px 6px 6px;
      border: 1px solid rgba(255, 255, 255, 0.2);
      border-radius: var(--radius-md);
      background: rgba(255, 255, 255, 0.1);
      cursor: pointer;
      font-size: 0.85rem;
      font-weight: 500;
      font-family: var(--font-sans);
      transition: var(--transition);
      color: #fff;
    }

    .btn-profile:hover { background: rgba(255, 255, 255, 0.2); }

    .btn-profile .avatar {
      width: 28px;
      height: 28px;
      border-radius: 6px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.75rem;
      font-weight: 700;
      background: rgba(255, 255, 255, 0.25);
      color: #fff;
    }

    .navbar-disnaker.scrolled .btn-profile {
      border-color: var(--gray-200);
      background: var(--gray-50);
      color: var(--gray-700);
    }

    .navbar-disnaker.scrolled .btn-profile:hover { background: var(--gray-100); }
    .navbar-disnaker.scrolled .btn-profile .avatar { background: var(--brand-700); color: #fff; }

    .btn-profile .dropdown-icon {
      width: 16px;
      height: 16px;
      transition: transform 0.2s ease;
    }

    .btn-profile.open .dropdown-icon { transform: rotate(180deg); }

    .dropdown-menu-custom {
      position: absolute;
      top: calc(100% + 8px);
      right: 0;
      background: #fff;
      border: 1px solid var(--gray-200);
      border-radius: var(--radius-lg);
      box-shadow: var(--shadow-lg);
      min-width: 200px;
      padding: 6px;
      display: none;
      z-index: 1040;
    }

    .dropdown-menu-custom.show { display: block; }

    .dropdown-menu-custom a,
    .dropdown-menu-custom button {
      display: flex;
      align-items: center;
      gap: 10px;
      width: 100%;
      padding: 10px 12px;
      border: none;
      background: none;
      border-radius: var(--radius-md);
      font-size: 0.85rem;
      font-family: var(--font-sans);
      color: var(--gray-600);
      cursor: pointer;
      transition: var(--transition);
      text-decoration: none;
    }

    .dropdown-menu-custom a:hover,
    .dropdown-menu-custom button:hover { background: var(--brand-50); color: var(--brand-700); }

    .dropdown-menu-custom .divider { height: 1px; background: var(--gray-200); margin: 4px 8px; }
    .dropdown-menu-custom .text-danger { color: var(--brand-600); }
    .dropdown-menu-custom .text-danger:hover { background: var(--brand-50); }

    /* Hamburger */
    .navbar-disnaker .nav-toggle {
      display: none;
      background: none;
      border: none;
      padding: 8px;
      cursor: pointer;
      color: #fff;
    }

    .navbar-disnaker.scrolled .nav-toggle { color: var(--gray-600); }

    .navbar-disnaker .nav-toggle svg { width: 24px; height: 24px; }

    /* Non-home pages */
    .page-berita .navbar-disnaker,
    .page-kontak .navbar-disnaker,
    .page-kontributor .navbar-disnaker {
      background: rgba(255, 255, 255, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--gray-200);
      box-shadow: var(--shadow-sm);
    }

    .page-berita .navbar-disnaker .nav-brand-name,
    .page-kontak .navbar-disnaker .nav-brand-name,
    .page-kontributor .navbar-disnaker .nav-brand-name { color: var(--gray-900); }

    .page-berita .navbar-disnaker .nav-brand-sub,
    .page-kontak .navbar-disnaker .nav-brand-sub,
    .page-kontributor .navbar-disnaker .nav-brand-sub { color: var(--gray-500); }

    .page-berita .navbar-disnaker .nav-links a,
    .page-kontak .navbar-disnaker .nav-links a,
    .page-kontributor .navbar-disnaker .nav-links a { color: var(--gray-600); }

    .page-berita .navbar-disnaker .nav-links a:hover,
    .page-kontak .navbar-disnaker .nav-links a:hover,
    .page-kontributor .navbar-disnaker .nav-links a:hover { background: var(--brand-50); color: var(--brand-700); }

    .page-berita .navbar-disnaker .nav-links a.active,
    .page-kontak .navbar-disnaker .nav-links a.active,
    .page-kontributor .navbar-disnaker .nav-links a.active { background: var(--brand-50); color: var(--brand-700); }

    .page-berita .navbar-disnaker .btn-login-nav,
    .page-kontak .navbar-disnaker .btn-login-nav,
    .page-kontributor .navbar-disnaker .btn-login-nav { background: var(--brand-700); color: #fff; }

    .page-berita .navbar-disnaker .btn-login-nav:hover,
    .page-kontak .navbar-disnaker .btn-login-nav:hover,
    .page-kontributor .navbar-disnaker .btn-login-nav:hover { background: var(--brand-800); }

    .page-berita .navbar-disnaker .btn-profile,
    .page-kontak .navbar-disnaker .btn-profile,
    .page-kontributor .navbar-disnaker .btn-profile { border-color: var(--gray-200); background: var(--gray-50); color: var(--gray-700); }

    .page-berita .navbar-disnaker .btn-profile .avatar,
    .page-kontak .navbar-disnaker .btn-profile .avatar,
    .page-kontributor .navbar-disnaker .btn-profile .avatar { background: var(--brand-700); color: #fff; }

    .page-berita .navbar-disnaker .nav-toggle,
    .page-kontak .navbar-disnaker .nav-toggle,
    .page-kontributor .navbar-disnaker .nav-toggle { color: var(--gray-600); }

    @media (max-width: 768px) {
      .navbar-disnaker .nav-links {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #fff;
        border-bottom: 1px solid var(--gray-200);
        box-shadow: var(--shadow-md);
        flex-direction: column;
        padding: 8px 16px;
      }

      .navbar-disnaker .nav-links.open { display: flex; }
      .navbar-disnaker .nav-links a { width: 100%; color: var(--gray-600); }
      .navbar-disnaker .nav-links a:hover { background: var(--brand-50); color: var(--brand-700); }
      .navbar-disnaker .nav-links a.active { background: var(--brand-50); color: var(--brand-700); }
      .navbar-disnaker .nav-toggle { display: block; }
    }
  </style>

<?php
$__segment = $this->uri->segment(1);
$__current = ($__segment == '' || $__segment == 'home') ? 'home' : $__segment;
$__userLoggedIn = $this->session->userdata('logged_in');
$__userName = $this->session->userdata('user_name') ?: 'User';
$__initial = strtoupper(substr($__userName, 0, 1));
?>
</head>
<body class="page-<?= $__current ?>" style="<?= $__current != 'home' ? 'padding-top: 72px; background: #f8fafc;' : 'background: #fff;' ?>">

<nav class="navbar-disnaker <?= $__current != 'home' ? 'scrolled' : '' ?>">
  <div class="container">
    <a class="nav-brand" href="<?= base_url('home') ?>">
      <img src="<?= base_url('assets/images/favicon.ico') ?>" alt="Disnaker">
      <div class="nav-brand-text">
        <span class="nav-brand-name">DISNAKER</span>
        <span class="nav-brand-sub">Media Monitoring</span>
      </div>
    </a>

    <ul class="nav-links" id="navLinks">
      <li><a href="<?= base_url('home') ?>" class="<?= $__current == 'home' ? 'active' : '' ?>">Beranda</a></li>
      <li><a href="<?= base_url('berita') ?>" class="<?= $__current == 'berita' ? 'active' : '' ?>">Berita</a></li>
      <li><a href="<?= base_url('kontak') ?>" class="<?= $__current == 'kontak' ? 'active' : '' ?>">Kontak</a></li>
      <li><a href="<?= base_url('kontributor') ?>" class="<?= $__current == 'kontributor' ? 'active' : '' ?>">Kontributor</a></li>
    </ul>

    <div class="nav-right">
      <?php if ($__userLoggedIn): ?>
      <div style="position:relative">
        <button class="btn-profile" id="profileBtn" onclick="toggleDropdown()">
          <span class="avatar"><?= $__initial ?></span>
          <?= htmlspecialchars($__userName) ?>
          <svg class="dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="dropdown-menu-custom" id="profileDropdown">
          <a href="<?= base_url('dashboard') ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg> Dashboard</a>
          <a href="<?= base_url('profile') ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Profil</a>
          <div class="divider"></div>
          <a href="<?= base_url('auth/logout') ?>" class="text-danger"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg> Keluar</a>
        </div>
      </div>
      <?php else: ?>
      <a href="<?= base_url('auth/login') ?>" class="btn-login-nav"><i class="fas fa-sign-in-alt"></i> Masuk</a>
      <?php endif; ?>
      <button class="nav-toggle" onclick="document.getElementById('navLinks').classList.toggle('open')" aria-label="Toggle menu">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
  </div>
</nav>

<script>
function toggleDropdown(){var m=document.getElementById('profileDropdown'),b=document.getElementById('profileBtn');if(m)m.classList.toggle('show');if(b)b.classList.toggle('open');}
document.addEventListener('click',function(e){var m=document.getElementById('profileDropdown'),b=document.getElementById('profileBtn');if(b&&!b.contains(e.target)&&m&&!m.contains(e.target)){m.classList.remove('show');b.classList.remove('open');}});
(function(){var n=document.querySelector('.navbar-disnaker');if(!n)return;function u(){n.classList.toggle('scrolled',window.scrollY>60)}u();window.addEventListener('scroll',u,{passive:true})})();
</script>
