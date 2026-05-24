<section class="page-hero detail-hero">
  <div class="detail-hero-glow"></div>
  <div class="page-hero-overlay"></div>
  <div class="page-hero-content">
    <div class="detail-hero-breadcrumb">
      <a href="<?= site_url('berita') ?>">Berita</a>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="14" height="14"><polyline points="9 18 15 12 9 6"/></svg>
      <span>Detail</span>
    </div>
    <h1><?= $berita['judul'] ?></h1>
    <div class="detail-hero-meta">
      <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        <?= date('d M Y', strtotime($berita['tanggal'])) ?>
      </span>
      <span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="16" height="16"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
        <?= $berita['view'] ?> views
      </span>
    </div>
  </div>
</section>

<section class="page-body detail-body">
  <div class="page-container">
    <article class="page-card detail-card">
      <div class="detail-image">
        <img src="<?= base_url('uploads/' . ($berita['gambar'] ?: 'default.jpg')) ?>" alt="<?= $berita['judul'] ?>">
      </div>
      <div class="detail-content">
        <?php if ($berita['url']): ?>
          <div class="detail-source">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"/><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"/></svg>
            <a href="<?= $berita['url'] ?>" target="_blank">Lihat Sumber Asli</a>
          </div>
        <?php endif; ?>
        <div class="detail-description">
          <?= $berita['deskripsi'] ?>
        </div>
      </div>
      <div class="detail-footer">
        <a href="<?= site_url('berita') ?>" class="btn-primary-blue">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="18" height="18"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
          Kembali ke Berita
        </a>
      </div>
    </article>
  </div>
</section>

<style>
.detail-hero-content {
  max-width: 720px;
}

.detail-hero-breadcrumb {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  margin-bottom: 16px;
}

.detail-hero-breadcrumb a {
  color: #94a3b8;
  font-size: 0.85rem;
  text-decoration: none;
  transition: color 0.2s;
}

.detail-hero-breadcrumb a:hover {
  color: #60a5fa;
}

.detail-hero-breadcrumb svg {
  color: #64748b;
}

.detail-hero-breadcrumb span {
  color: #60a5fa;
  font-size: 0.85rem;
}

.detail-hero-content h1 {
  color: #fff;
  font-size: clamp(1.4rem, 3.5vw, 2.25rem);
  font-weight: 700;
  margin-bottom: 16px;
  letter-spacing: -0.02em;
  text-shadow: 0 2px 8px rgba(0,0,0,0.3);
  line-height: 1.35;
}

.detail-hero-meta {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  flex-wrap: wrap;
}

.detail-hero-meta span {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  color: #94a3b8;
  font-size: 0.88rem;
}

.detail-hero-meta svg {
  color: #64748b;
}

.detail-image {
  width: 100%;
  max-height: 420px;
  overflow: hidden;
}

.detail-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

.detail-content {
  padding: 32px;
}

.detail-source {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  padding: 10px 18px;
  background: #eff6ff;
  border-radius: 10px;
  margin-bottom: 24px;
}

.detail-source svg {
  color: #2563eb;
  flex-shrink: 0;
}

.detail-source a {
  color: #2563eb;
  font-size: 0.9rem;
  font-weight: 600;
  text-decoration: none;
  transition: color 0.2s;
}

.detail-source a:hover {
  color: #1d4ed8;
  text-decoration: underline;
}

.detail-description {
  font-size: 1rem;
  line-height: 1.8;
  color: #334155;
}

.detail-description p {
  margin-bottom: 16px;
}

.detail-description img {
  max-width: 100%;
  height: auto;
  border-radius: 8px;
  margin: 16px 0;
}

.detail-footer {
  padding: 20px 32px;
  border-top: 1px solid #e2e8f0;
  display: flex;
  justify-content: center;
}
@media (max-width: 640px) {
  .detail-content { padding: 20px; }
  .detail-footer { padding: 16px 20px; }
  .detail-hero-meta { gap: 12px; }
  .detail-image { max-height: 240px; }
}
</style>
