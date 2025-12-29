<?php

namespace App\Controllers;

use App\Models\BannersModel;
use App\Models\FleetModel;
use App\Models\FleetCategoryModel;

class Home extends BaseController
{
    public function index()
    {
        $bannersModel = new BannersModel();
        $fleetModel = new FleetModel();
        $categoryModel = new FleetCategoryModel();

        $data = [
            'title' => 'Home | Pesona Transport',
            'banners' => $bannersModel->where('is_active', 1)
                ->orderBy('display_order', 'ASC')
                ->findAll(),
            'fleets'  => $fleetModel->getFleetsWithCategory(),
            'categories' => $categoryModel->findAll()
        ];

        return view('pages/home', $data);
    }
}
