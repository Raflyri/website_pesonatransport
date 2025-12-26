<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'Pesona Transport' ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('https://source.unsplash.com/1600x900/?car,road');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
      <div class="container">
        <a class="navbar-brand fw-bold" href="#">PESONA TRANSPORT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Armada</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Layanan</a></li>
            <li class="nav-item"><a class="nav-link btn btn-primary text-white ms-2 px-4" href="#">Kontak WA</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <?= $this->renderSection('content') ?>

    <footer class="bg-dark text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Pesona Transport</h5>
                    <p>Solusi transportasi terbaik untuk kebutuhan bisnis dan wisata Anda. Aman, Nyaman, dan Terpercaya.</p>
                </div>
                <div class="col-md-4">
                    <h5>Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Hubungi Kami</h5>
                    <p><i class="fa fa-map-marker-alt"></i> Jakarta, Indonesia<br>
                    <i class="fa fa-phone"></i> +62 812-3456-7890</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <small>&copy; <?= date('Y') ?> Pesona Transport. All Rights Reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>