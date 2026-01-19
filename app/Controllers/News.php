<?php

namespace App\Controllers;

use App\Models\NewsModel;

class News extends BaseController
{
    protected $helpers = ['settings', 'text'];

    public function index()
    {
        $model = new NewsModel();

        $data = [
            'title' => 'Berita & Artikel',
            'news'  => $model->getPublishedNews()->paginate(6),
            'pager' => $model->pager
        ];

        return view('pages/news', $data);
    }

    public function detail($slug = null)
    {
        $newsModel = new NewsModel();

        // 1. Cek Session: Apakah yang akses adalah Admin?
        // Pastikan key session 'isLoggedIn' sesuai dengan Auth Controller kakak (biasanya 'logged_in' atau 'isLoggedIn')
        $isAdmin = session()->get('isLoggedIn');

        // 2. Siapkan Query
        $query = $newsModel->where('slug', $slug);

        // 3. Terapkan Filter Tanggal HANYA jika BUKAN Admin
        if (!$isAdmin) {
            $query->where('published_at <=', date('Y-m-d H:i:s'));
        }

        $newsItem = $query->first();

        // Jika tidak ketemu (atau user biasa coba akses future post) -> 404
        if (!$newsItem) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Ambil sidebar (tetap difilter tanggal agar pengunjung tidak lihat bocoran di sidebar)
        // Kecuali Kakak mau Admin lihat sidebar future post juga, logic-nya bisa disamakan.
        $sidebarNews = $newsModel->where('slug !=', $slug)
            ->where('published_at <=', date('Y-m-d H:i:s'))
            ->orderBy('published_at', 'DESC')
            ->findAll(3);

        $data = [
            'title'        => $newsItem['title'],
            'news_item'    => $newsItem,
            'sidebar_news' => $sidebarNews
        ];

        return view('pages/news_detail', $data);
    }
}
