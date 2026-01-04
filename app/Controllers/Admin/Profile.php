<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProfileModel;

class Profile extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    public function index()
    {
        $profile = $this->profileModel->first(); // Ambil data pertama
        
        $data = [
            'title'   => 'Edit Profil Perusahaan',
            'profile' => $profile
        ];

        return view('admin/profile/index', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');
        
        // Aturan Validasi
        $rules = [
            'about_title' => 'required',
            'about_image' => 'is_image[about_image]|max_size[about_image,2048]|mime_in[about_image,image/jpg,image/jpeg,image/png]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'site_name'               => $this->request->getPost('site_name'),
            'about_title'             => $this->request->getPost('about_title'),
            'about_description_short' => $this->request->getPost('about_description_short'),
            'about_description_long'  => $this->request->getPost('about_description_long'),
        ];

        // Handle Upload Gambar
        $fileImage = $this->request->getFile('about_image');
        if ($fileImage && $fileImage->isValid() && !$fileImage->hasMoved()) {
            $newName = $fileImage->getRandomName();
            $fileImage->move('uploads/about/', $newName);
            $data['about_image'] = $newName;
        }

        $this->profileModel->update($id, $data);

        return redirect()->to('/admin/profile')->with('success', 'Profil berhasil diperbarui.');
    }
}