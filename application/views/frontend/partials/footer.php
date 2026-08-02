<!-- Footer -->
<footer id="footer" class="site-footer">
  <div class="footer-main">
    <div class="container">
      <div class="footer-grid">
        <div class="footer-col footer-brand-col">
          <div class="footer-logo-wrap">
            <img src="<?= base_url('assets/images/logodisnaker.png') ?>" alt="Disnaker Kota Semarang" class="footer-logo">
            <div class="footer-logo-text">
              <span class="footer-brand-name">DISNAKER</span>
              <span class="footer-brand-sub">Kota Semarang</span>
            </div>
          </div>
          <p class="footer-desc">Sistem Media Monitoring Dinas Ketenagakerjaan Kota Semarang. Pantau pemberitaan media secara real-time dari berbagai sumber untuk mendukung pengambilan keputusan yang akurat.</p>
          <div class="footer-social">
            <a href="https://www.facebook.com/disnakersmg" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/disnakersmg" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com/disnakersmg" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/disnakersmg" target="_blank" aria-label="Youtube"><i class="fab fa-youtube"></i></a>
            <a href="https://www.tiktok.com/@disnakersmg" target="_blank" aria-label="Tiktok"><i class="fab fa-tiktok"></i></a>
          </div>
        </div>
        <div class="footer-col">
          <h4 class="footer-heading">Alamat & Kontak</h4>
          <ul class="footer-list footer-contact">
            <li><i class="fas fa-map-marker-alt"></i> Jl. Ki Mangunsarkoro, No. 21, Karangkidul, Semarang Tengah</li>
            <li><i class="fas fa-envelope"></i> <a href="mailto:disnaker@semarangkota.go.id">disnaker@semarangkota.go.id</a></li>
            <li><i class="fas fa-phone"></i> <a href="tel:0248440335">(024) 8440335</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="footer-heading">Jam Operasional</h4>
          <ul class="footer-list footer-hours">
            <li><span>Senin</span><span>08.00 - 16.00</span></li>
            <li><span>Selasa</span><span>08.00 - 16.00</span></li>
            <li><span>Rabu</span><span>08.00 - 16.00</span></li>
            <li><span>Kamis</span><span>08.00 - 16.00</span></li>
            <li><span>Jumat</span><span>07.30 - 14.00</span></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4 class="footer-heading">Navigasi</h4>
          <ul class="footer-list footer-nav">
            <li><a href="<?= base_url('home') ?>">Beranda</a></li>
            <li><a href="<?= base_url('berita') ?>">Berita</a></li>
            <li><a href="<?= base_url('kontak') ?>">Kontak</a></li>
            <li><a href="<?= base_url('kontributor') ?>">Kontributor</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <p>&copy; <?= date('Y') ?> Dinas Ketenagakerjaan Kota Semarang. All rights reserved.</p>
      <p class="footer-credit">Dikembangkan oleh <a href="https://www.instagram.com/mita.aml/" target="_blank">Mita Amelia</a></p>
    </div>
  </div>
</footer>

<style>
  .site-footer {
    background: linear-gradient(135deg, var(--brand-950) 0%, #1a0303 100%);
    color: rgba(255, 255, 255, 0.85);
    font-size: 0.875rem;
  }

  .footer-main {
    padding: 4rem 0 3rem;
  }

  .footer-grid {
    display: grid;
    grid-template-columns: 1.5fr 1fr 1fr 1fr;
    gap: 40px;
  }

  .footer-logo-wrap {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 1rem;
  }

  .footer-logo {
    width: 48px;
    height: 48px;
    object-fit: contain;
  }

  .footer-logo-text {
    display: flex;
    flex-direction: column;
  }

  .footer-brand-name {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 800;
    color: #fff;
    letter-spacing: -0.01em;
    line-height: 1.2;
  }

  .footer-brand-sub {
    font-size: 0.7rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.08em;
    color: rgba(255, 255, 255, 0.5);
  }

  .footer-desc {
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.6);
    margin-bottom: 1.5rem;
    max-width: 320px;
  }

  .footer-social {
    display: flex;
    gap: 10px;
  }

  .footer-social a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    border-radius: var(--radius-md);
    background: rgba(255, 255, 255, 0.08);
    color: rgba(255, 255, 255, 0.6);
    transition: var(--transition);
    font-size: 0.9rem;
  }

  .footer-social a:hover {
    background: var(--brand-600);
    color: #fff;
    transform: translateY(-2px);
  }

  .footer-heading {
    font-family: var(--font-display);
    font-size: 0.9rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 1.25rem;
    letter-spacing: 0.02em;
  }

  .footer-list {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .footer-list li {
    margin-bottom: 0.75rem;
    line-height: 1.6;
  }

  .footer-contact li {
    display: flex;
    gap: 10px;
    color: rgba(255, 255, 255, 0.6);
  }

  .footer-contact li i {
    width: 16px;
    margin-top: 3px;
    color: var(--brand-500);
    flex-shrink: 0;
  }

  .footer-contact a {
    color: rgba(255, 255, 255, 0.6);
    transition: var(--transition);
  }

  .footer-contact a:hover { color: #fff; }

  .footer-hours li {
    display: flex;
    justify-content: space-between;
    color: rgba(255, 255, 255, 0.6);
    padding-bottom: 0.5rem;
    border-bottom: 1px solid rgba(255, 255, 255, 0.06);
  }

  .footer-hours li:last-child { border-bottom: none; padding-bottom: 0; }

  .footer-nav a {
    color: rgba(255, 255, 255, 0.6);
    transition: var(--transition);
    display: inline-block;
    padding: 2px 0;
  }

  .footer-nav a:hover {
    color: #fff;
    transform: translateX(4px);
  }

  .footer-bottom {
    border-top: 1px solid rgba(255, 255, 255, 0.08);
    padding: 1.5rem 0;
    text-align: center;
  }

  .footer-bottom .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
  }

  .footer-bottom p {
    color: rgba(255, 255, 255, 0.4);
    font-size: 0.8rem;
    margin: 0;
  }

  .footer-credit a {
    color: rgba(255, 255, 255, 0.5);
    transition: var(--transition);
  }

  .footer-credit a:hover { color: #fff; }

  @media (max-width: 992px) {
    .footer-grid { grid-template-columns: 1fr 1fr; gap: 32px; }
    .footer-brand-col { grid-column: 1 / -1; }
  }

  @media (max-width: 640px) {
    .footer-grid { grid-template-columns: 1fr; gap: 28px; }
    .footer-main { padding: 3rem 0 2rem; }
    .footer-bottom .container { flex-direction: column; gap: 4px; }
  }
</style>

<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/bootstrap/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/parallax/jquery.parallax-1.1.3.js') ?>"></script>
<script src="<?= base_url('assets/plugins/lightbox2/js/lightbox.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/slick/slick.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/filterizr/jquery.filterizr.min.js') ?>"></script>
<script src="<?= base_url('assets/js/script.js') ?>"></script>
</body>
</html>
