<div class="swiper-slide">
    <div class="flip-card-inner">
        
        <div class="flip-card-front">
            <div class="img-wrapper position-relative" style="height: 60%;">
                <?php if(isset($fleet['price_per_day']) && $fleet['price_per_day'] < 500000): ?>
                    <span class="badge bg-danger position-absolute top-0 start-0 m-3 shadow-sm">Promo</span>
                <?php endif; ?>

                <img src="<?= !empty($fleet['image_path']) ? base_url($fleet['image_path']) : 'https://placehold.co/400x300?text=No+Image' ?>" 
                     class="w-100 h-100 object-fit-cover" 
                     alt="<?= esc($fleet['name'] ?? 'Unit') ?>">
                     
                <div class="position-absolute bottom-0 w-100 p-2 text-white text-center small" 
                     style="background: linear-gradient(to top, rgba(0,0,0,0.7), transparent);">
                    <i class="fas fa-hand-pointer me-1"></i> Tap untuk detail
                </div>
            </div>
            
            <div class="card-body d-flex flex-column justify-content-between text-center pt-4" style="height: 40%;">
                <h5 class="fw-bold text-dark mb-0"><?= esc($fleet['name'] ?? 'Nama Mobil') ?></h5>
                <div class="text-primary fw-bold fs-4">
                    Rp <?= number_format($fleet['price_per_day'] ?? 0, 0, ',', '.') ?>
                    <small class="text-muted fs-6 fw-normal">/hari</small>
                </div>
            </div>
        </div>

        <div class="flip-card-back">
            <h5 class="fw-bold border-bottom border-white pb-2 mb-3 w-100 text-center">Spesifikasi</h5>
            
            <ul class="list-unstyled text-start w-100 px-3 mb-4">
                <li class="mb-2"><i class="fas fa-car me-2"></i> Brand: <?= esc($fleet['brand'] ?? '-') ?></li>
                <li class="mb-2"><i class="fas fa-cogs me-2"></i> Transmisi: <?= esc($fleet['transmission'] ?? '-') ?></li>
                <li class="mb-2"><i class="fas fa-users me-2"></i> Kursi: <?= esc($fleet['seat_capacity'] ?? '-') ?> Orang</li>
            </ul>

            <a href="https://wa.me/628123456789?text=Halo admin, saya mau sewa <?= esc($fleet['name'] ?? 'mobil ini') ?>" 
               class="btn btn-light text-primary rounded-pill px-4 fw-bold shadow-sm mb-3">
               <i class="fab fa-whatsapp me-1"></i> Pesan Sekarang
            </a>
            
            <button type="button" class="btn btn-outline-light btn-sm rounded-pill px-3 btn-close-flip">
                Tutup Detail
            </button>
        </div>

    </div>
</div>