<nav class="navbar navbar-expand-lg navbar-custom fixed-top transition-navbar">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="<?= base_url() ?>">

            <img src="<?= base_url(get_setting('site_logo_header', 'admin_assets/img/AdminLTELogo.png')) ?>"
                alt="Logo"
                class="d-inline-block align-text-top brand-logo-responsive">

            <!--span class="fw-bold fs-5 ms-2 d-none d-md-block">
                <?= get_setting('site_name', 'Pesona Transport') ?>
            </span-->

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php $uri = uri_string(); ?>

            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($uri == '' || $uri == '/') ? 'active' : '' ?>" href="<?= base_url('/') ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($uri == 'armada') ? 'active' : '' ?>" href="<?= base_url('/armada') ?>">Armada</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($uri == 'layanan') ? 'active' : '' ?>" href="#">Layanan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($uri == 'tentang-kami') ? 'active' : '' ?>" href="<?= base_url('/tentang-kami') ?>">Tentang Kami</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="btn btn-accent-custom px-4 rounded-pill" href="#">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>