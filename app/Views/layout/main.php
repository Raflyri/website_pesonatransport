<!doctype html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?? 'Pesona Transport' ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

  <?= $this->renderSection('styles') ?>
</head>

<body>



  <?= $this->include('components/header') ?>

  <script>
    // Script untuk efek Floating Navbar
    const navbar = document.querySelector('.navbar-custom');

    window.addEventListener('scroll', () => {
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>

  <?= $this->renderSection('content') ?>

  <?= $this->include('components/footer') ?>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800, // Durasi animasi (ms)
      once: false, // Animasi hanya jalan sekali saat scroll ke bawah
      mirror: true,
      offset: 100, // Jarak trigger animasi dari bawah layar
    });
  </script>

  <?= $this->renderSection('scripts') ?>
</body>

</html>

<?= $this->renderSection('scripts') ?>
</body>

</html>