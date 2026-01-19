<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="hero-page position-relative d-flex align-items-center" style="min-height: 400px; padding-top: 150px;">
    <div class="hero-bg-overlay"></div>
    <div class="container position-relative z-2 text-center">
        <span class="badge bg-primary px-3 py-2 mb-3 rounded-pill" data-aos="fade-down">
            <?= esc($news_item['category']); ?>
        </span>
        
        <h1 class="display-5 fw-bold text-white mb-3" data-aos="fade-up">
            <?= esc($news_item['title']); ?>
        </h1>
        
        <div class="text-white-50" data-aos="fade-up" data-aos-delay="100">
            <small>
                <i class="far fa-user me-2"></i> Admin &nbsp;|&nbsp; 
                <i class="far fa-calendar-alt me-2 ms-3"></i> <?= date('d F Y', strtotime($news_item['created_at'])); ?>
            </small>
        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">
        <div class="row g-5">
            
            <div class="col-lg-8">
                <div class="mb-4 rounded-4 overflow-hidden shadow-sm" data-aos="fade-up">
                    <img src="<?= base_url($news_item['image_path'] ? $news_item['image_path'] : 'images/default-news.jpg'); ?>" 
                         alt="<?= esc($news_item['title']); ?>" 
                         class="img-fluid w-100"
                         style="object-fit: cover; max-height: 500px;">
                </div>

                <article class="blog-content text-muted lh-lg mb-5" data-aos="fade-up">
                    <?= $news_item['content']; // PENTING: Jangan di-esc() jika content dari text editor (HTML) ?>
                </article>

                <hr>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="/news" class="btn btn-outline-secondary rounded-pill">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Berita
                    </a>
                    <div>
                        <span class="text-muted small me-2">Bagikan:</span>
                        <a href="#" class="btn btn-sm btn-primary rounded-circle"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="btn btn-sm btn-info text-white rounded-circle"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="btn btn-sm btn-success rounded-circle"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="position-sticky" style="top: 100px;">
                    
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Cari Berita</h5>
                            <form action="/news" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Kata kunci..." name="keyword">
                                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="fw-bold mb-3">Berita Lainnya</h5>
                            
                            <?php if (!empty($sidebar_news)) : ?>
                                <ul class="list-unstyled mb-0">
                                    <?php foreach ($sidebar_news as $side_item) : ?>
                                        <li class="mb-3">
                                            <a href="/news/<?= esc($side_item['slug']); ?>" class="d-flex text-decoration-none text-dark group-hover">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= base_url($side_item['image_path'] ? $side_item['image_path'] : 'images/default-news.jpg'); ?>" 
                                                         class="rounded-3" 
                                                         style="width: 70px; height: 70px; object-fit: cover;" 
                                                         alt="Thumb">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="mb-1 small fw-bold text-truncate-2"><?= esc($side_item['title']); ?></h6>
                                                    <small class="text-muted" style="font-size: 11px;">
                                                        <?= date('d M Y', strtotime($side_item['created_at'])); ?>
                                                    </small>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else : ?>
                                <p class="small text-muted">Tidak ada berita lain.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?= $this->endSection() ?>