<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Edit Kategori</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-warning card-outline mb-4">
            <form action="<?= base_url('admin/categories/' . $category['id']) ?>" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT"> <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" name="name" class="form-control" value="<?= esc($category['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3"><?= esc($category['description']) ?></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="<?= base_url('admin/categories') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>