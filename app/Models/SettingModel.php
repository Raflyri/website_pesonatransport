<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table            = 'settings';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['key', 'value'];
    protected $useTimestamps    = true;

    // Fungsi helper untuk mengambil value berdasarkan key
    public function getValue($key)
    {
        $result = $this->where('key', $key)->first();
        return $result ? $result['value'] : null;
    }
}