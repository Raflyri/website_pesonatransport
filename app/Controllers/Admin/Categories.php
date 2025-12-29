<?php
namespace App\Controllers\Admin;
use CodeIgniter\RESTful\ResourceController;
use App\Models\FleetCategoryModel;

class Categories extends ResourceController
{
    protected $modelName = FleetCategoryModel::class;

    public function index()
    {
        $data['categories'] = $this->model->findAll();
        return view('admin/categories/index', $data);
    }

    public function new()
    {
        return view('admin/categories/create');
    }

    public function create()
    {
        $data = [
            'name' => $this->request->getPost('name'),
            'slug' => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
        ];
        if ($this->model->save($data)) {
            return redirect()->to('admin/categories')->with('message', 'Kategori berhasil dibuat');
        }
        return redirect()->back()->withInput()->with('errors', $this->model->errors());
    }

    public function edit($id = null)
    {
        $data['category'] = $this->model->find($id);
        if (!$data['category']) return redirect()->to('admin/categories');
        return view('admin/categories/edit', $data);
    }

    public function update($id = null)
    {
        $data = [
            'id' => $id,
            'name' => $this->request->getPost('name'),
            'slug' => url_title($this->request->getPost('name'), '-', true),
            'description' => $this->request->getPost('description'),
        ];
        $this->model->save($data);
        return redirect()->to('admin/categories')->with('message', 'Kategori berhasil diupdate');
    }

    public function delete($id = null)
    {
        $this->model->delete($id);
        return redirect()->to('admin/categories')->with('message', 'Kategori dihapus');
    }
}