<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="bg-primary py-5 mb-5 text-white text-center" style="margin-top: 100px;">
    <div class="container">
        <h1 class="fw-bold display-5">Berita & Artikel</h1>
        <p class="lead">Informasi terbaru, tips berkendara, dan promo menarik.</p>
    </div>
</div>

<div class="container mb-5">
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
                                <a href="/news/<?= esc($news['slug']); ?>" class="text-dark text-decoration-none">
                                    <?= esc($news['title']); ?>
                                </a>
                            </h5>
                            <p class="card-text text-muted small">
                                <?= word_limiter(strip_tags($item['content']), 15) ?>
                            </p>
                        </div>

                        <div class="card-footer bg-white border-0 pt-0 pb-3 d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="far fa-clock me-1"></i> <?= date('d M Y', strtotime($item['created_at'])) ?></small>
                            <a href="<?= base_url('news/' . $item['slug']) ?>" class="btn btn-sm btn-outline-primary rounded-pill">Baca</a>
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
        <?= $pager->links() ?>
    </div>
</div>

<?= $this->endSection() ?>