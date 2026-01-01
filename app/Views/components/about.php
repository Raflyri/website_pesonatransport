<section id="about" class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
                <?php 
                    $img = !empty($profile['about_image']) ? base_url('uploads/about/'.$profile['about_image']) : base_url('admin_assets/img/photo1.png');
                ?>
                <img src="<?= $img ?>" alt="Tentang Kami" class="img-fluid rounded shadow-lg">
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <h4 class="text-primary text-uppercase fw-bold mb-3">Tentang Kami</h4>
                <h2 class="fw-bold mb-4"><?= esc($profile['about_title'] ?? 'Judul Default') ?></h2>
                <p class="text-muted mb-4 lead">
                    <?= esc($profile['about_description_short'] ?? 'Deskripsi belum diatur.') ?>
                </p>
                
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-2 fa-lg"></i>
                            <span>Unit Terawat</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-2 fa-lg"></i>
                            <span>Supir Profesional</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-check-circle text-primary me-2 fa-lg"></i>
                            <span>Harga Bersaing</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-check-circle text-primary me-2 fa-lg"></i>
                            <span>Layanan 24 Jam</span>
                        </div>
                    </div>
                </div>

                <a href="<?= base_url('/tentang-kami') ?>" class="btn btn-primary btn-lg rounded-pill px-5 shadow-sm">
                    Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>