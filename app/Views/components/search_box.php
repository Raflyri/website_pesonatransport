<div class="container" id="pencarian" style="position: relative; z-index: 20;">
    <div class="search-box-container shadow-lg p-4" data-aos="fade-up" data-aos-delay="200">
        <form action="<?= base_url('search') ?>" method="GET" id="searchForm">

            <div class="d-flex justify-content-center mb-4">
                <div class="btn-group bg-light rounded-pill p-1 shadow-sm" role="group" style="width: 100%; max-width: 400px;">
                    <input type="radio" class="btn-check" name="tipe_layanan" id="layanan_sopir" value="sopir" checked autocomplete="off">
                    <label class="btn btn-sm rounded-pill fw-bold py-2 px-4 transition-btn" for="layanan_sopir">
                        <i class="fas fa-user-tie me-2"></i> Dengan Sopir
                    </label>

                    <input type="radio" class="btn-check" name="tipe_layanan" id="layanan_lepaskunci" value="lepaskunci" autocomplete="off">
                    <label class="btn btn-sm rounded-pill fw-bold py-2 px-4 transition-btn" for="layanan_lepaskunci">
                        <i class="fas fa-key me-2"></i> Lepas Kunci
                    </label>
                </div>
            </div>

            <div class="row g-3 justify-content-center">
                <div class="col-md-3 group-lokasi">
                    <label class="form-label fw-bold small text-muted">Lokasi Penjemputan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-map-marker-alt text-primary"></i></span>
                        <input type="text" id="pickup_input" name="pickup_location" class="form-control border-0 bg-light py-3" placeholder="Ketik kota/lokasi..." required autocomplete="off">
                    </div>
                </div>

                <div class="col-md-3 group-lokasi">
                    <label class="form-label fw-bold small text-muted">Tujuan Perjalanan</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-location-arrow text-danger"></i></span>
                        <input type="text" id="dropoff_input" name="dropoff_location" class="form-control border-0 bg-light py-3" placeholder="Ketik tujuan..." required autocomplete="off">
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">Mulai Sewa</label>
                    <input type="datetime-local" name="start_date" class="form-control border-0 bg-light py-3" required>
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-bold small text-muted">Selesai Sewa</label>
                    <input type="datetime-local" name="end_date" class="form-control border-0 bg-light py-3" required>
                </div>

                <input type="hidden" name="distance_km" id="distance_km" value="0">
                <input type="hidden" name="distance_text" id="distance_text" value="">
                <input type="hidden" name="duration_text" id="duration_text" value="">

                <div class="col-12" id="distance-info" style="display:none;">
                    <div class="alert alert-info py-2 small">
                        <i class="fas fa-route me-1"></i> Estimasi Jarak: <strong id="show_distance">0 km</strong>
                        (<span id="show_duration">0 jam</span>)
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg rounded-pill shadow-sm transition-btn">
                        <i class="fas fa-search me-2"></i> Cari Ketersediaan Unit
                    </button>
                </div>

                <div class="text-center mt-3">
                    <small class="text-muted fst-italic">
                        <i class="fas fa-exclamation-circle text-warning me-1"></i>
                        *Harga yang muncul hanya bersifat <b>estimasi</b>. Hubungi kami untuk detail harga final.
                    </small>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
// Ambil API Key dari Database
$googleMapsKey = get_setting('google_maps_api_key');
?>

<?php if (!empty($googleMapsKey)) : ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=<?= $googleMapsKey ?>&libraries=places"></script>

    <script>
        function initAutocomplete() {
            // Daftar ID input yang akan diberi fitur Autocomplete
            const inputs = [
                'lokasi_jemput',
                'lokasi_tujuan'
            ];

            inputs.forEach(id => {
                const inputElement = document.getElementById(id);
                if (inputElement) {
                    const autocomplete = new google.maps.places.Autocomplete(inputElement, {
                        types: ['geocode'], // Fokus ke alamat/lokasi
                        componentRestrictions: {
                            country: 'id'
                        } // Opsional: Batasi pencarian di Indonesia
                    });

                    // Mencegah form tersubmit saat user menekan Enter di pilihan lokasi
                    inputElement.addEventListener('keydown', function(e) {
                        if (e.key === 'Enter') {
                            e.preventDefault();
                        }
                    });
                }
            });
        }

        // Jalankan initAutocomplete hanya jika script Google berhasil dimuat
        google.maps.event.addDomListener(window, 'load', initAutocomplete);
    </script>
<?php endif; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const radioSopir = document.getElementById('layanan_sopir');
        const radioLepasKunci = document.getElementById('layanan_lepaskunci');
        const groupLokasi = document.querySelectorAll('.group-lokasi');
        const inputLokasi = document.querySelectorAll('.group-lokasi input');

        function toggleLayanan() {
            // Pastikan elemen ada sebelum dimanipulasi untuk menghindari error console
            if (!radioLepasKunci) return;

            if (radioLepasKunci.checked) {
                // Sembunyikan Input Lokasi
                groupLokasi.forEach(el => el.style.display = 'none');
                // Matikan 'required' agar bisa submit tanpa isi lokasi
                inputLokasi.forEach(input => input.removeAttribute('required'));
            } else {
                // Tampilkan Input Lokasi
                groupLokasi.forEach(el => el.style.display = 'block');
                // Nyalakan 'required' kembali
                inputLokasi.forEach(input => input.setAttribute('required', ''));
            }
        }

        // Pasang Event Listener
        if (radioSopir && radioLepasKunci) {
            radioSopir.addEventListener('change', toggleLayanan);
            radioLepasKunci.addEventListener('change', toggleLayanan);

            // Jalankan sekali saat load agar tampilan sesuai state awal
            toggleLayanan();
        }
    });
</script>