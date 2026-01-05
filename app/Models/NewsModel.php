<?php

namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['title', 'slug', 'content', 'image_path', 'category'];
    protected $useTimestamps    = true;

    // Helper untuk mengambil 3 berita terbaru untuk Homepage
    public function getLatestNews($limit = 3)
    {
        return $this->orderBy('created_at', 'DESC')
                    ->findAll($limit);
    }
}