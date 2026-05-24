<section class="hero-section">
  <div class="hero-overlay"></div>
  <div class="hero-content">
    <div class="hero-emblem">
      <img src="<?= base_url('assets/images/favicon.ico') ?>" alt="Disnaker">
    </div>
    <h1>Dinas Tenaga Kerja<br>Kota Semarang</h1>
    <p class="hero-subtitle">Sistem Media Monitoring Informasi Ketenagakerjaan</p>
    <p class="hero-desc">Pantau, analisis, dan dapatkan informasi terkini seputar ketenagakerjaan<br>di Kota Semarang secara real-time.</p>
    <div class="hero-actions">
      <a href="#berita" class="btn btn-hero-primary">Lihat Berita</a>
      <a href="#tentang" class="btn btn-hero-secondary">Tentang Kami</a>
    </div>
  </div>
  <div class="hero-scroll">
    <span>Scroll</span>
    <div class="scroll-indicator"></div>
  </div>
</section>

<section class="section section-chart" id="statistik">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Info Grafis</span>
      <h2>Statistik Media per Kategori</h2>
      <p>Visualisasi data jenis berita yang paling banyak terkait ketenagakerjaan di Kota Semarang</p>
    </div>
    <div class="chart-wrapper">
      <div id="newsChart"></div>
    </div>
  </div>
</section>

<section class="section section-about" id="tentang">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Tentang</span>
      <h2>Sistem Media Monitoring</h2>
      <p>Solusi real-time untuk memantau informasi terkait ketenagakerjaan di Kota Semarang</p>
    </div>
    <div class="about-grid">
      <div class="about-image">
        <img src="<?= base_url('assets/images/about/mediamonitoring.jpg') ?>" alt="Media Monitoring">
      </div>
      <div class="about-features">
        <div class="feature-item">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
          </div>
          <div class="feature-text">
            <h4>Pantau Berita Terkini</h4>
            <p>Memantau berita ketenagakerjaan terkini dari berbagai sumber media.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
          </div>
          <div class="feature-text">
            <h4>Analisis Data Strategis</h4>
            <p>Analisis data untuk pengambilan keputusan yang lebih tepat dan cepat.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div class="feature-text">
            <h4>Real-time & Akurat</h4>
            <p>Akses informasi dari berbagai media secara real-time dan terpercaya.</p>
          </div>
        </div>
        <div class="feature-item">
          <div class="feature-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
          </div>
          <div class="feature-text">
            <h4>Laporan & Notifikasi</h4>
            <p>Menyajikan laporan statistik tren informasi ketenagakerjaan secara berkala.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section section-news" id="berita">
  <div class="container">
    <div class="section-header">
      <span class="section-badge">Berita</span>
      <h2>Informasi Terkini</h2>
      <p>Pantau berita dan pembaruan terbaru terkait ketenagakerjaan di Kota Semarang</p>
    </div>
    <div class="news-grid">
      <?php if (!empty($artikel)): ?>
        <?php foreach ($artikel as $item): ?>
          <article class="news-card">
            <div class="news-card-image">
              <img src="<?= base_url('uploads/' . ($item['gambar'] ?: 'default.jpg')); ?>" alt="<?= $item['judul']; ?>">
              <span class="news-views"><?= $item['view']; ?> views</span>
            </div>
            <div class="news-card-body">
              <h3><?= $item['judul']; ?></h3>
              <p><?= substr($item['deskripsi'], 0, 100); ?>...</p>
              <a href="<?= base_url('home/update_view/' . $item['id']); ?>" target="_blank" class="news-link">
                Baca Selengkapnya
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
              </a>
            </div>
          </article>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="news-empty">
          <p>Belum ada informasi terbaru.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
  var categoryData = <?php echo json_encode($kategori); ?>;
  var categoryLabels = categoryData.map(function(item) {
    return item.nama_kategori;
  });
  var categoryCounts = categoryData.map(function(item) {
    return parseInt(item.jumlah_media) || 0;
  });

  var options = {
    chart: {
      type: 'bar',
      height: 400,
      toolbar: { show: false },
      fontFamily: 'Inter, sans-serif',
    },
    series: [{ name: 'Jumlah Media', data: categoryCounts }],
    xaxis: {
      categories: categoryLabels,
      labels: { style: { colors: '#64748b', fontSize: '12px' } }
    },
    yaxis: {
      labels: { style: { colors: '#64748b', fontSize: '12px' } }
    },
    colors: ['#2563eb'],
    plotOptions: {
      bar: {
        borderRadius: 6,
        columnWidth: '60%',
        distributed: true,
      }
    },
    dataLabels: { enabled: false },
    grid: {
      borderColor: '#e2e8f0',
      strokeDashArray: 4,
    },
    tooltip: {
      theme: 'light',
      style: { fontSize: '13px' }
    },
  };

  var chart = new ApexCharts(document.querySelector("#newsChart"), options);
  chart.render();
</script>

<style>
html {
  scroll-behavior: smooth;
}
.hero-section {
  position: relative;
  height: 100vh;
  min-height: 600px;
  max-height: 900px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: url('<?= base_url("assets/images/slider/disnaker.jpeg") ?>') center center / cover no-repeat;
  overflow: hidden;
}

.hero-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(15, 23, 42, 0.85) 0%, rgba(30, 41, 59, 0.7) 50%, rgba(15, 23, 42, 0.85) 100%);
}

.hero-content {
  position: relative;
  z-index: 2;
  text-align: center;
  padding: 20px;
  max-width: 800px;
  animation: heroFadeIn 1s ease-out;
}

@keyframes heroFadeIn {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

.hero-emblem {
  margin-bottom: 24px;
  display: flex;
  justify-content: center;
}

.hero-emblem img {
  width: 72px;
  height: 72px;
  filter: brightness(0) invert(1);
  opacity: 0.9;
}

.hero-content h1 {
  font-family: 'Catamaran', sans-serif;
  font-size: clamp(2rem, 5vw, 3.5rem);
  font-weight: 700;
  color: #fff;
  line-height: 1.2;
  margin-bottom: 16px;
  letter-spacing: -0.02em;
}

.hero-subtitle {
  font-size: clamp(1rem, 2vw, 1.25rem);
  color: #93c5fd;
  font-weight: 500;
  margin-bottom: 12px;
  letter-spacing: 0.05em;
  text-transform: uppercase;
}

.hero-desc {
  font-size: clamp(0.9rem, 1.5vw, 1.1rem);
  color: #cbd5e1;
  line-height: 1.7;
  margin-bottom: 32px;
  max-width: 600px;
  margin-left: auto;
  margin-right: auto;
}

.hero-actions {
  display: flex;
  gap: 16px;
  justify-content: center;
  flex-wrap: wrap;
}

.btn-hero-primary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 14px 32px;
  background: #2563eb;
  color: #fff;
  border-radius: 12px;
  font-size: 0.95rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  border: 2px solid #2563eb;
}

.btn-hero-primary:hover {
  background: #1d4ed8;
  border-color: #1d4ed8;
  color: #fff;
  transform: translateY(-2px);
  box-shadow: 0 8px 24px rgba(37, 99, 235, 0.35);
}

.btn-hero-secondary {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 14px 32px;
  background: transparent;
  color: #fff;
  border-radius: 12px;
  font-size: 0.95rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.3s ease;
  border: 2px solid rgba(255, 255, 255, 0.25);
}

.btn-hero-secondary:hover {
  background: rgba(255, 255, 255, 0.1);
  border-color: rgba(255, 255, 255, 0.5);
  color: #fff;
  transform: translateY(-2px);
}

/* Scroll Indicator */
.hero-scroll {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 2;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 8px;
  animation: heroFadeIn 1s ease-out 0.5s both;
}

.hero-scroll span {
  color: #94a3b8;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 0.15em;
}

.scroll-indicator {
  width: 24px;
  height: 40px;
  border: 2px solid rgba(148, 163, 184, 0.5);
  border-radius: 12px;
  position: relative;
}

.scroll-indicator::after {
  content: '';
  position: absolute;
  top: 6px;
  left: 50%;
  transform: translateX(-50%);
  width: 4px;
  height: 10px;
  background: #94a3b8;
  border-radius: 2px;
  animation: scrollBounce 2s ease-in-out infinite;
}

@keyframes scrollBounce {
  0%, 100% { transform: translateX(-50%) translateY(0); opacity: 1; }
  50% { transform: translateX(-50%) translateY(8px); opacity: 0.4; }
}

/* Section even bg */
.section:nth-child(even) {
  background: #f8fafc;
}

/* Chart Section */
.chart-wrapper {
  background: #fff;
  border-radius: 16px;
  padding: 32px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.06), 0 1px 2px rgba(0,0,0,0.04);
  border: 1px solid #e2e8f0;
}

/* About Section */
.about-grid {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 48px;
  align-items: center;
}

.about-image img {
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.feature-item {
  display: flex;
  gap: 16px;
  margin-bottom: 28px;
}

.feature-item:last-child {
  margin-bottom: 0;
}

.feature-icon {
  flex-shrink: 0;
  width: 48px;
  height: 48px;
  background: #eff6ff;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #2563eb;
}

.feature-icon svg {
  width: 22px;
  height: 22px;
}

.feature-text h4 {
  font-family: 'Catamaran', sans-serif;
  font-size: 1.05rem;
  font-weight: 600;
  color: #0f172a;
  margin-bottom: 4px;
}

.feature-text p {
  font-size: 0.9rem;
  color: #64748b;
  line-height: 1.6;
  margin: 0;
}

/* News Section */
.news-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.news-card {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  transition: all 0.3s ease;
  display: flex;
  flex-direction: column;
}

.news-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(0,0,0,0.08);
}

.news-card-image {
  position: relative;
  overflow: hidden;
  height: 200px;
}

.news-card-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.4s ease;
}

.news-card:hover .news-card-image img {
  transform: scale(1.05);
}

.news-views {
  position: absolute;
  top: 12px;
  right: 12px;
  background: rgba(0,0,0,0.6);
  color: #fff;
  padding: 4px 12px;
  border-radius: 8px;
  font-size: 0.75rem;
  backdrop-filter: blur(4px);
}

.news-card-body {
  padding: 20px;
  flex: 1;
  display: flex;
  flex-direction: column;
}

.news-card-body h3 {
  font-family: 'Catamaran', sans-serif;
  font-size: 1rem;
  font-weight: 600;
  color: #0f172a;
  margin-bottom: 8px;
  line-height: 1.4;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.news-card-body p {
  font-size: 0.88rem;
  color: #64748b;
  line-height: 1.6;
  margin-bottom: 16px;
  flex: 1;
}

.news-link {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  color: #2563eb;
  font-weight: 600;
  font-size: 0.88rem;
  text-decoration: none;
  transition: all 0.2s ease;
}

.news-link:hover {
  gap: 10px;
  color: #1d4ed8;
}

.news-empty {
  grid-column: 1 / -1;
  text-align: center;
  padding: 40px;
  color: #64748b;
}

/* Responsive */
@media (max-width: 992px) {
  .about-grid {
    grid-template-columns: 1fr;
    gap: 32px;
  }
  .news-grid {
    grid-template-columns: repeat(2, 1fr);
  }
}

@media (max-width: 640px) {
  .news-grid {
    grid-template-columns: 1fr;
  }
  .hero-actions {
    flex-direction: column;
    align-items: center;
  }
  .btn-hero-primary,
  .btn-hero-secondary {
    width: 100%;
    max-width: 280px;
    justify-content: center;
  }
  .chart-wrapper {
    padding: 16px;
  }
  .hero-emblem img {
    width: 56px;
    height: 56px;
  }
}
</style>