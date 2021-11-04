<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgama;

class Agama extends BaseController
{
    public function __construct()
    {
        $this->ModelAgama = new ModelAgama();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Agama',
            'agama' => $this->ModelAgama->getAllData(),
        ];
        return view('admin/v_agama', $data);
    }

    public function insertData()
    {
        $data = [
            'agama' => $this->request->getPost('agama'),
        ];
        $this->ModelAgama->insertData($data);
        session()->setFlashdata('tambah', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to('/agama');
    }

    public function editData($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
            'agama' => $this->request->getPost('agama'),
        ];
        $this->ModelAgama->editData($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit !!');
        return redirect()->to('/agama');
    }

    public function deleteData($id_agama)
    {
        $data = [
            'id_agama' => $id_agama,
        ];
        $this->ModelAgama->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete !!');
        return redirect()->to('/agama');
    }
}
