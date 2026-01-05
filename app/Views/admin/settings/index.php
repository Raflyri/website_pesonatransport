<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Pengaturan Identitas Website</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>

        <form action="<?= base_url('admin/settings/update') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="card card-primary card-outline mb-4">
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Website (Brand Name)</label>
                        <input type="text" name="site_name" class="form-control" value="<?= $site_name ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">1. Favicon (Tab Browser)</h3>
                        </div>
                        <div class="card-body text-center">
                            <?php if ($site_icon) : ?>
                                <img src="<?= base_url($site_icon) ?>" style="width: 32px; height: 32px; border: 1px solid #ddd; padding: 2px;" class="mb-2">
                            <?php endif; ?>
                            <div class="form-group text-left">
                                <input type="file" name="site_icon" class="form-control-file">
                                <small class="text-muted d-block mt-1">Format: ICO/PNG. Rasio: Kotak (1:1). Ukuran: 32x32 px.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">2. Header Logo (Navbar)</h3>
                        </div>
                        <div class="card-body text-center bg-dark"> <?php if ($site_logo_header) : ?>
                                <img src="<?= base_url($site_logo_header) ?>" style="max-height: 50px;" class="mb-2">
                            <?php endif; ?>
                            <div class="form-group text-left bg-white p-2 rounded">
                                <input type="file" name="site_logo_header" class="form-control-file">
                                <small class="text-muted d-block mt-1">Format: PNG (Transparan). Disarankan memanjang (Landscape).</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">3. Footer Logo</h3>
                        </div>
                        <div class="card-body text-center bg-secondary">
                            <?php if ($site_logo_footer) : ?>
                                <img src="<?= base_url($site_logo_footer) ?>" style="max-height: 60px;" class="mb-2">
                            <?php endif; ?>
                            <div class="form-group text-left bg-white p-2 rounded">
                                <input type="file" name="site_logo_footer" class="form-control-file">
                                <small class="text-muted d-block mt-1">Format: PNG (Transparan/Putih). Akan muncul di background gelap.</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title">4. Login Page Logo</h3>
                        </div>
                        <div class="card-body text-center">
                            <?php if ($site_logo_login) : ?>
                                <img src="<?= base_url($site_logo_login) ?>" style="max-height: 80px;" class="mb-2">
                            <?php endif; ?>
                            <div class="form-group text-left">
                                <input type="file" name="site_logo_login" class="form-control-file">
                                <small class="text-muted d-block mt-1">Format: PNG/JPG. Ukuran lebih besar & jelas.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline mt-4">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-building mr-2"></i> Informasi Kantor & Kontak</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Deskripsi Singkat (Footer)</label>
                        <textarea name="site_desc_footer" class="form-control" rows="2"><?= $site_desc_footer ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Alamat Kantor</label>
                        <textarea name="company_address" class="form-control" rows="3"><?= $company_address ?></textarea>
                        <small class="text-muted">Gunakan Enter untuk baris baru.</small>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor Telepon (Display)</label>
                                <input type="text" name="company_phone" class="form-control" value="<?= $company_phone ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Kantor</label>
                                <input type="text" name="company_email" class="form-control" value="<?= $company_email ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card card-success card-outline mt-4">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-share-alt mr-2"></i> Social Media Links</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label><i class="fab fa-facebook text-primary"></i> Link Facebook</label>
                        <input type="text" name="social_facebook" class="form-control" value="<?= $social_facebook ?>" placeholder="https://facebook.com/...">
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-instagram text-danger"></i> Link Instagram</label>
                        <input type="text" name="social_instagram" class="form-control" value="<?= $social_instagram ?>" placeholder="https://instagram.com/...">
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-whatsapp text-success"></i> Link WhatsApp</label>
                        <input type="text" name="social_whatsapp" class="form-control" value="<?= $social_whatsapp ?>" placeholder="https://wa.me/628...">
                    </div>
                </div>
            </div>

            <div class="card card-info card-outline mb-4">
                <div class="card-header">
                    <h5 class="card-title">Konfigurasi Halaman Coming Soon</h5>
                </div>
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label>Background Video (MP4 / WebM)</label>
                        <div class="input-group">
                            <input type="file" name="coming_soon_video" class="form-control" accept="video/mp4, video/webm">
                        </div>
                        <small class="text-muted">Upload video landscape agar tampilan maksimal. Ukuran rekomen < 10MB.</small>
                    </div>

                    <?php if (get_setting('coming_soon_video')) : ?>
                        <div class="mt-2">
                            <p>Video Aktif:</p>
                            <video width="320" height="180" controls>
                                <source src="<?= base_url(get_setting('coming_soon_video')) ?>" type="video/mp4">
                                Browser Anda tidak mendukung tag video.
                            </video>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block mt-4 mb-5"><i class="fas fa-save"></i> Simpan Semua Perubahan</button>
        </form>
        <br><br>
    </div>
</section>
<?= $this->endSection() ?>