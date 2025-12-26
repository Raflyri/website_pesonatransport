<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Pesona Transport'
        ];
        
        // Panggil view 'home' yang ada di folder 'pages'
        return view('pages/home', $data);
    }
}