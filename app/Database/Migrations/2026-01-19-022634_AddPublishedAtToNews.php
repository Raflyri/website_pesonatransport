<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPublishedAtToNews extends Migration
{
    public function up()
    {
        $fields = [
            'published_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'slug' // Menempatkan kolom setelah slug
            ],
        ];
        $this->forge->addColumn('news', $fields);

        // Opsional: Set default published_at = created_at untuk data lama
        $this->db->query("UPDATE news SET published_at = created_at WHERE published_at IS NULL");
    }

    public function down()
    {
        $this->forge->dropColumn('news', 'published_at');
    }
}