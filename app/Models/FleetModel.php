<?php

namespace App\Models;

use CodeIgniter\Model;

class FleetModel extends Model
{
    protected $table            = 'fleets';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields = [
        'category_id',
        'name',
        'brand',
        'price_per_day',
        'transmission',
        'fuel_type',
        'rental_service',
        'seat_capacity',
        'image_path',
        'description',
        'is_available'
    ];
    protected $useTimestamps    = true;

    // Helper untuk mengambil nama kategori
    public function getFleetsWithCategory()
    {
        return $this->select('fleets.*, fleet_categories.name as category_name')
            ->join('fleet_categories', 'fleet_categories.id = fleets.category_id', 'left')
            ->findAll();
    }
}
