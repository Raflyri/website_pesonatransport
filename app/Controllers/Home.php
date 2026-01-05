<?php

namespace App\Controllers;

use App\Models\BannersModel;
use App\Models\FleetModel;
use App\Models\FleetCategoryModel;
use App\Models\ProfileModel;
use App\Models\NewsModel;

class Home extends BaseController
{
    protected $helpers = ['text', 'settings'];

    public function index()
    {
        $bannersModel = new BannersModel();
        $fleetModel = new FleetModel();
        $categoryModel = new FleetCategoryModel();
        $profileModel = new ProfileModel();
        $newsModel = new NewsModel();

        $data = [
            'title' => 'Home | Pesona Transport',
            'banners' => $bannersModel->where('is_active', 1)
                ->orderBy('display_order', 'ASC')
                ->findAll(),
            'fleets'  => $fleetModel->getFleetsWithCategory(),
            'categories' => $categoryModel->findAll(),
            'profile'    => $profileModel->first(),
            'latest_news' => $newsModel->getLatestNews(3)
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $profileModel = new ProfileModel();

        $data = [
            'title'   => 'Tentang Kami - Pesona Transport',
            'profile' => $profileModel->first(),
        ];

        return view('pages/about', $data);
    }

    public function armada()
    {
        $bannersModel = new BannersModel(); // Opsional jika ingin pakai banner di halaman armada
        $fleetModel = new FleetModel();
        $categoryModel = new FleetCategoryModel();
        $profileModel = new ProfileModel();

        //$fleetsData = $fleetModel->where('is_available', 1)->getFleetsWithCategory();

        //dd($fleetsData);

        $data = [
            'title'      => 'Armada Kami | Pesona Transport',
            // Mengambil semua kategori untuk dijadikan Tab/Filter
            'categories' => $categoryModel->findAll(),
            // Mengambil semua armada yang available (is_available = 1)
            'fleets'     => $fleetModel->where('is_available', 1)->getFleetsWithCategory(),
            'profile'    => $profileModel->first(),
        ];

        return view('pages/armada', $data);
    }

    public function news()
    {
        $newsModel = new NewsModel();

        $data = [
            'title' => 'Berita & Artikel',
            // Ambil berita terbaru, 6 per halaman
            'news'  => $newsModel->orderBy('created_at', 'DESC')->paginate(6),
            'pager' => $newsModel->pager
        ];

        return view('pages/news', $data);
    }

    public function news_detail($slug = null)
    {
        $newsModel = new NewsModel();
        $newsItem  = $newsModel->where('slug', $slug)->first();

        if (!$newsItem) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'title' => $newsItem['title'],
            'news'  => $newsItem
        ];

        return view('pages/news_detail', $data);
    }

    // Tambahkan method ini di dalam class Home
    public function coming_soon()
    {
        $profileModel = new ProfileModel(); // Supaya header/footer tetap aman datanya

        $data = [
            'title'   => 'Segera Hadir - Pesona Transport',
            'profile' => $profileModel->first(),
        ];

        return view('pages/coming_soon', $data);
    }
}
