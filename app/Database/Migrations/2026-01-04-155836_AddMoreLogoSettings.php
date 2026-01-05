<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddMoreLogoSettings extends Migration
{
    public function up()
    {
        // Kita tambahkan key baru untuk logo-logo spesifik
        $data = [
            ['key' => 'site_logo_header', 'value' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'site_logo_footer', 'value' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'site_logo_login',  'value' => '', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('settings')->insertBatch($data);
    }

    public function down()
    {
        // Hapus key jika rollback
        $this->db->table('settings')->whereIn('key', ['site_logo_header', 'site_logo_footer', 'site_logo_login'])->delete();
    }
}