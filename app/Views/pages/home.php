<?= $this->extend('layout/main') ?>

<?= $this->section('styles') ?>
<link rel="stylesheet" href="<?= base_url('css/home.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= $this->include('components/hero') ?>


    <?= $this->include('components/search_box') ?>

    <?= $this->include('components/fleet_list') ?>

    <?= $this->include('components/about') ?>

    <?= $this->include('components/services') ?>

    <?= $this->include('components/news') ?>



<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- 1. LOGIKA SOPIR VS LEPAS KUNCI (YANG SUDAH ADA) ---
        const radioSopir = document.getElementById('layanan_sopir');
        const radioLepasKunci = document.getElementById('layanan_lepaskunci');
        const fieldSopir = document.getElementById('field-sopir');
        const fieldLepasKunci = document.getElementById('field-lepaskunci');

        function toggleLayanan() {
            if (radioSopir.checked) {
                fieldSopir.classList.remove('d-none');
                fieldLepasKunci.classList.add('d-none');
            } else {
                fieldSopir.classList.add('d-none');
                fieldLepasKunci.classList.remove('d-none');
            }
        }

        radioSopir.addEventListener('change', toggleLayanan);
        radioLepasKunci.addEventListener('change', toggleLayanan);

        // --- 2. LOGIKA BARU: PAKET SEWA LEPAS KUNCI ---
        const selectPaket = document.getElementById('select_paket_sewa');
        const durasiHarian = document.getElementById('durasi-harian');
        const durasiBulanan = document.getElementById('durasi-bulanan');
        const durasiTahunan = document.getElementById('durasi-tahunan');

        // Fungsi untuk menyembunyikan semua field durasi dulu
        function hideAllDurasi() {
            durasiHarian.classList.add('d-none');
            durasiBulanan.classList.add('d-none');
            durasiTahunan.classList.add('d-none');
        }

        selectPaket.addEventListener('change', function() {
            hideAllDurasi(); // Reset dulu
            
            // Cek nilai yang dipilih
            if (this.value === 'harian') {
                durasiHarian.classList.remove('d-none');
            } else if (this.value === 'bulanan') {
                durasiBulanan.classList.remove('d-none');
            } else if (this.value === 'tahunan') {
                durasiTahunan.classList.remove('d-none');
            }
        });
    });
</script>
<?= $this->endSection() ?>