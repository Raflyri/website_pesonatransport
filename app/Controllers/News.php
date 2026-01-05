<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    // Load helper settings agar tidak error di header/footer
    protected $helpers = ['settings', 'text'];

    public function index()
    {
        $model = new NewsModel();
        
        $data = [
            'title' => 'Berita & Artikel',
            'news'  => $model->orderBy('created_at', 'DESC')->paginate(6), // 6 berita per halaman
            'pager' => $model->pager
        ];

        return view('pages/news', $data);
    }

    public function show($slug = null)
    {
        $model = new NewsModel();
        $news  = $model->where('slug', $slug)->first();

        if (!$news) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $news['title'],
            'news'  => $news
        ];

        return view('pages/news_detail', $data);
    }
}