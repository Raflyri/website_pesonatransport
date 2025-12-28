<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Form Tambah Banner</h3>
    </div>
    
    <form action="<?= base_url('admin/banners') ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <div class="card-body">
            <?php if (session('errors')) : ?>
                <div class="alert alert-danger">
                    <ul>
                    <?php foreach (session('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <div class="form-group mb-3">
                <label>Judul Utama</label>
                <input type="text" name="title" class="form-control" placeholder="Contoh: Promo Lebaran" value="<?= old('title') ?>">
            </div>
            <div class="form-group mb-3">
                <label>Sub Judul (Opsional)</label>
                <input type="text" name="subtitle" class="form-control" placeholder="Contoh: Diskon s/d 50%" value="<?= old('subtitle') ?>">
            </div>
            <div class="form-group mb-3">
                <label>Link URL (Jika diklik arahkan kemana)</label>
                <input type="text" name="link_url" class="form-control" placeholder="#" value="<?= old('link_url') ?>">
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label>Upload Gambar</label>
                    <input type="file" name="image" class="form-control" required>
                    <small class="text-muted">Format: JPG/PNG, Max: 2MB</small>
                </div>
                <div class="col-3 mb-3">
                    <label>Urutan Tampil</label>
                    <input type="number" name="display_order" class="form-control" value="0">
                </div>
                <div class="col-3 mb-3">
                    <label>Status</label>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked>
                        <label class="form-check-label">Tampilkan di Web</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="<?= base_url('admin/banners') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>