<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKuisioner;

class Kuisioner extends BaseController
{
    public function __construct()
    {
        $this->ModelKuisioner = new ModelKuisioner();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Kuisioner',
            'kuisioner' => $this->ModelKuisioner->getAllData(),
        ];
        return view('admin/v_kuisioner', $data);
    }
    public function insertData()
    {
        $data = [
            'kuisioner' => $this->request->getPost('kuisioner'),
        ];
        $this->ModelKuisioner->insertData($data);
        session()->setFlashdata('tambah', 'Kuisioner Berhasil Di Tambahkan !!');
        return redirect()->to('/kuisioner');
    }

    public function editData($id_kuisioner)
    {
        $data = [
            'id_kuisioner' => $id_kuisioner,
            'kuisioner' => $this->request->getPost('kuisioner'),
        ];
        $this->ModelKuisioner->editData($data);
        session()->setFlashdata('edit', 'Kuisioner Berhasil Di Edit !!');
        return redirect()->to('/kuisioner');
    }

    public function deleteData($id_kuisioner)
    {
        $data = [
            'id_kuisioner' => $id_kuisioner,
        ];
        $this->ModelKuisioner->deleteData($data);
        session()->setFlashdata('delete', 'Kuisioner Berhasil Di Delete !!');
        return redirect()->to('/kuisioner');
    }
}
