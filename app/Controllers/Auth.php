<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function login()
    {
        // Pengecekan: Kalau sudah login, lempar langsung ke admin
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin/dashboard');
        }

        $data = [
            'title' => 'Login System'
        ];
        
        // Ini memanggil view login.php yang kamu buat sebelumnya
        return view('auth/login', $data);
    }

    public function attempt()
    {
        // 1. Ambil inputan dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // 2. LOGIC LOGIN SEMENTARA (Hardcode dulu buat tes)
        // Nanti kita ganti pakai Database beneran
        if ($username == 'admin' && $password == 'admin123') {
            
            // Set Session
            $sessionData = [
                'username'   => 'admin',
                'name'       => 'Super Admin',
                'isLoggedIn' => true,
            ];
            session()->set($sessionData);

            // Berhasil login, masuk ke dashboard
            return redirect()->to('/admin/dashboard');
        } else {
            // Gagal login, balik ke halaman login + bawa pesan error
            session()->setFlashdata('error', 'Username atau Password salah!');
            return redirect()->to('/login');
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}