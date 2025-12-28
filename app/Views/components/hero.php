<?php if (!empty($banners)) : ?>
    <div id="mainCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-indicators">
            <?php foreach ($banners as $key => $banner) : ?>
                <button type="button"
                    data-bs-target="#mainCarousel"
                    data-bs-slide-to="<?= $key ?>"
                    class="<?= $key === 0 ? 'active' : '' ?>"
                    aria-current="<?= $key === 0 ? 'true' : 'false' ?>"
                    aria-label="Slide <?= $key + 1 ?>"></button>
            <?php endforeach; ?>
            <div class="mt-5 animate__animated animate__fadeInUp animate__delay-1s">
                <a href="#pencarian" class="text-white fs-1">
                    <i class="fas fa-chevron-down bounce-animation"></i>
                </a>
            </div>
        </div>


        <div class="carousel-inner">
            <?php foreach ($banners as $key => $banner) : ?>
                <div class="carousel-item hero-slide <?= $key === 0 ? 'active' : '' ?>"
                    style="background-image: url('<?= base_url('uploads/banners/' . $banner['image_path']) ?>');">

                    <div class="overlay-bg"></div>

                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <div class="col-md-8 offset-md-1 carousel-caption-custom text-start">
                                <?php if (!empty($banner['title'])): ?>
                                    <h1 class="display-4 fw-bold text-white mb-3 animate__animated animate__fadeInDown">
                                        <?= nl2br($banner['title']) ?>
                                    </h1>
                                <?php endif; ?>

                                <?php if (!empty($banner['subtitle'])): ?>
                                    <p class="lead text-white mb-4 animate__animated animate__fadeInUp">
                                        <?= $banner['subtitle'] ?>
                                    </p>
                                <?php endif; ?>

                                <?php if (!empty($banner['link_url'])): ?>
                                    <a href="<?= $banner['link_url'] ?>" class="btn btn-accent-custom btn-lg rounded-pill px-5 shadow animate__animated animate__fadeInUp">
                                        Selengkapnya
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev fade-control" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next fade-control" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php endif; ?>