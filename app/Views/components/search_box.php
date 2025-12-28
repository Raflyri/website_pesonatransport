<div class="container" id="pencarian" style="position: relative; z-index: 20;">
    <div class="search-box-container shadow-lg p-4" data-aos="fade-up" data-aos-delay="200">
        <form action="" method="GET">

            <div class="d-flex justify-content-center mb-4">
                <div class="btn-group bg-light rounded-pill p-1 shadow-sm" role="group" style="width: 100%; max-width: 400px;">
                    <input type="radio" class="btn-check" name="tipe_layanan" id="layanan_sopir" value="sopir" checked autocomplete="off">
                    <label class="btn btn-sm rounded-pill fw-bold py-2 px-4 transition-btn" for="layanan_sopir" id="label_sopir">
                        <i class="fas fa-user-tie me-2"></i> Dengan Sopir
                    </label>

                    <input type="radio" class="btn-check" name="tipe_layanan" id="layanan_lepaskunci" value="lepaskunci" autocomplete="off">
                    <label class="btn btn-sm rounded-pill fw-bold py-2 px-4 transition-btn" for="layanan_lepaskunci" id="label_lepaskunci">
                        <i class="fas fa-key me-2"></i> Lepas Kunci
                    </label>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">Lokasi Penjemputan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-map-marker-alt text-primary"></i></span>
                        <select class="form-select border-0 bg-light py-3">
                            <option value="">Pilih Lokasi...</option>
                            <option value="jakarta">Jakarta</option>
                            <option value="depok">Depok</option>
                            <option value="bogor">Bogor</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">Tanggal Mulai</label>
                    <input type="date" class="form-control border-0 bg-light py-3">
                </div>

                <div class="col-md-4 dynamic-field" id="field-sopir">
                    <div class="row g-2">
                        <div class="col-6">
                            <label class="form-label fw-bold small text-muted">Tipe Sewa</label>
                            <select class="form-select border-0 bg-light py-3">
                                <option value="harian">Per Hari (Maks 12 Jam)</option>
                                <option value="jam">Per Jam (Drop Off)</option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-bold small text-muted">Durasi</label>
                            <div class="input-group">
                                <input type="number" class="form-control border-0 bg-light py-3" value="1" min="1">
                                <span class="input-group-text bg-light border-0 text-muted">Hari</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 dynamic-field d-none" id="field-lepaskunci">
                    <div class="row g-2">
                        <div class="col-5">
                            <label class="form-label fw-bold small text-muted">Paket Sewa</label>
                            <select class="form-select border-0 bg-light py-3" id="select_paket_sewa">
                                <option value="harian">Harian</option>
                                <option value="bulanan">Bulanan</option>
                                <option value="tahunan">Tahunan</option>
                            </select>
                        </div>

                        <div class="col-7 durasi-wrapper" id="durasi-harian">
                            <label class="form-label fw-bold small text-muted">Lama Sewa</label>
                            <div class="input-group">
                                <input type="number" class="form-control border-0 bg-light py-3" value="1" min="1" max="20" placeholder="1">
                                <span class="input-group-text bg-light border-0 text-muted small">Hari</span>
                            </div>
                        </div>

                        <div class="col-7 durasi-wrapper d-none" id="durasi-bulanan">
                            <label class="form-label fw-bold small text-muted">Lama Sewa</label>
                            <div class="input-group">
                                <input type="number" class="form-control border-0 bg-light py-3" value="1" min="1" max="11" placeholder="1">
                                <span class="input-group-text bg-light border-0 text-muted small">Bulan</span>
                            </div>
                        </div>

                        <div class="col-7 durasi-wrapper d-none" id="durasi-tahunan">
                            <label class="form-label fw-bold small text-muted">Lama Sewa</label>
                            <div class="d-flex gap-1">
                                <div class="input-group" style="width: 50%">
                                    <input type="number" class="form-control border-0 bg-light py-3" value="1" min="1" max="5">
                                    <span class="input-group-text bg-light border-0 text-muted small px-1">Thn</span>
                                </div>
                                <div class="input-group" style="width: 50%">
                                    <input type="number" class="form-control border-0 bg-light py-3" value="0" min="0" max="11">
                                    <span class="input-group-text bg-light border-0 text-muted small px-1">Bln</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold rounded shadow-sm">
                        <i class="fas fa-search me-1"></i> Cari
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>