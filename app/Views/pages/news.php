<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="hero-page position-relative d-flex align-items-center overflow-hidden">
    <div class="hero-bg-overlay rellax" data-rellax-speed="-2"></div>

    <div class="container position-relative z-2">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up">Berita & Artikel</h1>
                <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="200">
                    Informasi terbaru, tips berkendara, dan promo menarik.
                </p>
            </div>

            <div class="col-lg-5 text-end d-none d-lg-block" data-aos="fade-left" data-aos-delay="300">
                <i class="far fa-newspaper fa-10x text-white opacity-10 floating-icon"></i>
            </div>
        </div>
    </div>
</section>

<div class="container mb-5 mt-5">
    <?php if (!empty($keyword)) : ?>
        <div class="mb-4">
            <h4 class="fw-bold text-dark">
                Menampilkan hasil pencarian untuk: <span class="text-primary">"<?= esc($keyword); ?>"</span>
            </h4>
            <a href="/news" class="btn btn-sm btn-outline-secondary mt-2">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Semua Berita
            </a>
        </div>
    <?php endif; ?>
    <div class="row g-4">
        <?php if ($news): ?>
            <?php foreach ($news as $item) : ?>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm overflow-hidden blog-card">
                        <div class="overflow-hidden" style="height: 220px;">
                            <img src="<?= base_url(!empty($item['image_path']) ? $item['image_path'] : 'images/default-news.jpg') ?>"
                                class="card-img-top h-100 w-100"
                                style="object-fit: cover;"
                                alt="<?= esc($item['title']) ?>">
                        </div>

                        <div class="card-body">
                            <span class="badge bg-primary bg-opacity-10 text-primary mb-2"><?= esc($item['category']) ?></span>
                            <h5 class="card-title fw-bold mt-1">
                                <a href="/news/<?= esc($item['slug']); ?>" class="text-dark text-decoration-none">
                                    <?= esc($item['title']); ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted small">
                                <?= word_limiter(strip_tags($item['content']), 15) ?>
                            </p>
                        </div>

                        <div class="card-footer bg-white border-0 pt-0 pb-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="far fa-clock me-1"></i> <?= date('d M Y', strtotime($item['published_at'])) ?></small>
                            <!--a href="<?= base_url('news/' . $item['slug']) ?>" class="btn btn-sm btn-outline-primary rounded-pill">Baca</a-->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <div class="alert alert-light">
                    <h4>Belum ada berita.</h4>
                    <p>Nantikan update terbaru dari kami segera!</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div class="mt-5 d-flex justify-content-center">
        <?= $pager->links('default', 'round_pagination') ?>
    </div>
</div>

<?= $this->endSection() ?>