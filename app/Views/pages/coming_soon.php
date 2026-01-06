<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('css/coming-soon.css') ?>">

<div class="video-bg-wrapper">
    <div class="video-overlay"></div> <?php $videoPath = get_setting('coming_soon_video'); ?>
    <?php if (!empty($videoPath)) : ?>
        <video autoplay muted loop playsinline class="video-bg" id="parallaxVideo">
            <source src="<?= base_url($videoPath) ?>" type="video/mp4">
        </video>
    <?php else : ?>
        <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?q=80&w=1920&auto=format&fit=crop" class="video-bg" id="parallaxVideo" alt="Background">
    <?php endif; ?>
</div>

<div class="coming-soon-container">

    <div class="glass-card" data-aos="zoom-in" data-aos-duration="1000">
        <div class="mb-4 position-relative" style="height: 100px;">
            <i class="fas fa-cog gear-animation opacity-50" style="position: absolute; left: 50%; transform: translateX(-50%);"></i>
            <div style="position: absolute; top: 40px; width: 100%; text-align: center;">
                <i class="fas fa-car-side car-animation"></i>
            </div>
        </div>

        <h1 class="fw-bold mb-3 display-4">Segera Hadir!</h1>
        <p class="lead mb-5">
            Kami sedang menyiapkan pengalaman berkendara terbaik untuk Anda. <br>
            Website ini sedang dalam tahap <i>tuning</i> akhir.
        </p>

        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center mb-4">
            <a href="<?= base_url('/') ?>" class="btn btn-warning text-dark fw-bold rounded-pill px-4 py-3 shadow-lg hover-scale">
                <i class="bi bi-house-door me-2"></i> Kembali ke Beranda
            </a>
            <a href="<?= get_whatsapp_url('Halo Admin, saya mau tanya info lebih lanjut.') ?>" target="_blank" class="btn btn-light rounded-pill px-4 py-3 shadow-lg hover-scale">
                <i class="bi bi-whatsapp me-2 text-success"></i> Hubungi Admin
            </a>
        </div>

        <!--small class="text-white-50">Scroll ke bawah untuk melihat efeknya &darr;</small-->
    </div>
    <div class="container text-center mt-5 pt-5 pb-5 auto-invert" style="max-width: 800px;">
        <h3 class="fw-bold mb-4" data-aos="fade-up">Kenapa Harus Pesona Transport?</h3>

        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 rounded-4 card-box">
                    <i class="bi bi-shield-check fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Aman & Terpercaya</h5>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 rounded-4 card-box">
                    <i class="bi bi-car-front-fill fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Armada Prima</h5>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 rounded-4 card-box">
                    <i class="bi bi-currency-dollar fs-1 mb-3 d-block"></i>
                    <h5 class="fw-bold">Harga Kompetitif</h5>
                </div>
            </div>
        </div>

        <!--p class="mt-5 opacity-75">&copy; <?= date('Y') ?> Pesona Transport Indonesia</p-->
    </div>

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const video = document.getElementById('parallaxVideo');

        // Fungsi update posisi
        function updateParallax() {
            if (!video) return;

            let scrollPosition = window.scrollY;

            // LOGIKA PARALLAX BARU:
            // Kita tetap pertahankan 'translate(-50%, -50%)' supaya video tetap di tengah
            // Lalu kita tambahkan gerakan vertikal (+ translateY)

            let translateY = scrollPosition * 0.4; // Kecepatan parallax
            let scaleValue = 1.1 + (scrollPosition * 0.0005);
            let blurValue = Math.min(scrollPosition * 0.02, 10);

            // Gabungkan centering CSS + Parallax JS
            video.style.transform = `translate3d(-50%, calc(-50% + ${translateY}px), 0) scale(${scaleValue})`;
            video.style.filter = `blur(${blurValue}px)`;
        }

        // Jalankan saat scroll
        window.addEventListener('scroll', () => {
            window.requestAnimationFrame(updateParallax);
        });

        // Jalankan sekali saat load agar posisi awal benar
        updateParallax();
    });
</script>

<style>
    /* Helper untuk efek hover tombol */
    .hover-scale {
        transition: transform 0.2s;
    }

    .hover-scale:hover {
        transform: scale(1.05);
    }
</style>

<?= $this->endSection() ?>