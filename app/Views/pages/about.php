<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="hero-page position-relative d-flex align-items-center overflow-hidden">
    <div class="hero-bg-overlay rellax" data-rellax-speed="-2"></div>

    <div class="container position-relative z-2">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <!--<nav aria-label="breadcrumb" class="mb-3" data-aos="fade-down" data-aos-delay="100">
                    <ol class="breadcrumb bg-transparent p-0 m-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('/') ?>" class="text-white-50 text-decoration-none small">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white small" aria-current="page">Tentang Kami</li>
                    </ol>
                </nav>-->

                <h1 class="display-4 fw-bold text-white mb-3" data-aos="fade-up">Tentang Kami</h1>
                <p class="lead text-white-50 mb-0" data-aos="fade-up" data-aos-delay="200">
                    Mengenal lebih dekat siapa kami dan dedikasi kami untuk perjalanan Anda.
                </p>
            </div>

            <div class="col-lg-5 text-end d-none d-lg-block" data-aos="fade-left" data-aos-delay="300">
                <i class="fas fa-user-friends fa-10x text-white opacity-10 floating-icon"></i>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white position-relative overflow-hidden">
    <div class="position-absolute top-0 end-0 bg-light rounded-circle rellax"
        data-rellax-speed="-3"
        style="width: 300px; height: 300px; margin-top: -100px; margin-right: -100px; opacity: 0.5; z-index: 0;">
    </div>
    <div class="container py-5 position-relative z-1">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 position-relative" data-aos="fade-right">
                <?php
                $img = !empty($profile['about_image']) ? base_url('uploads/about/' . $profile['about_image']) : base_url('admin_assets/img/photo1.png');
                ?>

                <div class="position-absolute" style="top: -30px; left: -30px; width: 150px; height: 150px; background-image: radial-gradient(var(--color-primary) 1.5px, transparent 1.5px); background-size: 20px 20px; opacity: 0.2; z-index: 0;"></div>

                <div class="position-relative z-1">
                    <img src="<?= $img ?>" alt="Tentang Pesona Transport" class="img-fluid rounded-4 shadow w-100" style="object-fit: cover; min-height: 450px;">
                </div>

                <div class="position-absolute border border-primary border-2 rounded-4" style="bottom: -20px; right: -20px; width: 70%; height: 70%; z-index: 0; opacity: 0.3;"></div>
            </div>

            <div class="col-lg-7" data-aos="fade-left">
                <div class="ps-lg-5">
                    <span class="text-primary fw-bold text-uppercase ls-1 small mb-2 d-block">
                        <i class="fas fa-minus me-2"></i>Siapa Kami
                    </span>

                    <h2 class="display-6 fw-bold mb-4 text-dark"><?= esc($profile['about_title']) ?></h2>

                    <div class="text-muted mb-5 lead fs-6" style="line-height: 1.8;">
                        <?= $profile['about_description_long'] ?>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="bg-white border shadow-sm text-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="fas fa-medal"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1">Berpengalaman</h6>
                                    <p class="small text-muted mb-0">Melayani ribuan pelanggan dengan standar tinggi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0">
                                    <div class="bg-white border shadow-sm text-primary rounded-circle p-3 d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="fw-bold mb-1">Aman & Nyaman</h6>
                                    <p class="small text-muted mb-0">Armada terawat dan driver profesional.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container py-4">
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <div class="card-body">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-4">
                            <i class="fas fa-eye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Visi Kami</h3>
                        <p class="text-muted mb-0" style="line-height: 1.7;">
                            Menjadi penyedia layanan transportasi terdepan di Indonesia yang mengutamakan kualitas pelayanan, keselamatan, dan kepuasan pelanggan, serta berkontribusi dalam memajukan pariwisata nasional.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm p-4">
                    <div class="card-body">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-3 p-3 mb-4">
                            <i class="fas fa-bullseye fa-2x"></i>
                        </div>
                        <h3 class="fw-bold mb-3">Misi Kami</h3>
                        <ul class="list-unstyled text-muted mb-0" style="line-height: 1.8;">
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Menyediakan armada kendaraan yang bersih, terawat, dan terbaru.</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Memberikan pelayanan ramah dan profesional dari seluruh staf.</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Menawarkan harga yang kompetitif dan transparan tanpa biaya tersembunyi.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-primary text-white position-relative overflow-hidden">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background-image: linear-gradient(45deg, rgba(255,255,255,0.05) 25%, transparent 25%, transparent 50%, rgba(255,255,255,0.05) 50%, rgba(255,255,255,0.05) 75%, transparent 75%, transparent); background-size: 20px 20px;"></div>

    <div class="container position-relative z-2">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="0">
                <h2 class="display-4 fw-bold mb-0">50+</h2>
                <p class="text-white-50 mb-0 mt-2">Unit Armada</p>
            </div>
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="100">
                <h2 class="display-4 fw-bold mb-0">10k+</h2>
                <p class="text-white-50 mb-0 mt-2">Pelanggan Puas</p>
            </div>
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="200">
                <h2 class="display-4 fw-bold mb-0">7</h2>
                <p class="text-white-50 mb-0 mt-2">Tahun Pengalaman</p>
            </div>
            <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="300">
                <h2 class="display-4 fw-bold mb-0">24/7</h2>
                <p class="text-white-50 mb-0 mt-2">Layanan Support</p>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-white text-center">
    <div class="container py-4">
        <h2 class="fw-bold mb-3" data-aos="fade-up">Siap untuk Perjalanan Anda?</h2>
        <p class="text-muted mb-4 lead" data-aos="fade-up" data-aos-delay="100">Konsultasikan kebutuhan transportasi Anda bersama tim ahli kami.</p>
        <a href="<?= base_url('contact') ?>" class="btn btn-primary-custom rounded-pill px-5 btn-lg shadow" data-aos="fade-up" data-aos-delay="200">
            Hubungi Kami Sekarang
        </a>
    </div>
</section>

<?= $this->endSection() ?>