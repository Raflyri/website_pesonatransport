<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0">Daftar Berita & Artikel</h3>
            </div>
            <div class="col-sm-6 text-end">
                <a href="<?= base_url('admin/news/new') ?>" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Tulis Berita Baru
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
                            <th style="width: 80px">Cover</th>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Tanggal Tayang</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($news_list)) : ?>
                            <?php foreach ($news_list as $item) : ?>
                            <tr>
                                <td>
                                    <?php if(!empty($item['image_path'])): ?>
                                        <img src="<?= base_url($item['image_path']) ?>" alt="cover" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    <?php else: ?>
                                        <span class="text-muted small">No IMG</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?= esc($item['title']) ?></strong><br>
                                    <small class="text-muted text-truncate d-inline-block" style="max-width: 200px;">
                                        <?= esc(substr(strip_tags($item['content']), 0, 50)) ?>...
                                    </small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary"><?= esc($item['category']) ?></span>
                                </td>
                                <td>
                                    <small><?= date('d M Y', strtotime($item['created_at'])) ?></small>
                                </td>
                                <td>
                                    <a href="<?= base_url('admin/news/' . $item['id'] . '/edit') ?>" class="btn btn-sm btn-warning" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="<?= base_url('admin/news/' . $item['id']) ?>" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                    <a href="<?= base_url('news/' . $item['slug']) ?>" target="_blank" class="btn btn-sm btn-info text-white" title="Lihat di Web">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum ada berita yang ditulis.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>