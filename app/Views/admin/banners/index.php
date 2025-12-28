<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <a href="<?= base_url('admin/banners/new') ?>" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-lg"></i> Tambah Banner
        </a>
    </div>
    <div class="card-body p-0">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success m-3"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Urutan</th>
                    <th>Status</th>
                    <th style="width: 150px">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($banners as $key => $row) : ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td>
                        <img src="<?= base_url('uploads/banners/' . $row['image_path']) ?>" alt="Banner" width="100" class="img-thumbnail">
                    </td>
                    <td>
                        <b><?= $row['title'] ?></b><br>
                        <small><?= $row['subtitle'] ?></small>
                    </td>
                    <td><?= $row['display_order'] ?></td>
                    <td>
                        <span class="badge <?= $row['is_active'] ? 'bg-success' : 'bg-secondary' ?>">
                            <?= $row['is_active'] ? 'Aktif' : 'Draft' ?>
                        </span>
                    </td>
                    <td>
                        <a href="<?= base_url('admin/banners/' . $row['id'] . '/edit') ?>" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="<?= base_url('admin/banners/' . $row['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>