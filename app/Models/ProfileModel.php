<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table            = 'profile';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['site_name', 'about_title', 'about_description_short', 'about_description_long', 'about_image'];
    protected $useTimestamps    = true;
}
