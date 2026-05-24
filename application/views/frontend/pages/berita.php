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
  background: rgba(255,255,255,0.08);
  border: 1px solid rgba(255,255,255,0.12);
  border-radius: 12px;
  overflow: hidden;
  transition: all 0.3s ease;
  backdrop-filter: blur(8px);
}

.berita-search:focus-within {
  background: rgba(255,255,255,0.14);
  border-color: rgba(96,165,250,0.4);
  box-shadow: 0 0 0 3px rgba(59,130,246,0.15), 0 4px 20px rgba(0,0,0,0.2);
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

.berita-search input::placeholder { color: #64748b; }

.berita-search button {
  padding: 0 20px;
  background: linear-gradient(135deg, #2563eb, #1d4ed8);
  border: none;
  color: #fff;
  cursor: pointer;
  transition: all 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 52px;
}

.berita-search button:hover {
  background: linear-gradient(135deg, #1d4ed8, #1e40af);
}

.berita-filter {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
  margin-bottom: 32px;
  justify-content: center;
}

.filter-chip {
  padding: 8px 20px;
  background: #fff;
  color: #475569;
  border: 1px solid #e2e8f0;
  border-radius: 10px;
  font-size: 0.85rem;
  font-weight: 500;
  text-decoration: none;
  transition: all 0.2s ease;
}

.filter-chip:hover {
  background: #f1f5f9;
  color: #0f172a;
  border-color: #cbd5e1;
}

.filter-chip.active {
  background: #2563eb;
  color: #fff;
  border-color: #2563eb;
}

.search-info {
  text-align: center;
  color: #64748b;
  font-size: 0.9rem;
  margin-bottom: 24px;
}

.berita-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 24px;
}

.berita-card {
  background: #fff;
  border-radius: 16px;
  overflow: hidden;
  border: 1px solid #e2e8f0;
  transition: all 0.3s ease;
}

.berita-card:hover {
  transform: translateY(-4px);
  box-shadow: 0 12px 32px rgba(0,0,0,0.08);
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
  background: rgba(0,0,0,0.65);
  color: #fff;
  padding: 4px 12px;
  border-radius: 8px;
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
  font-size: 1rem;
  font-weight: 600;
  color: #0f172a;
  line-height: 1.4;
  margin-bottom: 8px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.berita-card-body p {
  font-size: 0.88rem;
  color: #64748b;
  line-height: 1.6;
  margin-bottom: 16px;
  flex: 1;
}

.berita-readmore {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  color: #2563eb;
  font-weight: 600;
  font-size: 0.88rem;
  transition: all 0.2s ease;
}

.berita-card:hover .berita-readmore {
  gap: 10px;
}

.berita-empty {
  text-align: center;
  padding: 60px 20px;
  color: #64748b;
}

.berita-empty svg {
  color: #94a3b8;
  margin-bottom: 16px;
}

.berita-empty h3 {
  font-size: 1.2rem;
  color: #334155;
  margin-bottom: 8px;
}

.berita-empty p {
  font-size: 0.9rem;
  margin-bottom: 20px;
}

.berita-back {
  display: inline-flex;
  padding: 10px 24px;
  background: #2563eb;
  color: #fff;
  border-radius: 10px;
  font-size: 0.9rem;
  font-weight: 600;
  text-decoration: none;
  transition: all 0.2s ease;
}

.berita-back:hover { background: #1d4ed8; color: #fff; }

@media (max-width: 992px) {
  .berita-grid { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 640px) {
  .berita-grid { grid-template-columns: 1fr; }
}
</style>