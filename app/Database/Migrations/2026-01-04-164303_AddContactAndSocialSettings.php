<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddContactAndSocialSettings extends Migration
{
    public function up()
    {
        $data = [
            // Deskripsi Singkat
            ['key' => 'site_desc_footer', 'value' => 'Penyedia jasa sewa mobil terpercaya di Jabodetabek.', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Kontak Kantor
            ['key' => 'company_address', 'value' => "The Archies Sudirman (D/H T Plaza),\nTower B, Ruko B No.B4.\nJl. Penjernihan I No.1 Kav.1,\nJakarta Pusat 10210", 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'company_phone',   'value' => '(021) 7788-9900', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'company_email',   'value' => 'info@pesonatransport.com', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            
            // Social Media (Link)
            ['key' => 'social_facebook', 'value' => 'https://facebook.com', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'social_instagram','value' => 'https://instagram.com', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ['key' => 'social_whatsapp', 'value' => 'https://wa.me/62812345678', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('settings')->insertBatch($data);
    }

    public function down()
    {
        $keys = ['site_desc_footer', 'company_address', 'company_phone', 'company_email', 'social_facebook', 'social_instagram', 'social_whatsapp'];
        $this->db->table('settings')->whereIn('key', $keys)->delete();
    }
}