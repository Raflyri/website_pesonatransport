<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('css/armada.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="hero-armada position-relative d-flex align-items-center">
    <div class="hero-bg-overlay"></div>

    <div class="container position-relative z-2">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <!--<nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb bg-transparent p-0 m-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('/') ?>" class="text-white-50 text-decoration-none small">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="breadcrumb-item active text-white small" aria-current="page">Armada</li>
                    </ol>
                </nav>-->

                <h1 class="display-4 fw-bold text-white mb-3">Armada Kami</h1>
                <p class="lead text-white-50 mb-0">
                    Temukan kendaraan yang pas untuk setiap momen perjalanan Anda. <br class="d-none d-md-block">
                    Mulai dari City Car irit hingga Luxury Bus yang nyaman.
                </p>
            </div>

            <div class="col-lg-5 text-end d-none d-lg-block">
                <i class="fas fa-car-side fa-10x text-white opacity-10 floating-icon"></i>
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
                        <!--$this->include('components/parts/fleet_card_item', ['fleet' => $fleet]) ?-->
                        <?= $this->setData(['fleet' => $fleet])->include('components/parts/fleet_card_item') ?>
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
                                <!--?= $this->include('components/parts/fleet_card_item', ['fleet' => $fleet]) ?-->
                                <?= $this->setData(['fleet' => $fleet])->include('components/parts/fleet_card_item') ?>
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

<section class="py-5 bg-dark text-center auto-contrast" id="cta-section">
    <div class="container">
        <h2 class="mb-3">Butuh Kendaraan Khusus?</h2>
        <p class="mb-4">Hubungi tim kami untuk permintaan kustomisasi atau sewa jangka panjang.</p>
        <a href="https://wa.me/628123456789" class="btn btn-success btn-lg rounded-pill px-5">
            <i class="fab fa-whatsapp me-2"></i> Konsultasi Sekarang
        </a>
    </div>
</section>

<?= $this->endSection() ?>