<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
        $session = session();
        $model = new UserModel();

        // 1. Ambil inputan user
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        // 2. Cari user berdasarkan username di database
        $data = $model->where('username', $username)->first();

        if ($data) {
            // 3. Verifikasi Password (Hash vs Input)
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);

            if ($verify_pass) {
                // Password Benar! Simpan data sesi
                $ses_data = [
                    'id'         => $data['id'],
                    'username'   => $data['username'],
                    'name'       => $data['name'],
                    'isLoggedIn' => true
                ];
                $session->set($ses_data);
                
                // Update last_login (Opsional, biar keren aja)
                $model->update($data['id'], ['last_login' => date('Y-m-d H:i:s')]);

                return redirect()->to('/admin/dashboard');
            } else {
                // Password Salah
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->to('/login');
            }
        } else {
            // Username tidak ditemukan
            $session->setFlashdata('error', 'Username tidak ditemukan.');
            return redirect()->to('/login');
        }
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}