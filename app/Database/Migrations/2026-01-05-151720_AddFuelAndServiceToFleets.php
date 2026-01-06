<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFuelAndServiceToFleets extends Migration
{
    public function up()
    {
        $fields = [
            'fuel_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Bensin', 'Diesel', 'Listrik'],
                'default'    => 'Bensin',
                'after'      => 'transmission',
            ],
            'rental_service' => [
                'type'       => 'ENUM',
                'constraint' => ['Dengan Supir', 'Lepas Kunci', 'Keduanya'],
                'default'    => 'Keduanya',
                'after'      => 'fuel_type',
                'comment'    => 'Opsi ketersediaan layanan mobil'
            ],
        ];
        $this->forge->addColumn('fleets', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('fleets', ['fuel_type', 'rental_service']);
    }
}