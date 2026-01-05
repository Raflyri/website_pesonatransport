<?php
// app/Controllers/Admin/News.php

namespace App\Controllers\Admin;
use CodeIgniter\RESTful\ResourceController;
use App\Models\NewsModel;

class News extends ResourceController
{
    protected $helpers = ['settings', 'form', 'text'];
    protected $modelName = 'App\Models\NewsModel';
    protected $format    = 'json';

    public function index()
    {
        $data['news_list'] = $this->model->orderBy('created_at', 'DESC')->findAll();
        return view('admin/news/index', $data);
    }

    public function new()
    {
        return view('admin/news/create');
    }

    public function create()
    {
        $file = $this->request->getFile('image');
        $imagePath = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/news', $newName);
            $imagePath = 'uploads/news/' . $newName;
        }

        $title = $this->request->getPost('title');
        
        // Buat slug otomatis dari judul
        $slug = url_title($title, '-', true); 

        $data = [
            'title'      => $title,
            'slug'       => $slug,
            'category'   => $this->request->getPost('category'),
            'content'    => $this->request->getPost('content'),
            'image_path' => $imagePath,
        ];

        $this->model->save($data);
        return redirect()->to('admin/news')->with('message', 'Berita berhasil diterbitkan');
    }

    public function edit($id = null)
    {
        $data['news'] = $this->model->find($id);
        return view('admin/news/edit', $data);
    }

    public function update($id = null)
    {
        $title = $this->request->getPost('title');
        $slug = url_title($title, '-', true);

        $data = [
            'id'       => $id,
            'title'    => $title,
            'slug'     => $slug,
            'category' => $this->request->getPost('category'),
            'content'  => $this->request->getPost('content'),
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/news', $newName);
            $data['image_path'] = 'uploads/news/' . $newName;
        }

        $this->model->save($data);
        return redirect()->to('admin/news')->with('message', 'Berita berhasil diperbarui');
    }

    public function delete($id = null)
    {
        // Opsional: Hapus file gambar fisik di sini jika mau
        $this->model->delete($id);
        return redirect()->to('admin/news')->with('message', 'Berita dihapus');
    }
}