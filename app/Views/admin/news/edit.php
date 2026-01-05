<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Edit Berita</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-warning card-outline mb-4">
            <form action="<?= base_url('admin/news/' . $news['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label class="form-label">Judul Berita</label>
                                <input type="text" name="title" class="form-control" value="<?= esc($news['title']) ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Isi Berita / Artikel</label>
                                <textarea name="content" class="form-control" rows="12" required><?= esc($news['content']) ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card bg-light border-0">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Kategori</label>
                                        <select name="category" class="form-select" required>
                                            <?php 
                                            $cats = ['General', 'Promo', 'Tips Travel', 'Otomotif', 'Event'];
                                            foreach($cats as $cat): 
                                            ?>
                                                <option value="<?= $cat ?>" <?= ($news['category'] == $cat) ? 'selected' : '' ?>>
                                                    <?= $cat ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Gambar Sampul</label>
                                        <br>
                                        <?php if(!empty($news['image_path'])): ?>
                                            <img src="<?= base_url($news['image_path']) ?>" class="img-thumbnail mb-2 shadow-sm" style="width: 100%; height: auto;">
                                        <?php endif; ?>
                                        
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <div class="form-text small">Biarkan kosong jika tidak ingin mengganti gambar.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Update Berita</button>
                    <a href="<?= base_url('admin/news') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>