<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    
    // Kolom yang boleh diisi/diubah oleh aplikasi
    protected $allowedFields    = ['username', 'password', 'name', 'last_login'];

    // Dates
    protected $useTimestamps = false; // Karena di SQL kamu pakai created_at manual
}