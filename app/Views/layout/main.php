<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Pesona Transport' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <?= $this->renderSection('styles') ?>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">
            <i class="fas fa-car-side"></i> PESONA<span style="color: var(--color-dark)">TRANSPORT</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center">
            <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Daftar Mobil</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
            <li class="nav-item ms-3">
                <a class="btn btn-accent-custom px-4 rounded-pill" href="#">
                    <i class="fab fa-whatsapp"></i> Hubungi Kami
                </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <footer class="footer-custom pt-5 pb-3 mt-auto">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold">Pesona Transport</h5>
                    <p class="small">Mitra perjalanan terpercaya Anda. Melayani sewa mobil harian, bulanan, hingga korporasi dengan armada prima.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="fw-bold text-warning">Menu</h6>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-decoration-none">Armada</a></li>
                        <li><a href="#" class="text-decoration-none">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h6 class="fw-bold text-warning">Hubungi</h6>
                    <ul class="list-unstyled small">
                        <li><i class="fas fa-phone me-2"></i> 0812-3456-7890</li>
                        <li><i class="fas fa-envelope me-2"></i> info@pesonatransport.com</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> Depok, Jawa Barat</li>
                    </ul>
                </div>
            </div>
            <hr style="border-color: rgba(255,255,255,0.2);">
            <div class="text-center small">
                &copy; <?= date('Y') ?> Pesona Transport. Created by RBeverything.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <?= $this->renderSection('scripts') ?>
  </body>
</html>