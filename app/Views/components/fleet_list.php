<section id="list-mobil" class="py-5 mt-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4 section-header" data-aos="fade-right">
            <div>
                <h2 class="fw-bold mb-1">Armada Pilihan</h2>
                <p class="text-muted mb-0">Unit bersih & performa terjaga.</p>
            </div>
            <div class="swiper-nav-buttons d-none d-md-flex gap-2">
                <button class="btn btn-outline-primary rounded-circle swiper-prev"><i class="fas fa-chevron-left"></i></button>
                <button class="btn btn-outline-primary rounded-circle swiper-next"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>

        <ul class="nav nav-pills mb-4" id="fleetTabs" role="tablist" data-aos="zoom-in" data-aos-delay="200">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill px-4 me-2" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button">Semua Armada</button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        <?php if (!empty($fleets) && is_array($fleets)) : ?>
                            <?php foreach ($fleets as $fleet) : ?>
                            <div class="swiper-slide">
                                <div class="card car-card h-100">
                                    <div class="img-wrapper position-relative">
                                        <?php if($fleet['price_per_day'] < 500000): ?>
                                            <span class="badge bg-danger position-absolute top-0 start-0 m-3">Promo</span>
                                        <?php endif; ?>

                                        <img src="<?= !empty($fleet['image_path']) ? base_url($fleet['image_path']) : 'https://placehold.co/400x300?text=No+Image' ?>" 
                                             class="card-img-top" 
                                             alt="<?= esc($fleet['name']) ?>"
                                             style="height: 200px; object-fit: cover;">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold"><?= esc($fleet['name']) ?></h5>
                                        <p class="text-muted small mb-2">
                                            <?= esc($fleet['brand']) ?> • <?= esc($fleet['transmission']) ?> • <?= esc($fleet['seat_capacity']) ?> Seats
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div>
                                                <span class="text-primary fw-bold fs-5">Rp <?= number_format($fleet['price_per_day'], 0, ',', '.') ?></span>
                                                <small class="text-muted">/hari</small>
                                            </div>
                                            <a href="https://wa.me/628123456789?text=Halo admin, saya mau sewa <?= esc($fleet['name']) ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">Pesan</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-12 text-center">
                                <p>Belum ada data armada.</p>
                            </div>
                        <?php endif; ?>

                    </div>
                    <div class="swiper-pagination mt-4"></div>
                </div>

            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto", // Mengikuti lebar CSS (300px)
            loop: true, // Looping aktif
            spaceBetween: 30, // Memberi jarak antar slide supaya tidak 'nempel' saat transisi
            
            // Konfigurasi Coverflow agar tidak terlalu ekstrem (mengurangi efek loncat visual)
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1, // Dikurangi dari 2.5 ke 1 agar pergeseran lebih halus
                slideShadows: false,
            },

            // Navigasi Tombol
            navigation: {
                nextEl: ".swiper-next",
                prevEl: ".swiper-prev",
            },

            // Pagination Bawah
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            // Autoplay (Opsional: pause saat di-hover mouse)
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },

            // PENTING: Mencegah klik ganda yang bikin loncat kejauhan
            preventClicks: true,
            preventClicksPropagation: true,
        });
    });
</script>