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
            'coming_soon_video' => get_setting('coming_soon_video'),
            'site_desc_footer' => get_setting('site_desc_footer'),
            'company_address'  => get_setting('company_address'),
            'company_phone'    => get_setting('company_phone'),
            'company_email'    => get_setting('company_email'),
            'social_facebook'  => get_setting('social_facebook'),
            'social_instagram' => get_setting('social_instagram'),
            'social_whatsapp'  => get_setting('social_whatsapp'),
            'google_tag_id'    => get_setting('google_tag_id'),
            'google_maps_api_key' => get_setting('google_maps_api_key'),
        ];
        return view('admin/settings/index', $data);
    }

    public function update()
    {

        $model = new SettingModel();
        $fileIcon = $this->request->getFile('site_icon');

        $textFields = [
            'site_name',
            'site_desc_footer',
            'company_address',
            'company_phone',
            'company_email',
            'social_facebook',
            'social_instagram',
            'social_whatsapp',
            'google_tag_id',
            'google_maps_api_key'
        ];

        foreach ($textFields as $key) {
            $val = $this->request->getPost($key);
            $this->settingModel->where('key', $key)->set(['value' => $val])->update();
        }

        $this->handleUpload('site_icon');
        $this->handleUpload('site_logo_header');
        $this->handleUpload('site_logo_footer');
        $this->handleUpload('site_logo_login');
        $this->handleVideoUpload('coming_soon_video');
        $this->handleVideoUpload('search_header_video');

        if ($fileIcon && $fileIcon->isValid() && !$fileIcon->hasMoved()) {
            $validationRule = [
                'site_icon' => [
                    'label' => 'Favicon',
                    'rules' => 'uploaded[site_icon]|is_image[site_icon]|max_size[site_icon,1024]|mime_in[site_icon,image/jpg,image/jpeg,image/png,image/x-icon]',
                ],
            ];

            if (!$this->validate($validationRule)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            $newName = 'favicon_' . time() . '.' . $fileIcon->getExtension();
            $fileIcon->move('images', $newName);

            $this->settingModel->save(['key' => 'site_icon', 'value' => 'images/' . $newName]);
        }

        return redirect()->to('/admin/settings')->with('message', 'Pengaturan berhasil diperbarui');
    }

    private function handleUpload($fieldKey)
    {
        $file = $this->request->getFile($fieldKey);

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if (strpos($file->getMimeType(), 'image') === false) {
                return;
            }

            $oldFile = $this->settingModel->getValue($fieldKey);

            if (!empty($oldFile) && strpos($oldFile, 'uploads/') === 0 && file_exists(FCPATH . $oldFile)) {
                unlink(FCPATH . $oldFile);
            }

            $newName = $file->getRandomName();
            $file->move('uploads/settings/', $newName);

            $this->settingModel->where('key', $fieldKey)
                ->set(['value' => 'uploads/settings/' . $newName])
                ->update();
        }
    }

    // Fungsi Upload Video (BARU)
    private function handleVideoUpload($fieldKey)
    {
        $file = $this->request->getFile($fieldKey);

        if ($file && $file->isValid() && !$file->hasMoved()) {

            // Validasi: Pastikan ini VIDEO (mp4, webm, dll)
            $mime = $file->getMimeType();
            if (strpos($mime, 'video') === false) {
                return; // Skip jika bukan video
            }

            // Hapus video lama agar server tidak penuh
            $oldFile = $this->settingModel->getValue($fieldKey);
            if (!empty($oldFile) && strpos($oldFile, 'uploads/') === 0 && file_exists(FCPATH . $oldFile)) {
                unlink(FCPATH . $oldFile);
            }

            $newName = $file->getRandomName();
            $file->move('uploads/settings/', $newName);

            $this->settingModel->where('key', $fieldKey)
                ->set(['value' => 'uploads/settings/' . $newName])
                ->update();
        }
    }
}
