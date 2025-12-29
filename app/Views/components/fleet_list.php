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
        
        // CONFIG MIRIP VIDEO YOUTUBE (CODEHAL)
        const swiper3DConfig = {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto", // Wajib 'auto' + CSS width fixed
            loop: true,
            slidesPerGroup: 1, // Pastikan geser 1 per 1
            spaceBetween: 20, // Jarak antar slide
            coverflowEffect: {
                rotate: 0,      // Tidak memutar slide (tetap tegak)
                stretch: 0,     // Tidak ditarik
                depth: 100,     // Kedalaman 3D
                modifier: 2.5,  // Kekuatan efek (semakin besar semakin 3D)
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
            observer: true,       // Wajib untuk Tabs
            observeParents: true, // Wajib untuk Tabs
            
            // Fix agar AOS refresh saat slide berubah (Opsional)
            on: {
                init: function () {
                    AOS.refresh(); 
                },
                slideChangeTransitionEnd: function () {
                    AOS.refresh(); 
                }
            }
        };

        // Inisialisasi Tab 'Semua'
        new Swiper(".swiper-container-all", {
            ...swiper3DConfig,
            navigation: {
                nextEl: ".btn-next-all",
                prevEl: ".btn-prev-all",
            },
        });

        // Inisialisasi Tab Kategori
        <?php if(!empty($categories)): ?>
            <?php foreach($categories as $cat): ?>
                new Swiper(".swiper-container-cat-<?= $cat['id'] ?>", {
                    ...swiper3DConfig,
                    navigation: {
                        nextEl: ".btn-next-cat-<?= $cat['id'] ?>",
                        prevEl: ".btn-prev-cat-<?= $cat['id'] ?>",
                    },
                });
            <?php endforeach; ?>
        <?php endif; ?>
    });
</script>