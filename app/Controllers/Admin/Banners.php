<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BannersModel;

class Banners extends BaseController
{
    protected $bannersModel;

    public function __construct()
    {
        $this->bannersModel = new BannersModel();
    }

    // 1. READ (Halaman List Banner)
    public function index()
    {
        $data = [
            'title'   => 'Manajemen Banner',
            'banners' => $this->bannersModel->findAll()
        ];
        return view('admin/banners/index', $data);
    }

    // 2. CREATE (Halaman Form Tambah)
    public function new()
    {
        $data = ['title' => 'Tambah Banner Baru'];
        return view('admin/banners/create', $data);
    }

    // 3. STORE (Proses Simpan ke Database)
    public function create()
    {
        // Validasi input
        if (!$this->validate([
            'image' => [
                'rules' => 'uploaded[image]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]|max_size[image,2048]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'is_image' => 'File yang dipilih bukan gambar',
                    'mime_in'  => 'File yang dipilih bukan gambar',
                    'max_size' => 'Ukuran gambar terlalu besar (Maks 2MB)'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil file gambar
        $fileImage = $this->request->getFile('image');
        // Generate nama random
        $namaImage = $fileImage->getRandomName();
        // Pindahkan ke folder public/uploads/banners
        $fileImage->move('uploads/banners', $namaImage);

        // Simpan data
        $this->bannersModel->save([
            'title'         => $this->request->getVar('title'),
            'subtitle'      => $this->request->getVar('subtitle'),
            'image_path'    => $namaImage,
            'link_url'      => $this->request->getVar('link_url'),
            'display_order' => $this->request->getVar('display_order'),
            'is_active'     => $this->request->getVar('is_active') ? 1 : 0
        ]);

        return redirect()->to('/admin/banners')->with('success', 'Banner berhasil ditambahkan');
    }

    // 4. EDIT (Halaman Form Edit)
    public function edit($id = null)
    {
        $banner = $this->bannersModel->find($id);
        if (!$banner) {
            return redirect()->to('/admin/banners')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'title'  => 'Edit Banner',
            'banner' => $banner
        ];
        return view('admin/banners/edit', $data);
    }

    // 5. UPDATE (Proses Update ke Database)
    public function update($id = null)
    {
        $bannerLama = $this->bannersModel->find($id);
        
        // Cek user upload gambar baru gak?
        $fileImage = $this->request->getFile('image');
        
        if ($fileImage->getError() == 4) {
            // Kalau nggak upload, pakai nama lama
            $namaImage = $bannerLama['image_path'];
        } else {
            // Kalau upload baru, generate nama
            $namaImage = $fileImage->getRandomName();
            // Pindahkan file
            $fileImage->move('uploads/banners', $namaImage);
            // Hapus file lama jika ada
            if ($bannerLama['image_path'] && file_exists('uploads/banners/' . $bannerLama['image_path'])) {
                unlink('uploads/banners/' . $bannerLama['image_path']);
            }
        }

        $this->bannersModel->update($id, [
            'title'         => $this->request->getVar('title'),
            'subtitle'      => $this->request->getVar('subtitle'),
            'image_path'    => $namaImage,
            'link_url'      => $this->request->getVar('link_url'),
            'display_order' => $this->request->getVar('display_order'),
            'is_active'     => $this->request->getVar('is_active') ? 1 : 0
        ]);

        return redirect()->to('/admin/banners')->with('success', 'Banner berhasil diupdate');
    }

    // 6. DELETE (Hapus Data)
    public function delete($id = null)
    {
        $banner = $this->bannersModel->find($id);
        
        // Hapus gambar di folder
        if ($banner['image_path'] && file_exists('uploads/banners/' . $banner['image_path'])) {
            unlink('uploads/banners/' . $banner['image_path']);
        }

        $this->bannersModel->delete($id);
        return redirect()->to('/admin/banners')->with('success', 'Banner berhasil dihapus');
    }
}