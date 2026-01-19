<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
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
                                <textarea id="summernote" name="content" class="form-control" required></textarea>
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

                                    <div class="mb-3">
                                        <label class="form-label">Tanggal Tayang (Publish Date)</label>
                                        <input type="datetime-local" name="published_at" class="form-control"
                                            value="<?= date('Y-m-d\TH:i') ?>" required>
                                        <div class="form-text small">
                                            Jika tanggal diset ke masa depan, berita tidak akan muncul sampai tanggal tersebut.
                                        </div>
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

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        placeholder: 'Tulis isi artikel yang menarik di sini...',
        tabsize: 2,
        height: 400, // Tinggi editor
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>

<?= $this->endSection() ?>