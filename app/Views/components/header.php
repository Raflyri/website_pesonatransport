<nav class="navbar navbar-expand-lg navbar-custom fixed-top transition-navbar">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">
            <i class="fas fa-car-side"></i> PESONA<span style="color: var(--color-dark)">TRANSPORT</span>
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
                    <a class="nav-link <?= ($uri == 'daftar-mobil') ? 'active' : '' ?>" href="#">Daftar Mobil</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($uri == 'layanan') ? 'active' : '' ?>" href="#">Layanan</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?= ($uri == 'tentang-kami') ? 'active' : '' ?>" href="#">Tentang Kami</a>
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