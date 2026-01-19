<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table            = 'news';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['title', 'slug', 'content', 'image_path', 'category', 'published_at'];
    protected $useTimestamps    = true;

    public function getLatestNews($limit = 3)
    {
        return $this->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->findAll($limit);
    }

    public function getPublishedNews()
    {
        return $this->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC');
    }
}