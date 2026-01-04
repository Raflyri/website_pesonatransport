<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <h1 class="m-0">Edit Profil Perusahaan</h1>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        
        <?php if(session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if(session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <div class="card card-primary">
            <form action="<?= base_url('admin/profile/update') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $profile['id'] ?>">
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Website / Perusahaan</label>
                        <input type="text" class="form-control" name="site_name" value="<?= esc($profile['site_name']) ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Judul (Tentang Kami)</label>
                        <input type="text" class="form-control" name="about_title" value="<?= esc($profile['about_title']) ?>">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat (Untuk Homepage)</label>
                        <textarea class="form-control" name="about_description_short" rows="3"><?= esc($profile['about_description_short']) ?></textarea>
                        <small class="text-muted">Tampil di halaman depan.</small>
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Lengkap (Untuk Halaman Detail)</label>
                        <textarea class="form-control" name="about_description_long" rows="6"><?= esc($profile['about_description_long']) ?></textarea>
                        <small class="text-muted">Bisa menggunakan tag HTML sederhana atau biarkan teks biasa.</small>
                    </div>

                    <div class="form-group">
                        <label>Gambar Tentang Kami</label><br>
                        <?php if($profile['about_image']): ?>
                            <img src="<?= base_url('uploads/about/'.$profile['about_image']) ?>" class="img-thumbnail mb-2" style="max-width: 200px;">
                        <?php endif; ?>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="about_image">
                                <label class="custom-file-label">Pilih file baru...</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?= $this->endSection() ?>