<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Edit Armada</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-warning card-outline mb-4">
            <form action="<?= base_url('admin/fleets/' . $fleet['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Mobil</label>
                            <input type="text" name="name" class="form-control" value="<?= esc($fleet['name']) ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Brand / Merk</label>
                            <input type="text" name="brand" class="form-control" value="<?= esc($fleet['brand']) ?>" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>" <?= ($cat['id'] == $fleet['category_id']) ? 'selected' : '' ?>>
                                        <?= esc($cat['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga Sewa (Per Hari)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price_per_day" class="form-control" value="<?= esc($fleet['price_per_day']) ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Transmisi</label>
                            <select name="transmission" class="form-select">
                                <option value="Automatic" <?= ($fleet['transmission'] == 'Automatic') ? 'selected' : '' ?>>Automatic</option>
                                <option value="Manual" <?= ($fleet['transmission'] == 'Manual') ? 'selected' : '' ?>>Manual</option>
                                <option value="Automatic / Manual" <?= ($fleet['transmission'] == 'Automatic / Manual') ? 'selected' : '' ?>>Automatic / Manual</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kapasitas Kursi</label>
                            <input type="number" name="seat_capacity" class="form-control" value="<?= esc($fleet['seat_capacity']) ?>">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status Unit</label>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="is_available" value="1" id="statusCheck" <?= ($fleet['is_available'] == 1) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="statusCheck">
                                    Tersedia (Ready)
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Bahan Bakar</label>
                            <select name="fuel_type" class="form-select" required>
                                <option value="Bensin" <?= ($fleet['fuel_type'] == 'Bensin') ? 'selected' : '' ?>>Bensin</option>
                                <option value="Diesel" <?= ($fleet['fuel_type'] == 'Diesel') ? 'selected' : '' ?>>Diesel</option>
                                <option value="Bensin / Diesel" <?= ($fleet['fuel_type'] == 'Bensin / Diesel') ? 'selected' : '' ?>>Bensin / Diesel</option>
                                <option value="Listrik" <?= ($fleet['fuel_type'] == 'Listrik') ? 'selected' : '' ?>>Listrik</option>

                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Opsi Layanan Sewa</label>
                            <select name="rental_service" class="form-select" required>
                                <option value="Keduanya" <?= ($fleet['rental_service'] == 'Keduanya') ? 'selected' : '' ?>>Bisa Lepas Kunci & Dengan Supir</option>
                                <option value="Dengan Supir" <?= ($fleet['rental_service'] == 'Dengan Supir') ? 'selected' : '' ?>>Hanya Dengan Supir</option>
                                <option value="Lepas Kunci" <?= ($fleet['rental_service'] == 'Lepas Kunci') ? 'selected' : '' ?>>Hanya Lepas Kunci</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Mobil</label>
                        <br>
                        <?php if (!empty($fleet['image_path'])): ?>
                            <img src="<?= base_url($fleet['image_path']) ?>" class="img-thumbnail mb-2" style="height: 100px;">
                        <?php endif; ?>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Biarkan kosong jika tidak ingin mengganti foto.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Tambahan</label>
                        <textarea name="description" class="form-control" rows="3"><?= esc($fleet['description']) ?></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Armada</button>
                    <a href="<?= base_url('admin/fleets') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>