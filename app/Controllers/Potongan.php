<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPotongan;
use App\Models\ModelJalurMasuk;

class Potongan extends BaseController
{
    public function __construct()
    {
        $this->ModelPotongan = new ModelPotongan();
        $this->ModelJalurMasuk = new ModelJalurMasuk();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Potongan',
            'potongan' => $this->ModelPotongan->getAllData(),
            'jalur' => $this->ModelJalurMasuk->getAllData(),
        ];
        return view('admin/v_Potongan', $data);
    }
    public function insertData()
    {
        $data = [
            'potongan' => $this->request->getPost('potongan'),
            'type' => $this->request->getPost('type'),
            'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
        ];
        $this->ModelPotongan->insertData($data);
        session()->setFlashdata('tambah', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to('/potongan');
    }

    public function editData($id_potongan)
    {
        $data = [
            'id' => $id_potongan,
            'potongan' => $this->request->getPost('potongan'),
            'type' => $this->request->getPost('type'),
            'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
        ];
        $this->ModelPotongan->editData($data);
        session()->setFlashdata('edit', 'Data Berhasil Di Edit !!');
        return redirect()->to('/potongan');
    }

    public function deleteData($id_potongan)
    {
        $data = [
            'id' => $id_potongan,
        ];
        $this->ModelPotongan->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete !!');
        return redirect()->to('/potongan');
    }
}
