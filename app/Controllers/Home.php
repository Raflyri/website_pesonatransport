<?php

namespace App\Controllers;

use App\Models\BannersModel;

class Home extends BaseController
{
    public function index()
    {
        $bannersModel = new BannersModel();

        $data = [
            'title' => 'Home | Pesona Transport',
            'banners' => $bannersModel->where('is_active', 1)
                                      ->orderBy('display_order', 'ASC')
                                      ->findAll()
        ];
        
        return view('pages/home', $data);
    }
}