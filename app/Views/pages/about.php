<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="bg-primary text-white py-5" style="margin-top: 70px;">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold" data-aos="fade-up">Tentang Kami</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">Mengenal lebih dekat siapa kami dan dedikasi kami untuk perjalanan Anda.</p>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm border-0 overflow-hidden" data-aos="fade-up">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <?php 
                                $img = !empty($profile['about_image']) ? base_url('uploads/about/'.$profile['about_image']) : base_url('admin_assets/img/photo1.png');
                            ?>
                            <div class="h-100" style="background: url('<?= $img ?>') center/cover no-repeat; min-height: 400px;"></div>
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-5">
                                <h3 class="fw-bold mb-4 text-dark"><?= esc($profile['about_title']) ?></h3>
                                <div class="text-muted" style="line-height: 1.8;">
                                    <?= $profile['about_description_long'] ?> 
                                </div>

                                <hr class="my-4">

                                <h5 class="fw-bold text-dark mb-3">Kenapa Memilih Kami?</h5>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                                    <i class="fas fa-medal fa-lg"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fw-bold mb-1">Berpengalaman</h6>
                                                <small class="text-muted">Telah melayani ribuan pelanggan puas.</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                                                    <i class="fas fa-shield-alt fa-lg"></i>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="fw-bold mb-1">Aman & Nyaman</h6>
                                                <small class="text-muted">Prioritas keselamatan di setiap perjalanan.</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light text-center">
    <div class="container">
        <h3 class="fw-bold mb-3">Siap untuk perjalanan Anda?</h3>
        <p class="text-muted mb-4">Hubungi kami sekarang untuk mendapatkan penawaran terbaik.</p>
        <a href="https://wa.me/628123456789" class="btn btn-success btn-lg rounded-pill px-5">
            <i class="fab fa-whatsapp me-2"></i> Hubungi via WhatsApp
        </a>
    </div>
</section>

<?= $this->endSection() ?>