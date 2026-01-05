<?php

namespace App\Controllers;

use App\Models\BannersModel;
use App\Models\FleetModel;
use App\Models\FleetCategoryModel;
use App\Models\ProfileModel;

class Home extends BaseController
{
    public function index()
    {
        $bannersModel = new BannersModel();
        $fleetModel = new FleetModel();
        $categoryModel = new FleetCategoryModel();
        $profileModel = new ProfileModel();

        $data = [
            'title' => 'Home | Pesona Transport',
            'banners' => $bannersModel->where('is_active', 1)
                ->orderBy('display_order', 'ASC')
                ->findAll(),
            'fleets'  => $fleetModel->getFleetsWithCategory(),
            'categories' => $categoryModel->findAll(),
            'profile'    => $profileModel->first(),
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

    // Tambahkan method ini di dalam class Home
    public function armada()
    {
        $bannersModel = new BannersModel(); // Opsional jika ingin pakai banner di halaman armada
        $fleetModel = new FleetModel();
        $categoryModel = new FleetCategoryModel();
        $profileModel = new ProfileModel();

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
}
