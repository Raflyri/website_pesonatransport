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

        /**
         * $data = [
         * 'title' => $news['title'],
         * 'news'  => $news
         * ];
         */

        $data = [
            'title' => $news['title'],
            'news_item' => $news, // <--- UBAH JADI 'news_item' (Biar match sama View)
            // Tambahkan juga ini jika ingin sidebar berfungsi:
            'sidebar_news' => $model->where('slug !=', $slug)->orderBy('created_at', 'DESC')->findAll(3) 
        ];

        return view('pages/news_detail', $data);
    }

    public function detail($slug = null)
    {
        $newsModel = new \App\Models\NewsModel();

        // Cari berita berdasarkan slug
        $data['news_item'] = $newsModel->where('slug', $slug)->first();

        // Jika tidak ketemu, lempar error 404
        if (empty($data['news_item'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Berita dengan judul: ' . $slug . ' tidak ditemukan.');
        }

        // Ambil berita terbaru LAINNYA untuk sidebar (optional, biar menarik)
        $data['sidebar_news'] = $newsModel->where('slug !=', $slug)
            ->orderBy('created_at', 'DESC')
            ->findAll(3);

        $data['title'] = $data['news_item']['title'];

        return view('pages/news_detail', $data);
    }
}
