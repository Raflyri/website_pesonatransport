<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSearchVideoSetting extends Migration
{
    public function up()
    {
        $data = [
            [
                'key'        => 'search_header_video',
                'value'      => '', // Kosongkan defaultnya
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];
        $this->db->table('settings')->insertBatch($data);
    }

    public function down()
    {
        $this->db->table('settings')->where('key', 'search_header_video')->delete();
    }
}