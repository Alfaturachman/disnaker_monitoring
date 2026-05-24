<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sistem Media Monitoring Dinas Tenaga Kerja Kota Semarang">
  <title>Dinas Tenaga Kerja Kota Semarang</title>
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('assets/images/favicon.ico') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/plugins/bootstrap/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/themefisher-font/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/animate/animate.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/slick/slick.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/plugins/lightbox2/css/lightbox.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/css/frontend.css') ?>">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
    .navbar-disnaker {
      position: fixed; top: 0; left: 0; right: 0; z-index: 1030;
      background: transparent; backdrop-filter: blur(0); -webkit-backdrop-filter: blur(0);
      border-bottom: 1px solid transparent; transition: all 0.3s ease;
    }
    .navbar-disnaker.scrolled {
      background: #fff;
      border-bottom: 1px solid #e2e8f0;
      box-shadow: 0 1px 3px rgba(0,0,0,0.06);
    }
    .navbar-disnaker.scrolled .nav-brand span { color: #0f172a; }
    .navbar-disnaker.scrolled .nav-brand span small { color: #64748b; }
    .navbar-disnaker .nav-brand span { color: #fff; }
    .navbar-disnaker .nav-brand span small { color: rgba(255,255,255,0.7); }
    .navbar-disnaker .nav-links a { color: rgba(255,255,255,0.8); }
    .navbar-disnaker .nav-links a:hover { background: rgba(255,255,255,0.1); color: #fff; }
    .navbar-disnaker .nav-links a.active { background: rgba(255,255,255,0.15); color: #fff; }
    .navbar-disnaker.scrolled .nav-links a { color: #475569; }
    .navbar-disnaker.scrolled .nav-links a:hover { background: #f1f5f9; color: #0f172a; }
    .navbar-disnaker.scrolled .nav-links a.active { background: #eff6ff; color: #2563eb; }
    .navbar-disnaker .nav-toggle { color: #fff; }
    .navbar-disnaker.scrolled .nav-toggle { color: #475569; }
    .btn-login { background: #fff; color: #2563eb; }
    .btn-login:hover { background: #f1f5f9; color: #1d4ed8; box-shadow: 0 4px 12px rgba(0,0,0,0.2); transform: translateY(-1px); }
    .navbar-disnaker.scrolled .btn-login { background: #2563eb; color: #fff; }
    .navbar-disnaker.scrolled .btn-login:hover { background: #1d4ed8; color: #fff; }
    .navbar-disnaker .btn-profile { background: rgba(255,255,255,0.1); color: #fff; }
    .navbar-disnaker .btn-profile:hover { background: rgba(255,255,255,0.2); }
    .navbar-disnaker .btn-profile .avatar { background: rgba(255,255,255,0.25); color: #fff; }
    .navbar-disnaker.scrolled .btn-profile { background: #f1f5f9; color: #0f172a; }
    .navbar-disnaker.scrolled .btn-profile:hover { background: #e2e8f0; }
    .navbar-disnaker.scrolled .btn-profile .avatar { background: #2563eb; color: #fff; }
    .navbar-disnaker .container {
      display: flex; align-items: center; justify-content: space-between;
      height: 76px; padding: 0 24px; max-width: 1200px; margin: 0 auto;
    }
    .navbar-disnaker .nav-brand { display: flex; align-items: center; gap: 12px; text-decoration: none; }
    .navbar-disnaker .nav-brand img { width: 40px; height: 40px; }
    .navbar-disnaker .nav-brand span { font-size: 1rem; font-weight: 700; line-height: 1.3; }
    .navbar-disnaker .nav-brand span small { display: block; font-size: 0.7rem; font-weight: 400; }
    .navbar-disnaker .nav-links { display: flex; align-items: center; gap: 4px; list-style: none; margin: 0; padding: 0; }
    .navbar-disnaker .nav-links a {
      text-decoration: none; padding: 8px 16px; border-radius: 8px;
      font-size: 0.88rem; font-weight: 500; transition: all 0.2s ease;
    }
    .navbar-disnaker .nav-links a:hover { }
    .navbar-disnaker .nav-links a.active { font-weight: 600; }
    .navbar-disnaker .nav-right { display: flex; align-items: center; gap: 8px; }
    .navbar-disnaker .nav-toggle { display: none; background: none; border: none; padding: 8px; cursor: pointer; }
    .navbar-disnaker .nav-toggle svg { width: 24px; height: 24px; }
    .btn-login {
      padding: 8px 20px; border: none; border-radius: 8px;
      font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease; text-decoration: none;
    }
    .btn-login:hover { transform: translateY(-1px); box-shadow: 0 4px 12px rgba(37,99,235,0.3); }
    .btn-profile {
      display: flex; align-items: center; gap: 8px; padding: 6px 14px 6px 6px;
      border: none; border-radius: 8px; cursor: pointer;
      font-size: 0.85rem; font-weight: 500; transition: all 0.2s ease;
    }
    .btn-profile .avatar { width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700; }
    .btn-profile .dropdown-icon { width: 16px; height: 16px; transition: transform 0.2s ease; }
    .btn-profile.open .dropdown-icon { transform: rotate(180deg); }
    .dropdown-menu-custom {
      position: absolute; top: calc(100% + 8px); right: 0; background: #fff;
      border: 1px solid #e2e8f0; border-radius: 12px; box-shadow: 0 12px 32px rgba(0,0,0,0.1);
      min-width: 200px; padding: 6px; display: none; z-index: 1040;
    }
    .dropdown-menu-custom.show { display: block; }
    .dropdown-menu-custom a, .dropdown-menu-custom button {
      display: flex; align-items: center; gap: 10px; width: 100%; padding: 10px 12px;
      border: none; background: none; border-radius: 8px; font-size: 0.85rem;
      color: #475569; cursor: pointer; transition: all 0.15s ease; text-decoration: none;
    }
    .dropdown-menu-custom a:hover, .dropdown-menu-custom button:hover { background: #f1f5f9; color: #0f172a; }
    .dropdown-menu-custom .divider { height: 1px; background: #e2e8f0; margin: 4px 8px; }
    .dropdown-menu-custom .text-danger { color: #ef4444; }
    .dropdown-menu-custom .text-danger:hover { background: #fef2f2; }
    @media (max-width: 768px) {
      .navbar-disnaker .nav-links {
        display: none; position: absolute; top: 100%; left: 0; right: 0;
        background: rgba(255,255,255,0.98); backdrop-filter: blur(16px);
        border-bottom: 1px solid #e2e8f0; flex-direction: column; padding: 8px 16px;
      }
      .navbar-disnaker .nav-links.open { display: flex; }
      .navbar-disnaker .nav-links a { width: 100%; color: #475569; }
      .navbar-disnaker .nav-links a:hover { background: #f1f5f9; color: #0f172a; }
      .navbar-disnaker .nav-links a.active { background: #eff6ff; color: #2563eb; }
      .navbar-disnaker .nav-toggle { display: block; }
      .navbar-disnaker .nav-brand span { font-size: 0.85rem; }
    }
    .page-berita .navbar-disnaker,
    .page-kontak .navbar-disnaker,
    .page-kontributor .navbar-disnaker {
      background: rgba(11, 17, 32, 0.85);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .page-berita .navbar-disnaker.scrolled,
    .page-kontak .navbar-disnaker.scrolled,
    .page-kontributor .navbar-disnaker.scrolled {
      background: #fff;
      border-bottom: 1px solid #e2e8f0;
    }
    .page-berita .navbar-disnaker.scrolled .nav-brand span,
    .page-kontak .navbar-disnaker.scrolled .nav-brand span,
    .page-kontributor .navbar-disnaker.scrolled .nav-brand span { color: #0f172a; }
    .page-berita .navbar-disnaker.scrolled .nav-brand span small,
    .page-kontak .navbar-disnaker.scrolled .nav-brand span small,
    .page-kontributor .navbar-disnaker.scrolled .nav-brand span small { color: #64748b; }
    .page-berita .navbar-disnaker.scrolled .nav-links a,
    .page-kontak .navbar-disnaker.scrolled .nav-links a,
    .page-kontributor .navbar-disnaker.scrolled .nav-links a { color: #475569; }
    .page-berita .navbar-disnaker.scrolled .nav-links a:hover,
    .page-kontak .navbar-disnaker.scrolled .nav-links a:hover,
    .page-kontributor .navbar-disnaker.scrolled .nav-links a:hover { background: #f1f5f9; color: #0f172a; }
    .page-berita .navbar-disnaker.scrolled .nav-links a.active,
    .page-kontak .navbar-disnaker.scrolled .nav-links a.active,
    .page-kontributor .navbar-disnaker.scrolled .nav-links a.active { background: #eff6ff; color: #2563eb; }
    .page-berita .navbar-disnaker.scrolled .nav-toggle,
    .page-kontak .navbar-disnaker.scrolled .nav-toggle,
    .page-kontributor .navbar-disnaker.scrolled .nav-toggle { color: #475569; }
    .page-berita .navbar-disnaker.scrolled .btn-login,
    .page-kontak .navbar-disnaker.scrolled .btn-login,
    .page-kontributor .navbar-disnaker.scrolled .btn-login { background: #2563eb; color: #fff; }
    .page-berita .navbar-disnaker.scrolled .btn-login:hover,
    .page-kontak .navbar-disnaker.scrolled .btn-login:hover,
    .page-kontributor .navbar-disnaker.scrolled .btn-login:hover { background: #1d4ed8; color: #fff; }
    .page-berita .navbar-disnaker.scrolled .btn-profile,
    .page-kontak .navbar-disnaker.scrolled .btn-profile,
    .page-kontributor .navbar-disnaker.scrolled .btn-profile { background: #f1f5f9; color: #0f172a; }
    .page-berita .navbar-disnaker.scrolled .btn-profile:hover,
    .page-kontak .navbar-disnaker.scrolled .btn-profile:hover,
    .page-kontributor .navbar-disnaker.scrolled .btn-profile:hover { background: #e2e8f0; }
    .page-berita .navbar-disnaker.scrolled .btn-profile .avatar,
    .page-kontak .navbar-disnaker.scrolled .btn-profile .avatar,
    .page-kontributor .navbar-disnaker.scrolled .btn-profile .avatar { background: #2563eb; color: #fff; }
    @media (max-width: 768px) {
      .page-berita .navbar-disnaker .nav-links,
      .page-kontak .navbar-disnaker .nav-links,
      .page-kontributor .navbar-disnaker .nav-links { background: rgba(255,255,255,0.98); }
    }
  </style>
<?php
$__segment = $this->uri->segment(1);
$__current = ($__segment == '' || $__segment == 'home') ? 'home' : $__segment;
$__userLoggedIn = $this->session->userdata('logged_in');
$__userName = $this->session->userdata('user_name') ?: 'User';
$__initial = strtoupper(substr($__userName, 0, 1));
?></head>
<body class="page-<?= $__current ?>" style="<?= $__current != 'home' ? 'padding-top:76px;background:#f8fafc;' : 'background:#fff;' ?>">
<nav class="navbar-disnaker <?= $__current != 'home' ? 'scrolled' : '' ?>">
  <div class="container">
    <a class="nav-brand" href="<?= base_url('home') ?>">
      <img src="<?= base_url('assets/images/favicon.ico') ?>" alt="Disnaker">
      <span>Disnaker Semarang<small>Media Monitoring</small></span>
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="<?= base_url('home') ?>" class="<?= $__current == 'home' ? 'active' : '' ?>">Home</a></li>
      <li><a href="<?= base_url('berita') ?>" class="<?= $__current == 'berita' ? 'active' : '' ?>">Berita</a></li>
      <li><a href="<?= base_url('kontak') ?>" class="<?= $__current == 'kontak' ? 'active' : '' ?>">Kontak</a></li>
      <li><a href="<?= base_url('kontributor') ?>" class="<?= $__current == 'kontributor' ? 'active' : '' ?>">Kontributor</a></li>
    </ul>
    <div class="nav-right">
      <?php if ($__userLoggedIn): ?>
      <div style="position:relative">
        <button class="btn-profile" id="profileBtn" onclick="toggleDropdown()">
          <span class="avatar"><?= $__initial ?></span>
          <?= $__userName ?>
          <svg class="dropdown-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="dropdown-menu-custom" id="profileDropdown">
          <a href="<?= base_url('dashboard') ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg> Dashboard</a>
          <a href="<?= base_url('profile') ?>"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Profile</a>
          <div class="divider"></div>
          <a href="<?= base_url('auth/logout') ?>" class="text-danger"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg> Logout</a>
        </div>
      </div>
      <?php else: ?>
      <a href="<?= base_url('auth/login') ?>" class="btn-login">Login</a>
      <?php endif; ?>
      <button class="nav-toggle" onclick="document.getElementById('navLinks').classList.toggle('open')">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
  </div>
</nav>
<script>
function toggleDropdown(){document.getElementById('profileDropdown').classList.toggle('show');document.getElementById('profileBtn').classList.toggle('open');}
document.addEventListener('click',function(e){var m=document.getElementById('profileDropdown'),b=document.getElementById('profileBtn');if(b&&!b.contains(e.target)&&m&&!m.contains(e.target)){m.classList.remove('show');b.classList.remove('open');}});
(function(){var n=document.querySelector('.navbar-disnaker');if(!n)return;function u(){n.classList.toggle('scrolled',window.scrollY>60)}u();window.addEventListener('scroll',u,{passive:true})})();
</script>
