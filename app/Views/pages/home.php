<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>

<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3">Sewa Mobil Mudah & Terpercaya</h1>
        <p class="lead mb-4">Pilihan armada lengkap dengan harga kompetitif untuk perjalanan Anda.</p>
        <a href="#" class="btn btn-primary btn-lg px-5">Lihat Armada</a>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-3">
                    <i class="fas fa-car fa-3x text-primary mb-3"></i>
                    <h4>Unit Terawat</h4>
                    <p>Kendaraan selalu diservis rutin demi keamanan dan kenyamanan Anda.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <i class="fas fa-user-tie fa-3x text-primary mb-3"></i>
                    <h4>Driver Profesional</h4>
                    <p>Driver berpengalaman, ramah, dan hafal rute perjalanan.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3">
                    <i class="fas fa-tags fa-3x text-primary mb-3"></i>
                    <h4>Harga Transparan</h4>
                    <p>Tidak ada biaya tersembunyi. Harga terbaik untuk kualitas terbaik.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <h2 class="text-center mb-5">Armada Pilihan</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/2022_Toyota_Avanza_1.5_G_%28Indonesia%29_front_view.jpg/800px-2022_Toyota_Avanza_1.5_G_%28Indonesia%29_front_view.jpg" class="card-img-top" alt="Avanza">
                    <div class="card-body">
                        <h5 class="card-title">Toyota All New Avanza</h5>
                        <p class="card-text text-muted">MPV • 7 Kursi • Manual/Matic</p>
                        <h6 class="text-primary fw-bold">Rp 450.000 / hari</h6>
                        <a href="#" class="btn btn-outline-primary w-100 mt-2">Booking</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/2016_Toyota_Innova_2.0_G_AG_10.jpg" class="card-img-top" alt="Innova">
                    <div class="card-body">
                        <h5 class="card-title">Toyota Innova Reborn</h5>
                        <p class="card-text text-muted">MPV • 7 Kursi • Diesel/Bensin</p>
                        <h6 class="text-primary fw-bold">Rp 750.000 / hari</h6>
                        <a href="#" class="btn btn-outline-primary w-100 mt-2">Booking</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/2019_Toyota_HiAce_Premio_2.8_KDH200_%2820210711%29.jpg" class="card-img-top" alt="Hiace">
                    <div class="card-body">
                        <h5 class="card-title">Toyota Hiace Premio</h5>
                        <p class="card-text text-muted">Minibus • 14 Kursi • Manual</p>
                        <h6 class="text-primary fw-bold">Rp 1.200.000 / hari</h6>
                        <a href="#" class="btn btn-outline-primary w-100 mt-2">Booking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>