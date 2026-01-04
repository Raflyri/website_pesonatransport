<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Settings extends BaseController
{
    protected $settingModel;

    public function __construct()
    {
        $this->settingModel = new SettingModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Pengaturan Website',
            'site_name'        => get_setting('site_name'),
            'site_icon'        => get_setting('site_icon'),
            'site_logo_header' => get_setting('site_logo_header'),
            'site_logo_footer' => get_setting('site_logo_footer'),
            'site_logo_login'  => get_setting('site_logo_login'),
        ];
        return view('admin/settings/index', $data);
    }

    public function update()
    {
        // 1. Update Nama Website
        $siteName = $this->request->getPost('site_name');
        $this->settingModel->where('key', 'site_name')->set(['value' => $siteName])->update();

        // 2. Proses Upload 4 Jenis Gambar
        $this->handleUpload('site_icon');        // Favicon
        $this->handleUpload('site_logo_header'); // Header
        $this->handleUpload('site_logo_footer'); // Footer
        $this->handleUpload('site_logo_login');  // Login

        return redirect()->to('/admin/settings')->with('message', 'Pengaturan & Logo berhasil diperbarui');
    }

    // Fungsi Private untuk Handle Upload Berulang
    private function handleUpload($fieldKey)
    {
        $file = $this->request->getFile($fieldKey);

        if ($file && $file->isValid() && !$file->hasMoved()) {
            // Generate nama unik
            $newName = $file->getRandomName();
            // Pindahkan ke folder uploads/settings
            $file->move('uploads/settings/', $newName);

            // Update database sesuai key yang dikirim
            $this->settingModel->where('key', $fieldKey)
                ->set(['value' => 'uploads/settings/' . $newName])
                ->update();
        }
    }
}
