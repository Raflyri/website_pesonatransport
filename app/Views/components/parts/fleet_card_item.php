<div class="col-md-6 col-lg-4">
    <div class="card h-100 shadow-sm border-0 fleet-card-hover">

        <div class="fleet-card-img-wrapper">
            <span class="position-absolute top-0 start-0 bg-primary text-white px-3 py-1 m-3 rounded-pill fw-bold category-badge">
                <?= esc($fleet['category_name'] ?? 'Armada') ?>
            </span>

            <img src="<?= !empty($fleet['image_path']) ? base_url($fleet['image_path']) : 'https://placehold.co/400x300?text=No+Image' ?>"
                class="card-img-top w-100 h-100 object-fit-cover"
                alt="<?= esc($fleet['name']?? 'Unit') ?>"
                style="object-fit: cover;">
        </div>

        <div class="card-body d-flex flex-column p-4">
            <div class="mb-2">
                <small class="text-muted text-uppercase fw-bold"><?= esc($fleet['brand']?? '-') ?></small>
                <h5 class="card-title fw-bold text-dark mb-0 mt-1"><?= esc($fleet['name']?? 'Unit') ?></h5>
            </div>

            <div class="d-flex justify-content-between my-3 text-muted small">
                <span class="d-flex align-items-center">
                    <i class="fas fa-chair me-2 text-primary"></i> <?= esc($fleet['seat_capacity']?? '-') ?> Kursi
                </span>
                <span class="d-flex align-items-center">
                    <i class="fas fa-cogs me-2 text-primary"></i> <?= esc($fleet['transmission']?? '-') ?>
                </span>
            </div>

            <div class="mt-auto pt-3 border-top">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted d-block">Mulai dari</small>
                        <span class="text-primary fw-bold fs-5">Rp <?= number_format($fleet['price_per_day'] ?? 0, 0, ',', '.') ?></span>
                        <small class="text-muted">/hari</small>
                    </div>
                    <a href="https://wa.me/628123456789?text=Halo, saya tertarik menyewa <?= esc($fleet['brand'] ?? '-') ?><?= esc($fleet['name'] ?? 'mobil ini') ?>" class="btn btn-outline-primary rounded-pill btn-sm px-3">
                        Pesan <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>