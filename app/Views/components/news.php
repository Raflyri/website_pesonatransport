<section class="py-5">
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h2 class="fw-bold mb-0">Berita Terbaru</h2>
                <p class="text-muted mb-0">Informasi tips berkendara dan promo terbaru.</p>
            </div>
            <a href="/news" class="btn btn-outline-primary rounded-pill btn-sm">Lihat Semua</a>
        </div>

        <div class="row g-4">
            <?php if (!empty($latest_news) && is_array($latest_news)) : ?>
                <?php $delay = 0; ?>
                <?php foreach ($latest_news as $news) : ?>
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="<?= $delay; ?>">
                        <div class="card h-100 border-0 shadow-sm overflow-hidden blog-card">
                            <img src="<?= base_url($news['image_path'] ? $news['image_path'] : 'images/default-news.jpg'); ?>" 
                                 class="card-img-top" 
                                 alt="<?= esc($news['title']); ?>" 
                                 style="height: 200px; object-fit: cover;">
                            
                            <div class="card-body">
                                <span class="badge bg-primary bg-opacity-10 text-primary mb-2"><?= esc($news['category']); ?></span>
                                <h5 class="card-title fw-bold">
                                    <a href="/news/<?= esc($news['slug']); ?>" class="text-dark text-decoration-none">
                                        <?= esc($news['title']); ?>
                                    </a>
                                </h5>
                                <p class="card-text text-muted small">
                                    <?= word_limiter(strip_tags($news['content']), 15); ?>
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 pt-0 pb-3">
                                <small class="text-muted">
                                    <i class="far fa-clock me-1"></i> 
                                    <?= date('d M Y', strtotime($news['created_at'])); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                    <?php $delay += 100; ?>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada berita terbaru.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>