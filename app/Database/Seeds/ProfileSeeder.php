<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'site_name'               => 'Pesona Transport',
            'about_title'             => 'Partner Perjalanan Terpercaya Anda',
            'about_description_short' => 'Pesona Transport adalah penyedia layanan sewa mobil premium yang mengutamakan kenyamanan, keamanan, dan kepuasan pelanggan. Kami hadir untuk melengkapi setiap perjalanan Anda.',
            'about_description_long'  => '<p>Didirikan dengan semangat melayani, Pesona Transport telah tumbuh menjadi salah satu penyedia jasa transportasi terkemuka. Kami menyediakan berbagai jenis armada mulai dari city car, MPV, hingga mobil mewah untuk kebutuhan bisnis maupun liburan.</p><p>Misi kami adalah memberikan pengalaman berkendara yang bebas rasa khawatir (worry-free) dengan armada yang selalu terawat dan didukung oleh tim yang profesional.</p>',
            'about_image'             => 'default_about.jpg', // Nanti kita handle uploadnya
            'created_at'              => Time::now(),
            'updated_at'              => Time::now(),
        ];

        // Insert data
        $this->db->table('profile')->insert($data);
    }
}