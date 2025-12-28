<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Banner</h3>
    </div>
    
    <form action="<?= base_url('admin/banners/' . $banner['id']) ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        
        <div class="card-body">
            <div class="form-group mb-3">
                <label>Judul Utama</label>
                <input type="text" name="title" class="form-control" value="<?= old('title', $banner['title']) ?>">
            </div>
            <div class="form-group mb-3">
                <label>Sub Judul</label>
                <input type="text" name="subtitle" class="form-control" value="<?= old('subtitle', $banner['subtitle']) ?>">
            </div>
            <div class="form-group mb-3">
                <label>Link URL</label>
                <input type="text" name="link_url" class="form-control" value="<?= old('link_url', $banner['link_url']) ?>">
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label>Ganti Gambar (Biarkan kosong jika tidak diganti)</label>
                    <input type="file" name="image" class="form-control">
                    <div class="mt-2">
                        <small>Gambar Saat Ini:</small><br>
                        <img src="<?= base_url('uploads/banners/' . $banner['image_path']) ?>" width="100" class="img-thumbnail">
                    </div>
                </div>
                <div class="col-3 mb-3">
                    <label>Urutan Tampil</label>
                    <input type="number" name="display_order" class="form-control" value="<?= old('display_order', $banner['display_order']) ?>">
                </div>
                <div class="col-3 mb-3">
                    <label>Status</label>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" <?= $banner['is_active'] ? 'checked' : '' ?>>
                        <label class="form-check-label">Tampilkan di Web</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="<?= base_url('admin/banners') ?>" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>