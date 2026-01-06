<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<div class="container-fluid bg-primary py-5 mb-5 hero-header" style="margin-top: 100px;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-3 text-white animated slideInDown">Pilih Armada Anda</h1>
                <p class="text-white">
                    Perjalanan dari <strong><?= esc($searchParams['pickup']) ?></strong> ke <strong><?= esc($searchParams['dropoff']) ?></strong><br>
                    Durasi: <strong><?= esc($searchParams['duration']) ?> Hari</strong>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-4">
            <?php if (empty($fleets)): ?>
                <div class="col-12 text-center">
                    <div class="alert alert-warning">Maaf, tidak ada armada yang tersedia untuk kriteria pencarian Anda.</div>
                </div>
            <?php else: ?>

                <?php foreach ($fleets as $item): ?>

                    <?php $isAvailable = ($item['is_available'] == 1); ?>

                    <div class="col-lg-4 col-md-6 wow fadeInUp <?= !$isAvailable ? 'unavailable-unit' : '' ?>" data-wow-delay="0.1s">
                        <div class="room-item shadow rounded overflow-hidden">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="<?= base_url($item['image_path']) ?>" alt="<?= esc($item['name']) ?>" style="height: 250px; object-fit: cover;">

                                <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4">
                                    <?= number_format($item['price_per_day'], 0, ',', '.') ?>/hari
                                </small>

                                <?php if (!$isAvailable): ?>
                                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center" style="background: rgba(0,0,0,0.5); z-index: 2;">
                                        <span class="badge bg-danger fs-5 px-4 py-2">TIDAK TERSEDIA</span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="p-4 mt-2">
                                <div class="d-flex justify-content-between mb-3">
                                    <h5 class="mb-0"><?= esc($item['name']) ?></h5>
                                    <div class="ps-2">
                                        <?php if ($item['fuel_type'] == 'Listrik'): ?>
                                            <small class="fa fa-bolt text-primary"></small>
                                        <?php else: ?>
                                            <small class="fa fa-gas-pump text-primary"></small>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="bg-light p-3 rounded mb-3">
                                    <div class="d-flex justify-content-between small text-muted">
                                        <span>Sewa Unit (<?= $item['calc_duration'] ?> Hari)</span>
                                        <span>Rp <?= number_format($item['calc_car_fee'], 0, ',', '.') ?></span>
                                    </div>

                                    <?php if ($searchParams['tipe_layanan'] == 'lepaskunci'): ?>
                                        <div class="d-flex justify-content-between small text-danger fw-bold mt-1">
                                            <span>Deposit (Jaminan)*</span>
                                            <span>Rp <?= number_format($item['calc_deposit'], 0, ',', '.') ?></span>
                                        </div>
                                        <small class="text-muted d-block mt-1 fst-italic" style="font-size: 11px;">
                                            *Deposit dikembalikan setelah sewa selesai.
                                        </small>
                                    <?php else: ?>
                                        <div class="d-flex justify-content-between small text-muted mt-1">
                                            <span>Jasa Supir (<?= $item['calc_duration'] ?> Hari)</span>
                                            <span>Rp <?= number_format($item['calc_driver_fee'], 0, ',', '.') ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <hr class="my-2">
                                    <div class="d-flex justify-content-between fw-bold text-dark">
                                        <span>Total Estimasi</span>
                                        <span class="text-primary fs-5">Rp <?= number_format($item['calc_total_price'], 0, ',', '.') ?></span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-dark rounded py-2 px-4 <?= !$isAvailable ? 'disabled' : '' ?>">Detail</a>

                                    <?php if ($isAvailable): ?>

                                        <?php
                                        // 1. Susun pesan teks WhatsApp yang rapi
                                        $pesanWA = "Halo admin, saya tertarik untuk sewa mobil *" . $item['name'] . "*\n";
                                        $pesanWA .= "Durasi: " . $item['calc_duration'] . " Hari\n";
                                        $pesanWA .= "Total Estimasi: Rp " . number_format($item['calc_total_price'], 0, ',', '.') . "\n";
                                        $pesanWA .= "Mohon info ketersediaannya.";

                                        // 2. Generate Link menggunakan Helper 'get_whatsapp_url'
                                        // Helper ini otomatis mengambil nomor dari database settings dan format URL-nya
                                        $linkWA = get_whatsapp_url($pesanWA);
                                        ?>

                                        <a href="<?= $linkWA ?>" target="_blank" class="btn btn-sm btn-primary rounded py-2 px-4">
                                            <i class="fab fa-whatsapp me-1"></i> Booking Now
                                        </a>

                                    <?php else: ?>
                                        <button class="btn btn-sm btn-secondary rounded py-2 px-4" disabled>Full Booked</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>


            <?php endif; ?>
        </div>
        <div class="row mt-5" data-aos="fade-up" data-aos-delay="200">
            <div class="col-12">
                <div class="pagination-wrapper d-flex justify-content-center">
                    <?= $pager->links('default', 'round_pagination') ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // 1. Ambil semua parameter pencarian saat ini (tgl, lokasi, dll) dari URL
        const currentUrlParams = new URLSearchParams(window.location.search);

        // 2. Ambil semua link pagination
        const pageLinks = document.querySelectorAll('.pagination a.page-link');

        pageLinks.forEach(link => {
            // Ambil URL tujuan dari tombol (misal: .../search?page=2)
            const hrefUrl = new URL(link.href);

            // Ambil parameter 'page' dari link tersebut
            const pageParam = hrefUrl.searchParams.get('page');

            // Update parameter halaman di list parameter kita yang lengkap
            if (pageParam) {
                currentUrlParams.set('page', pageParam);
            }

            // Set href baru dengan parameter lengkap
            // Hasilnya jadi: .../search?tipe_layanan=sopir&start_date=...&page=2
            link.href = window.location.pathname + '?' + currentUrlParams.toString();
        });
    });
</script>

<?= $this->endSection() ?>