<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddComingSoonVideoSetting extends Migration
{
    public function up()
    {
        // Masukkan key kosong untuk video agar bisa di-update oleh Controller nanti
        $data = [
            [
                'key'        => 'coming_soon_video', // Pastikan nama kolom ini sesuai ('key' atau 'key_name')
                'value'      => '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Batch insert (aman jika ada data lain nanti)
        $this->db->table('settings')->insertBatch($data);
    }

    public function down()
    {
        // Hapus data jika rollback
        $this->db->table('settings')->where('key', 'coming_soon_video')->delete();
    }
}