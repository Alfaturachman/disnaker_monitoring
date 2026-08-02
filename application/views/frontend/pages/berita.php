<section class="page-hero berita-hero">
  <div class="berita-hero-glow"></div>
  <div class="page-hero-overlay"></div>
  <div class="page-hero-content">
    <h1>Berita & Informasi</h1>
    <p>Pantau berita dan pembaruan terbaru terkait ketenagakerjaan di Kota Semarang</p>
    <form method="get" action="<?= site_url('berita/index'); ?>" class="berita-search">
      <input type="text" name="search" placeholder="Cari berita..." value="<?= isset($search_term) ? htmlspecialchars($search_term) : '' ?>">
      <button type="submit">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="20" height="20"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
      </button>
    </form>
  </div>
</section>

<section class="page-body berita-body">
  <div class="container">
    <div class="berita-filter">
      <a href="<?= site_url('berita') ?>" class="filter-chip <?= !$selected_kategori ? 'active' : '' ?>">Semua</a>
      <?php foreach ($kategori as $kat): ?>
        <a href="<?= site_url('berita/index/'.$kat['id']) ?>" class="filter-chip <?= $selected_kategori == $kat['id'] ? 'active' : '' ?>"><?= $kat['nama_kategori'] ?></a>
      <?php endforeach; ?>
    </div>

    <?php if (isset($search_term) && $search_term): ?>
      <p class="search-info">Hasil pencarian untuk: <strong><?= htmlspecialchars($search_term) ?></strong></p>
    <?php endif; ?>

    <?php if (!empty($berita)): ?>
      <div class="berita-grid">
        <?php foreach ($berita as $item): ?>
          <article class="berita-card">
            <a href="<?= site_url('home/update_view/'.$item['id']) ?>" target="_blank" class="berita-card-link">
              <div class="berita-card-image">
                <img src="<?= base_url('uploads/'.($item['gambar'] ?: 'default.jpg')) ?>" alt="<?= $item['judul'] ?>">
                <?php if (isset($item['tanggal']) && $item['tanggal']): ?>
                  <span class="berita-date"><?= date('d M Y', strtotime($item['tanggal'])) ?></span>
                <?php endif; ?>
              </div>
              <div class="berita-card-body">
                <h3><?= $item['judul'] ?></h3>
                <p><?= isset($item['deskripsi']) ? substr(strip_tags($item['deskripsi']), 0, 120) : '' ?>...</p>
                <span class="berita-readmore">
                  Baca Selengkapnya
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                </span>
              </div>
            </a>
          </article>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="berita-empty">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" width="48" height="48"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <h3>Tidak ada berita ditemukan</h3>
        <p>Belum ada berita untuk kategori ini. Coba pilih kategori lain atau lakukan pencarian.</p>
        <a href="<?= site_url('berita') ?>" class="berita-back">Lihat Semua Berita</a>
      </div>
    <?php endif; ?>
  </div>
</section>

<style>
  .berita-hero-content p {
    margin-bottom: 28px;
  }

  .berita-search {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.08);
    border: 1px solid rgba(255, 255, 255, 0.12);
    border-radius: var(--radius-md);
    overflow: hidden;
    transition: var(--transition);
    backdrop-filter: blur(8px);
  }

  .berita-search:focus-within {
    background: rgba(255, 255, 255, 0.14);
    border-color: rgba(239, 68, 68, 0.4);
    box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15), 0 4px 20px rgba(0, 0, 0, 0.2);
  }

  .berita-search input {
    flex: 1;
    padding: 14px 18px;
    background: none;
    border: none;
    color: #fff;
    font-size: 0.95rem;
    outline: none;
  }

  .berita-search input::placeholder { color: rgba(255, 255, 255, 0.4); }

  .berita-search button {
    padding: 0 20px;
    background: var(--brand-700);
    border: none;
    color: #fff;
    cursor: pointer;
    transition: var(--transition);
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 52px;
  }

  .berita-search button:hover {
    background: var(--brand-800);
  }

  .berita-filter {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 36px;
    justify-content: center;
  }

  .filter-chip {
    padding: 10px 24px;
    background: transparent;
    color: var(--gray-500);
    border: 1.5px solid transparent;
    border-radius: 999px;
    font-size: 0.85rem;
    font-weight: 600;
    font-family: var(--font-display);
    text-decoration: none;
    transition: var(--transition);
    letter-spacing: 0.01em;
    position: relative;
  }

  .filter-chip::after {
    content: '';
    position: absolute;
    bottom: -2px;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 60%;
    height: 2px;
    background: var(--brand-600);
    border-radius: 1px;
    transition: transform 0.2s ease;
  }

  .filter-chip:hover {
    color: var(--brand-700);
    background: var(--brand-50);
  }

  .filter-chip:hover::after {
    transform: translateX(-50%) scaleX(1);
  }

  .filter-chip.active {
    color: #fff;
    background: var(--brand-700);
    border-color: var(--brand-700);
    box-shadow: 0 4px 10px -2px rgba(185, 28, 28, 0.3);
  }

  .filter-chip.active::after {
    display: none;
  }

  .search-info {
    text-align: center;
    color: var(--gray-500);
    font-size: 0.9rem;
    margin-bottom: 28px;
    padding: 8px 16px;
    background: var(--gray-50);
    border-radius: var(--radius-md);
    display: inline-block;
    width: auto;
    margin-left: auto;
    margin-right: auto;
  }

  .berita-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
  }

  .berita-card {
    background: #fff;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--gray-200);
    transition: var(--transition);
  }

  .berita-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
    border-color: var(--brand-100);
  }

  .berita-card-link {
    text-decoration: none;
    color: inherit;
    display: flex;
    flex-direction: column;
    height: 100%;
  }

  .berita-card-link:hover { color: inherit; }

  .berita-card-image {
    position: relative;
    height: 200px;
    overflow: hidden;
  }

  .berita-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
  }

  .berita-card:hover .berita-card-image img {
    transform: scale(1.05);
  }

  .berita-date {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background: rgba(0, 0, 0, 0.65);
    color: #fff;
    padding: 4px 12px;
    border-radius: var(--radius-md);
    font-size: 0.75rem;
    backdrop-filter: blur(4px);
  }

  .berita-card-body {
    padding: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .berita-card-body h3 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 600;
    color: var(--gray-900);
    line-height: 1.4;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }

  .berita-card-body p {
    font-size: 0.88rem;
    color: var(--gray-500);
    line-height: 1.6;
    margin-bottom: 16px;
    flex: 1;
  }

  .berita-readmore {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: var(--brand-600);
    font-weight: 600;
    font-size: 0.88rem;
    transition: var(--transition);
  }

  .berita-card:hover .berita-readmore {
    gap: 10px;
    color: var(--brand-700);
  }

  .berita-empty {
    text-align: center;
    padding: 60px 20px;
    color: var(--gray-500);
  }

  .berita-empty svg {
    color: var(--gray-400);
    margin-bottom: 16px;
  }

  .berita-empty h3 {
    font-family: var(--font-display);
    font-size: 1.2rem;
    color: var(--gray-700);
    margin-bottom: 8px;
  }

  .berita-empty p {
    font-size: 0.9rem;
    margin-bottom: 20px;
  }

  .berita-back {
    display: inline-flex;
    padding: 10px 24px;
    background: var(--brand-700);
    color: #fff;
    border-radius: var(--radius-md);
    font-size: 0.9rem;
    font-weight: 600;
    font-family: var(--font-display);
    text-decoration: none;
    transition: var(--transition);
  }

  .berita-back:hover {
    background: var(--brand-800);
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(185, 28, 28, 0.3);
  }

  @media (max-width: 992px) {
    .berita-grid { grid-template-columns: repeat(2, 1fr); }
  }

  @media (max-width: 640px) {
    .berita-grid { grid-template-columns: 1fr; }
  }
</style>
