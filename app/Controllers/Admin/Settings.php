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

            // DATA BARU (Footer & Kontak)
            'site_desc_footer' => get_setting('site_desc_footer'),
            'company_address'  => get_setting('company_address'),
            'company_phone'    => get_setting('company_phone'),
            'company_email'    => get_setting('company_email'),
            'social_facebook'  => get_setting('social_facebook'),
            'social_instagram' => get_setting('social_instagram'),
            'social_whatsapp'  => get_setting('social_whatsapp'),
        ];
        return view('admin/settings/index', $data);
    }

    public function update()
    {
        // 1. Update Data Text (Nama, Desc, Kontak, Sosmed)
        $textFields = [
            'site_name', 'site_desc_footer', 
            'company_address', 'company_phone', 'company_email',
            'social_facebook', 'social_instagram', 'social_whatsapp'
        ];

        foreach ($textFields as $key) {
            $val = $this->request->getPost($key);
            $this->settingModel->where('key', $key)->set(['value' => $val])->update();
        }

        // 2. Update File Images (Panggil fungsi handleUpload yg sudah kita buat sebelumnya)
        $this->handleUpload('site_icon');       
        $this->handleUpload('site_logo_header');
        $this->handleUpload('site_logo_footer');
        $this->handleUpload('site_logo_login'); 

        return redirect()->to('/admin/settings')->with('message', 'Pengaturan berhasil diperbarui');
    }

    private function handleUpload($fieldKey)
    {
        $file = $this->request->getFile($fieldKey);

        // Pastikan ada file yang diupload dan valid
        if ($file && $file->isValid() && !$file->hasMoved()) {
            
            // 1. AMBIL DATA LAMA DARI DATABASE
            // Kita perlu tahu path file lama sebelum ditimpa
            $oldFile = $this->settingModel->getValue($fieldKey);

            // 2. CEK & HAPUS FILE LAMA (GARBAGE COLLECTION)
            // Syarat hapus: 
            // - Datanya ada
            // - Filenya beneran ada di server (file_exists)
            // - PENTING: Hanya hapus jika file ada di folder 'uploads/'. 
            //   Jangan sampai kita menghapus file bawaan/default system (seperti folder admin_assets).
            if (!empty($oldFile) && strpos($oldFile, 'uploads/') === 0 && file_exists(FCPATH . $oldFile)) {
                unlink(FCPATH . $oldFile); // HAPUS file lama
            }

            // 3. PROSES UPLOAD FILE BARU
            $newName = $file->getRandomName();
            $file->move('uploads/settings/', $newName);
            
            // 4. UPDATE DATABASE DENGAN PATH BARU
            $this->settingModel->where('key', $fieldKey)
                               ->set(['value' => 'uploads/settings/' . $newName])
                               ->update();
        }
    }
}
