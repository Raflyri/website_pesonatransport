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
}
