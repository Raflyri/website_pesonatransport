<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Tulis Berita Baru</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline mb-4">
            <form action="<?= base_url('admin/news') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required placeholder="Contoh: 5 Tips Merawat Mesin Mobil Diesel">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Isi Berita / Artikel <span class="text-danger">*</span></label>
                                <textarea name="content" class="form-control" rows="12" required placeholder="Tulis isi artikel di sini..."></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="category" class="form-select" required>
                                            <option value="General">General</option>
                                            <option value="Promo">Promo</option>
                                            <option value="Tips Travel">Tips Travel</option>
                                            <option value="Otomotif">Otomotif</option>
                                            <option value="Event">Event</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Gambar Sampul (Cover)</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <div class="form-text small">Format: JPG, PNG. Max 2MB.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Terbitkan Berita</button>
                    <a href="<?= base_url('admin/news') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>