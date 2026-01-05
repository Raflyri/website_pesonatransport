<?php

use App\Models\SettingModel;

if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $model = new SettingModel();
        $value = $model->getValue($key);
        return $value ? $value : $default;
    }
}

if (!function_exists('get_whatsapp_url')) {
    /**
     * Generate link WhatsApp otomatis dari database
     * @param string $message Pesan default (opsional)
     * @return string URL WhatsApp lengkap (https://wa.me/...)
     */
    function get_whatsapp_url($message = '')
    {
        // 1. Ambil nomor dari database (Ganti 'contact_wa' sesuai key di tabel settings kamu)
        // Jika tidak ada di DB, gunakan default nomor dummy
        $phone = get_setting('contact_wa', '08123456789'); 

        // 2. Bersihkan karakter aneh (spasi, strip, plus)
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // 3. Ubah 08... menjadi 628...
        if (substr($phone, 0, 1) == '0') {
            $phone = '62' . substr($phone, 1);
        }

        // 4. Generate URL
        $url = 'https://wa.me/' . $phone;
        
        // 5. Tambahkan pesan default jika ada
        if (!empty($message)) {
            $url .= '?text=' . urlencode($message);
        }

        return $url;
    }
}