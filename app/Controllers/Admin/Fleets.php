<?php
namespace App\Controllers\Admin;
use CodeIgniter\RESTful\ResourceController;
use App\Models\FleetModel;
use App\Models\FleetCategoryModel;

class Fleets extends ResourceController
{
    protected $helpers = ['settings', 'form', 'text'];
    protected $fleetModel;
    protected $categoryModel;

    public function __construct()
    {
        $this->fleetModel = new FleetModel();
        $this->categoryModel = new FleetCategoryModel();
    }

    public function index()
    {
        $data['fleets'] = $this->fleetModel->getFleetsWithCategory();
        return view('admin/fleets/index', $data);
    }

    public function new()
    {
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/fleets/create', $data);
    }

    public function create()
    {
        $file = $this->request->getFile('image');
        $imagePath = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/fleets', $newName);
            $imagePath = 'uploads/fleets/' . $newName;
        }

        $data = [
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'brand'       => $this->request->getPost('brand'),
            'price_per_day' => $this->request->getPost('price_per_day'),
            'transmission' => $this->request->getPost('transmission'),
            'seat_capacity' => $this->request->getPost('seat_capacity'),
            'image_path'  => $imagePath,
            'description' => $this->request->getPost('description'),
            'is_available' => $this->request->getPost('is_available') ? 1 : 0,
        ];

        $this->fleetModel->save($data);
        return redirect()->to('admin/fleets')->with('message', 'Armada berhasil ditambahkan');
    }

    public function edit($id = null)
    {
        $data['fleet'] = $this->fleetModel->find($id);
        $data['categories'] = $this->categoryModel->findAll();
        return view('admin/fleets/edit', $data);
    }

    public function update($id = null)
    {
        $data = [
            'id' => $id,
            'category_id' => $this->request->getPost('category_id'),
            'name'        => $this->request->getPost('name'),
            'brand'       => $this->request->getPost('brand'),
            'price_per_day' => $this->request->getPost('price_per_day'),
            'transmission' => $this->request->getPost('transmission'),
            'seat_capacity' => $this->request->getPost('seat_capacity'),
            'description' => $this->request->getPost('description'),
            'is_available' => $this->request->getPost('is_available') ? 1 : 0,
        ];

        // Cek jika ada upload gambar baru
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/fleets', $newName);
            $data['image_path'] = 'uploads/fleets/' . $newName;
        }

        $this->fleetModel->save($data);
        return redirect()->to('admin/fleets')->with('message', 'Armada berhasil diupdate');
    }

    public function delete($id = null)
    {
        $this->fleetModel->delete($id);
        return redirect()->to('admin/fleets')->with('message', 'Armada dihapus');
    }
}