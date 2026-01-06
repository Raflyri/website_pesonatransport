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

                <div class="col-12 mt-2">
                    <button type="submit" class="btn btn-primary-custom w-100 py-3 fw-bold rounded shadow-sm">
                        <i class="fas fa-search me-1"></i> Cek Ketersediaan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places"></script>

<script>
    function initAutocomplete() {
        // 1. Opsi Restriksi (Hanya Indonesia)
        const options = {
            componentRestrictions: {
                country: "id"
            },
            fields: ["formatted_address", "geometry", "name"],
        };

        // 2. Pasang Autocomplete ke Input
        const pickupInput = document.getElementById("pickup_input");
        const dropoffInput = document.getElementById("dropoff_input");

        const pickupAutocomplete = new google.maps.places.Autocomplete(pickupInput, options);
        const dropoffAutocomplete = new google.maps.places.Autocomplete(dropoffInput, options);

        // 3. Listener saat lokasi dipilih
        pickupAutocomplete.addListener("place_changed", calcRoute);
        dropoffAutocomplete.addListener("place_changed", calcRoute);
    }

    function calcRoute() {
        const origin = document.getElementById("pickup_input").value;
        const destination = document.getElementById("dropoff_input").value;

        if (origin && destination) {
            const service = new google.maps.DistanceMatrixService();

            service.getDistanceMatrix({
                    origins: [origin],
                    destinations: [destination],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                },
                (response, status) => {
                    if (status !== "OK") {
                        alert("Error was: " + status);
                    } else {
                        const results = response.rows[0].elements[0];
                        if (results.status === "OK") {
                            // Ambil data jarak
                            const distanceText = results.distance.text; // "150 km"
                            const distanceVal = results.distance.value / 1000; // 150000 meter -> 150 km
                            const durationText = results.duration.text;

                            // Update UI
                            document.getElementById("distance-info").style.display = 'block';
                            document.getElementById("show_distance").innerText = distanceText;
                            document.getElementById("show_duration").innerText = durationText;

                            // Isi Input Hidden (untuk dikirim ke Backend)
                            document.getElementById("distance_km").value = distanceVal.toFixed(1);
                            document.getElementById("distance_text").value = distanceText;
                            document.getElementById("duration_text").value = durationText;
                        }
                    }
                }
            );
        }
    }

    // Jalankan script
    google.maps.event.addDomListener(window, 'load', initAutocomplete);

    document.addEventListener("DOMContentLoaded", function() {
        const radioSopir = document.getElementById('layanan_sopir');
        const radioLepasKunci = document.getElementById('layanan_lepaskunci');
        const groupLokasi = document.querySelectorAll('.group-lokasi');
        const inputLokasi = document.querySelectorAll('.group-lokasi input');

        function toggleLayanan() {
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
            toggleLayanan(); // Jalankan sekali saat load
        }
    });
</script>