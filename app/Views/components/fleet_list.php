<section id="list-mobil" class="py-5 mt-5">
    
    <style>
        /* Pastikan transisi halus pada element card di dalam slide */
        .swiper-slide .card {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Efek membal sedikit */
            border: none; /* Opsional: hilangkan border bawaan bootstrap biar lebih clean */
        }

        /* Saat slide di-hover (oleh mouse) */
        .swiper-slide:hover .card {
            transform: translateY(-10px) scale(1.02); /* Naik ke atas 10px & membesar dikit */
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15) !important; /* Bayangan makin tebal */
            z-index: 2; /* Pastikan dia di atas elemen lain */
        }
        
        /* Opsional: Ubah kursor jadi pointer biar kerasa bisa diklik/geser */
        .swiper-slide {
            cursor: grab;
        }
        .swiper-slide:active {
            cursor: grabbing;
        }
    </style>

    <div class="container">
        
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bold">Armada Pilihan</h2>
            <p class="text-muted">Unit terawat siap menemani perjalanan Anda.</p>
        </div>

        <ul class="nav nav-pills justify-content-center mb-5" id="fleetTabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill px-4 me-2" id="tab-all" data-bs-toggle="tab" data-bs-target="#content-all" type="button">Semua</button>
            </li>
            <?php if(!empty($categories)): ?>
                <?php foreach($categories as $cat): ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 me-2" id="tab-<?= $cat['slug'] ?>" data-bs-toggle="tab" data-bs-target="#content-<?= $cat['id'] ?>" type="button">
                        <?= esc($cat['name']) ?>
                    </button>
                </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <div class="tab-content">

            <div class="tab-pane fade show active" id="content-all" role="tabpanel">
                <div class="position-relative px-4"> 
                    <div class="swiper swiper-container-all py-4"> 
                        <div class="swiper-wrapper">
                            <?php if (!empty($fleets)) : ?>
                                <?php foreach ($fleets as $fleet) : ?>
                                    <?= $this->setData(['fleet' => $fleet])->include('components/parts/fleet_card') ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>

            <?php if(!empty($categories)): ?>
                <?php foreach($categories as $cat): ?>
                <div class="tab-pane fade" id="content-<?= $cat['id'] ?>" role="tabpanel">
                    <div class="position-relative px-4">
                        <div class="swiper swiper-container-cat-<?= $cat['id'] ?> py-4">
                            <div class="swiper-wrapper">
                                <?php 
                                    $filteredFleets = array_filter($fleets, function($f) use ($cat) {
                                        return $f['category_id'] == $cat['id'];
                                    });
                                ?>
                                <?php if (!empty($filteredFleets)) : ?>
                                    <?php foreach ($filteredFleets as $fleet) : ?>
                                        <?= $this->setData(['fleet' => $fleet])->include('components/parts/fleet_card') ?>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="col-12 text-center text-muted">Tidak ada armada di kategori ini.</div>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        
        // KONFIGURASI SWIPER 3D (Disesuaikan agar mirip video)
        const swiper3DConfig = {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto", 
            loop: true,
            // Penting agar looping mulus saat slide sedikit
            loopedSlides: 4, 

            speed: 800, // Sedikit lebih lambat agar gerakan 3D terlihat elegan
            
            // Konfigurasi Coverflow yang lebih dramatis
            coverflowEffect: {
                rotate: 50,      // Sudut putar slide samping (makin besar makin miring)
                stretch: 0,      // Jarak tarik antar slide (bisa negatif jika ingin menumpuk)
                depth: 100,      // Kedalaman 3D (makin besar, slide samping makin "jauh")
                modifier: 1,     // Pengali efek (biarkan 1 agar mudah diatur via depth/rotate)
                slideShadows: true, // Aktifkan bayangan untuk efek kedalaman
            },
            
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            
            // Event hooks
            on: {
                init: function () {
                    if (typeof AOS !== 'undefined') AOS.refresh(); 
                },
                slideChangeTransitionEnd: function () {
                    if (typeof AOS !== 'undefined') AOS.refresh(); 
                }
            }
        };

        // Inisialisasi Tab 'Semua'
        try {
            new Swiper(".swiper-container-all", {
                ...swiper3DConfig,
                navigation: {
                    nextEl: ".btn-next-all",
                    prevEl: ".btn-prev-all",
                },
            });
        } catch (e) { console.error("Swiper All Error:", e); }

        // Inisialisasi Tab Kategori
        <?php if(!empty($categories)): ?>
            <?php foreach($categories as $cat): ?>
                try {
                    new Swiper(".swiper-container-cat-<?= $cat['id'] ?>", {
                        ...swiper3DConfig,
                        navigation: {
                            nextEl: ".btn-next-cat-<?= $cat['id'] ?>",
                            prevEl: ".btn-prev-cat-<?= $cat['id'] ?>",
                        },
                    });
                } catch (e) { console.error("Swiper Cat <?= $cat['id'] ?> Error:", e); }
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>