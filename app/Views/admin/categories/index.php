<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Kategori Mobil</h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="<?= base_url('admin/categories/new') ?>" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Kategori
                </a>
            </div>
        </div>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <?php if (session()->getFlashdata('message')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
        <?php endif; ?>

        <div class="card mb-4">
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Deskripsi</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $index => $cat) : ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= esc($cat['name']) ?></td>
                            <td><?= esc($cat['slug']) ?></td>
                            <td><?= esc($cat['description']) ?></td>
                            <td>
                                <a href="<?= base_url('admin/categories/' . $cat['id'] . '/edit') ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?= base_url('admin/categories/' . $cat['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>