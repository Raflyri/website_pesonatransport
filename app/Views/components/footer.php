<footer class="bg-dark text-white pt-5 pb-3 mt-auto position-relative" style="background: linear-gradient(180deg, var(--color-dark) 0%, #000 100%);">

    <div style="height: 4px; background: var(--color-accent); position: absolute; top: 0; left: 0; width: 100%;"></div>

    <div class="container pt-4">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="footer-logo-container mb-3">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url(get_setting('site_logo_footer', 'admin_assets/img/AdminLTELogo.png')) ?>"
                            alt="Logo"
                            class="footer-logo-responsive">
                    </a>
                </div>
                <p class="text-white-50 small mb-4">
                    <?= get_setting('site_desc_footer') ?>
                    <!--Penyedia jasa sewa mobil terpercaya di Jabodetabek. Melayani kebutuhan transportasi harian, korporasi, hingga pariwisata dengan armada prima.-->
                </p>
                <div class="d-flex gap-2">
                    <?php if (get_setting('social_facebook')): ?>
                        <a href="<?= get_setting('social_facebook') ?>" target="_blank" class="text-white social-icon bg-secondary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; text-decoration: none;"><i class="fab fa-facebook-f"></i></a>
                    <?php endif; ?>

                    <?php if (get_setting('social_instagram')): ?>
                        <a href="<?= get_setting('social_instagram') ?>" target="_blank" class="text-white social-icon bg-secondary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; text-decoration: none;"><i class="fab fa-instagram"></i></a>
                    <?php endif; ?>

                    <?php if (get_setting('social_whatsapp')): ?>
                        <a href="<?= get_setting('social_whatsapp') ?>" target="_blank" class="text-white social-icon bg-secondary bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center" style="width: 36px; height: 36px; text-decoration: none;"><i class="fab fa-whatsapp"></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-md-2 col-6">
                <h6 class="fw-bold mb-3 text-uppercase text-primary small ls-1">Perusahaan</h6>
                <ul class="list-unstyled text-small">
                    <li class="mb-2"><a href="/tentang-kami" class="text-white-50 text-decoration-none hover-white">Tentang Kami</a></li>
                    <li class="mb-2"><a href="/armada" class="text-white-50 text-decoration-none hover-white">Armada</a></li>
                    <li class="mb-2"><a href="/news" class="text-white-50 text-decoration-none hover-white">Berita</a></li>
                </ul>
            </div>

            <div class="col-md-2 col-6">
                <h6 class="fw-bold mb-3 text-uppercase text-primary small ls-1">Dukungan</h6>
                <ul class="list-unstyled text-small">
                    <li class="mb-2">
                        <a href="<?= base_url('coming-soon') ?>" class="text-white-50 text-decoration-none hover-white">Syarat & Ketentuan</a>
                    </li>
                    <li class="mb-2">
                        <a href="<?= base_url('coming-soon') ?>" class="text-white-50 text-decoration-none hover-white">Kebijakan Privasi</a>
                    </li>
                    <li class="mb-2">
                        <a href="<?= base_url('coming-soon') ?>" class="text-white-50 text-decoration-none hover-white">Bantuan</a>
                    </li>
                    <!--li class="mb-2">
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-white-50 text-decoration-none hover-white">Hubungi Kami</a>
                    </li-->
                </ul>
            </div>

            <div class="col-md-4">
                <h6 class="fw-bold mb-3 text-uppercase text-primary small ls-1">Kantor Kami</h6>
                <ul class="list-unstyled text-small text-white-50">
                    <li class="mb-3 d-flex">
                        <i class="fas fa-map-marker-alt text-primary me-3 mt-1"></i>
                        <span><?= nl2br(get_setting('company_address')) ?></span>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-phone text-primary me-3 mt-1"></i>
                        <?= get_setting('company_phone') ?>
                    </li>
                    <li class="mb-3 d-flex">
                        <i class="fas fa-envelope text-primary me-3 mt-1"></i>
                        <?= get_setting('company_email') ?>
                    </li>
                </ul>
            </div>
        </div>

        <hr class="border-secondary opacity-25 mt-5">

        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start">
                <p class="small text-white-50 mb-0">
                    &copy; <?= date('Y') ?>
                    <a href="https://pesonaadibatara.com/" target="_blank" class="text-white text-decoration-none fw-bold">
                        PT. Pesona Adi Batara
                    </a>.
                    All rights reserved.
                </p>
            </div>
            <?php if (getenv('CI_ENVIRONMENT') !== 'production') : ?>
                <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                    <p class="small text-white-50 mb-0">Developed by <span class="text-white fw-bold">RBeverything</span></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cari elemen logo footer
        const footerLogo = document.querySelector('.footer-logo-container');

        if (footerLogo) {
            // Buat Observer (Pengamat)
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    // Jika footer masuk ke layar (isIntersecting)
                    if (entry.isIntersecting) {
                        footerLogo.classList.add('shining'); // Tambah class animasi
                    } else {
                        footerLogo.classList.remove('shining'); // Hapus class biar bisa main lagi kalau di-scroll balik
                    }
                });
            }, {
                threshold: 0.5
            }); // Animasi jalan kalau 50% logo sudah kelihatan

            // Mulai mengamati
            observer.observe(footerLogo);
        }
    });
</script>