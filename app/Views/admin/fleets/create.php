<?= $this->extend('admin/layout/template') ?>

<?= $this->section('content') ?>
<div class="app-content-header">
    <div class="container-fluid">
        <h3 class="mb-0">Tambah Armada Baru</h3>
    </div>
</div>

<div class="app-content">
    <div class="container-fluid">
        <div class="card card-primary card-outline mb-4">
            <form action="<?= base_url('admin/fleets') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Mobil</label>
                            <input type="text" name="name" class="form-control" required placeholder="Contoh: Toyota Innova Reborn">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Brand / Merk</label>
                            <input type="text" name="brand" class="form-control" required placeholder="Contoh: Toyota">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($categories as $cat): ?>
                                    <option value="<?= $cat['id'] ?>"><?= esc($cat['name']) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga Sewa (Per Hari)</label>
                            <div class="input-group">
                                <span class="input-group-text">Rp</span>
                                <input type="number" name="price_per_day" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Transmisi</label>
                            <select name="transmission" class="form-select" required>
                                <option value="Automatic">Automatic</option>
                                <option value="Manual">Manual</option>
                                <option value="Automatic / Manual">Automatic / Manual</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Kapasitas Kursi</label>
                            <input type="number" name="seat_capacity" class="form-control" placeholder="Contoh: 7">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Status Unit</label>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="is_available" value="1" id="statusCheck" checked>
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
                                <option value="Bensin">Bensin</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Bensin / Diesel">Bensin / Diesel</option>
                                <option value="Listrik">Listrik</option>
                            </select>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Opsi Layanan Sewa</label>
                            <select name="rental_service" class="form-select" required>
                                <option value="Keduanya">Bisa Lepas Kunci & Dengan Supir</option>
                                <option value="Dengan Supir">Hanya Dengan Supir</option>
                                <option value="Lepas Kunci">Hanya Lepas Kunci</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Mobil</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        <div class="form-text">Format: JPG, PNG. Maksimal 2MB.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi Tambahan</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Armada</button>
                    <a href="<?= base_url('admin/fleets') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>