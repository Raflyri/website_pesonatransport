<div class="swiper-slide">
    <div class="card car-card h-100" data-aos="zoom-in" data-aos-duration="1000">
        <div class="img-wrapper position-relative">
            <?php if(isset($fleet['price_per_day']) && $fleet['price_per_day'] < 500000): ?>
                <span class="badge bg-danger position-absolute top-0 start-0 m-3">Promo</span>
            <?php endif; ?>

            <img src="<?= !empty($fleet['image_path']) ? base_url($fleet['image_path']) : 'https://placehold.co/400x300?text=No+Image' ?>" 
                 class="card-img-top" 
                 alt="<?= esc($fleet['name'] ?? 'Unit') ?>"
                 style="height: 200px; object-fit: cover;">
        </div>
        <div class="card-body">
            <h5 class="card-title fw-bold"><?= esc($fleet['name'] ?? 'Nama Mobil') ?></h5>
            <p class="text-muted small mb-2">
                <?= esc($fleet['brand'] ?? '-') ?> • <?= esc($fleet['transmission'] ?? '-') ?> • <?= esc($fleet['seat_capacity'] ?? '-') ?> Seats
            </p>
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div>
                    <span class="text-primary fw-bold fs-5">Rp <?= number_format($fleet['price_per_day'] ?? 0, 0, ',', '.') ?></span>
                    <small class="text-muted">/hari</small>
                </div>
                <a href="https://wa.me/628123456789?text=Halo admin, saya mau sewa <?= esc($fleet['name'] ?? 'mobil ini') ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3">Pesan</a>
            </div>
        </div>
    </div>
</div>