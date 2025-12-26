<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
    <link rel="stylesheet" href="<?= base_url('css/home.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="hero-section text-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="display-4 fw-bold mb-3">Solusi Transportasi <br>Aman & Nyaman</h1>
                <p class="lead mb-4 opacity-75">Sewa mobil lepas kunci atau dengan driver profesional. Harga transparan, unit terawat.</p>
                <a href="#list-mobil" class="btn btn-accent-custom btn-lg rounded-pill px-5 shadow">
                    Pilih Mobil Sekarang
                </a>
            </div>
        </div>
    </div>
    </section>

<div class="container">
    <div class="search-box-container">
        <form action="" method="GET">
            <div class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label class="form-label fw-bold small text-muted">Lokasi Penjemputan</label>
                    <select class="form-select border-0 bg-light py-3">
                        <option>Pilih Lokasi...</option>
                        <option>Jakarta</option>
                        <option>Depok</option>
                        <option>Bandung</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">Tanggal Mulai</label>
                    <input type="date" class="form-control border-0 bg-light py-3">
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">Durasi</label>
                    <select class="form-select border-0 bg-light py-3">
                        <option>1 Hari</option>
                        <option>3 Hari</option>
                        <option>7 Hari</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold rounded">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<section id="list-mobil" class="py-5 bg-light mt-5">
    <div class="container">
        <div class="text-center mb-5 section-title">
            <h2 class="fw-bold">Armada Pilihan Kami</h2>
            <p class="text-muted">Unit bersih, wangi, dan performa mesin terjaga.</p>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card car-card h-100 bg-white">
                    <div class="position-relative">
                        <span class="badge bg-danger position-absolute top-0 start-0 m-3 px-3 py-2">Best Seller</span>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/2016_Toyota_Innova_2.0_G_AG_10.jpg" class="card-img-top" alt="Mobil">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Toyota Innova Reborn</h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-user-friends me-1"></i> 7 Kursi &bullet; 
                            <i class="fas fa-cog me-1"></i> Matic &bullet; 
                            <i class="fas fa-gas-pump me-1"></i> Diesel
                        </p>
                        <hr class="text-muted opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">Mulai dari</small>
                                <span class="car-price">Rp 750.000</span><small>/hari</small>
                            </div>
                            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card car-card h-100 bg-white">
                    <div class="position-relative">
                         <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1d/2022_Toyota_Avanza_1.5_G_%28Indonesia%29_front_view.jpg/800px-2022_Toyota_Avanza_1.5_G_%28Indonesia%29_front_view.jpg" class="card-img-top" alt="Mobil">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">All New Avanza</h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-user-friends me-1"></i> 7 Kursi &bullet; 
                            <i class="fas fa-cog me-1"></i> Manual
                        </p>
                        <hr class="text-muted opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">Mulai dari</small>
                                <span class="car-price">Rp 450.000</span><small>/hari</small>
                            </div>
                            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Detail</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card car-card h-100 bg-white">
                    <div class="position-relative">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/2019_Toyota_HiAce_Premio_2.8_KDH200_%2820210711%29.jpg" class="card-img-top" alt="Mobil">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Toyota Hiace Premio</h5>
                        <p class="text-muted small mb-3">
                            <i class="fas fa-user-friends me-1"></i> 14 Kursi &bullet; 
                            <i class="fas fa-suitcase me-1"></i> Bagasi Luas
                        </p>
                        <hr class="text-muted opacity-25">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted d-block">Mulai dari</small>
                                <span class="car-price">Rp 1.200.000</span><small>/hari</small>
                            </div>
                            <a href="#" class="btn btn-outline-primary rounded-pill px-4">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>