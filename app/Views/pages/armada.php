<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('css/armada.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold display-5 text-dark">Armada Kami</h1>
                <p class="lead text-muted">Pilihan kendaraan terbaik untuk menemani perjalanan bisnis maupun liburan Anda.</p>
            </div>
            <div class="col-md-6 text-end d-none d-md-block">
                <i class="fas fa-car-side fa-10x text-black-50 opacity-25"></i>
            </div>
        </div>
    </div>
</section>

<section class="py-5 section-armada">
    <div class="container">

        <ul class="nav nav-pills mb-5 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active rounded-pill px-4" id="pills-all-tab" data-bs-toggle="pill" data-bs-target="#pills-all" type="button" role="tab" aria-selected="true">Semua</button>
            </li>
            <?php foreach ($categories as $cat) : ?>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4" id="pills-<?= $cat['slug'] ?>-tab" data-bs-toggle="pill" data-bs-target="#pills-<?= $cat['slug'] ?>" type="button" role="tab" aria-selected="false"><?= $cat['name'] ?></button>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="pills-all" role="tabpanel">
                <div class="row g-4">
                    <?php foreach ($fleets as $fleet) : ?>
                        <?= $this->include('components/parts/fleet_card_item', ['fleet' => $fleet]) ?>
                    <?php endforeach; ?>
                    <?php if (empty($fleets)): ?>
                        <div class="col-12 text-center py-5">
                            <p class="text-muted">Belum ada armada tersedia.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <?php foreach ($categories as $cat) : ?>
                <div class="tab-pane fade" id="pills-<?= $cat['slug'] ?>" role="tabpanel">
                    <div class="row g-4">
                        <?php
                        // Filter fleet berdasarkan kategori ID secara manual di view
                        $filteredFleets = array_filter($fleets, function ($f) use ($cat) {
                            return $f['category_id'] == $cat['id'];
                        });
                        ?>

                        <?php if (!empty($filteredFleets)) : ?>
                            <?php foreach ($filteredFleets as $fleet) : ?>
                                <?= $this->include('components/parts/fleet_card_item', ['fleet' => $fleet]) ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col-12 text-center py-5">
                                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                                <h5 class="text-muted">Tidak ada armada di kategori <?= $cat['name'] ?> saat ini.</h5>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<section class="py-5 bg-dark text-white text-center">
    <div class="container">
        <h2 class="mb-3">Butuh Kendaraan Khusus?</h2>
        <p class="mb-4">Hubungi tim kami untuk permintaan kustomisasi atau sewa jangka panjang.</p>
        <a href="https://wa.me/628123456789" class="btn btn-success btn-lg rounded-pill px-5">
            <i class="fab fa-whatsapp me-2"></i> Konsultasi Sekarang
        </a>
    </div>
</section>

<?= $this->endSection() ?>