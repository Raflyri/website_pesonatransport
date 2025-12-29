<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">List Armada</h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="<?= base_url('admin/fleets/new') ?>" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tambah Armada
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
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px">Foto</th>
                            <th>Nama Mobil</th>
                            <th>Kategori</th>
                            <th>Harga/Hari</th>
                            <th>Transmisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($fleets as $fleet) : ?>
                        <tr>
                            <td>
                                <?php if(!empty($fleet['image_path'])): ?>
                                    <img src="<?= base_url($fleet['image_path']) ?>" alt="foto" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover;">
                                <?php else: ?>
                                    <span class="text-muted small">No IMG</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <strong><?= esc($fleet['name']) ?></strong><br>
                                <small class="text-muted"><?= esc($fleet['brand']) ?></small>
                            </td>
                            <td><?= esc($fleet['category_name']) ?></td> <td>Rp <?= number_format($fleet['price_per_day'], 0, ',', '.') ?></td>
                            <td><?= esc($fleet['transmission']) ?></td>
                            <td>
                                <?php if($fleet['is_available']): ?>
                                    <span class="badge bg-success">Tersedia</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Booked</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?= base_url('admin/fleets/' . $fleet['id'] . '/edit') ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="<?= base_url('admin/fleets/' . $fleet['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus armada ini?')">
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