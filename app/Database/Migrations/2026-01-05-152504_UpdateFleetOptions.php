<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateFleetOptions extends Migration
{
    public function up()
    {
        // 1. Update kolom Transmission agar support 'Automatic / Manual'
        // Kita gunakan MODIFY untuk mengubah definisi ENUM yang sudah ada
        $this->forge->modifyColumn('fleets', [
            'transmission' => [
                'type'       => 'ENUM',
                'constraint' => ['Automatic', 'Manual', 'Automatic / Manual'],
                'default'    => 'Automatic',
            ]
        ]);

        // 2. Tambah kolom Fuel Type & Rental Service
        $fields = [
            'fuel_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Bensin', 'Diesel', 'Bensin / Diesel', 'Listrik'],
                'default'    => 'Bensin',
                'after'      => 'transmission',
            ],
            'rental_service' => [
                'type'       => 'ENUM',
                'constraint' => ['Dengan Supir', 'Lepas Kunci', 'Keduanya'],
                'default'    => 'Keduanya',
                'after'      => 'fuel_type',
                'comment'    => 'Ketersediaan layanan'
            ],
        ];
        $this->forge->addColumn('fleets', $fields);
    }

    public function down()
    {
        // Kembalikan ke state awal jika rollback
        $this->forge->dropColumn('fleets', ['fuel_type', 'rental_service']);
        
        $this->forge->modifyColumn('fleets', [
            'transmission' => [
                'type'       => 'ENUM',
                'constraint' => ['Manual', 'Automatic'], // Nilai lama dari file SQL kamu
                'default'    => 'Automatic',
            ]
        ]);
    }
}