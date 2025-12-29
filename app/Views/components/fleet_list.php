<section id="list-mobil" class="py-5 mt-5">
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
                <div class="position-relative px-4"> <div class="swiper swiper-container-all py-4"> <div class="swiper-wrapper">
                            <?php if (!empty($fleets)) : ?>
                                <?php foreach ($fleets as $fleet) : ?>
                                    <?= $this->setData(['fleet' => $fleet])->include('components/parts/fleet_card') ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                    <div class="swiper-nav-buttons d-flex justify-content-between position-absolute top-50 start-0 w-100 px-1 translate-middle-y" style="z-index: 10; pointer-events: none;">
                        <button class="btn-prev-all" style="pointer-events: auto;"><i class="fas fa-chevron-left"></i></button>
                        <button class="btn-next-all" style="pointer-events: auto;"><i class="fas fa-chevron-right"></i></button>
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
                        <div class="swiper-nav-buttons d-flex justify-content-between position-absolute top-50 start-0 w-100 px-1 translate-middle-y" style="z-index: 10; pointer-events: none;">
                            <button class="btn-prev-cat-<?= $cat['id'] ?>" style="pointer-events: auto;"><i class="fas fa-chevron-left"></i></button>
                            <button class="btn-next-cat-<?= $cat['id'] ?>" style="pointer-events: auto;"><i class="fas fa-chevron-right"></i></button>
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
        
        // CONFIG SWIPER 3D (Updated Fix)
        const swiper3DConfig = {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto", 
            
            // --- BAGIAN FIX LOOPING ---
            loop: true,
            // PENTING: Wajib ada jika slidesPerView: 'auto'
            // Angka ini menentukan jumlah slide bayangan. 
            // Minimal setara dengan jumlah slide yang terlihat di layar (misal 5 atau 6).
            loopedSlides: 6, 
            // --------------------------

            speed: 600, // Kecepatan transisi biar lebih smooth
            slidesPerGroup: 1,
            spaceBetween: 30, // Jarak antar slide
            
            coverflowEffect: {
                rotate: 0,      
                stretch: 0,     
                depth: 100,     
                modifier: 2.5,  
                slideShadows: false, // Bayangan dimatikan biar bersih
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            observer: true,       
            observeParents: true, 
            
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
        // Kita bungkus dalam try-catch biar kalau error satu, yang lain tetap jalan
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