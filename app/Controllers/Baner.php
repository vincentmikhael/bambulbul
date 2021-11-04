<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBaner;

class Baner extends BaseController
{
    public function __construct()
    {
        $this->ModelBaner = new ModelBaner();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Baner',
            'baner' => $this->ModelBaner->getAllData(),
        ];
        return view('admin/v_baner', $data);
    }

    public function insertData()
    {
        $file = $this->request->getFile('baner');
        $nama_file = $file->getRandomName();
        $data = [
            'ket' => $this->request->getPost('ket'),
            'baner' => $nama_file,
        ];
        //Upload File Foto
        $file->move('assets/', $nama_file);
        $this->ModelBaner->insertData($data);

        session()->setFlashdata('tambah', 'Data Berhasil Di Tambahkan !!');
        return redirect()->to('/baner');
    }

    public function editData($id_baner)
    {
        $file = $this->request->getFile('baner');
        // jika baner/gambar tidak diganti
        if ($file->getError() == 4) {
            $data = [
                'id_baner' => $id_baner,
                'ket' => $this->request->getPost('ket'),
            ];
            $this->ModelBaner->editData($data);
        } else {
            // jika baner/gambar diganti
            $baner = $this->ModelBaner->detailBaner($id_baner);
            if ($baner['baner'] != "") {
                unlink('./assets/' . $baner['baner']);
            }
            $nama_file = $file->getRandomName();
            $data = [
                'id_baner' => $id_baner,
                'ket' => $this->request->getPost('ket'),
                'baner' => $nama_file
            ];
            //Upload File Foto
            $file->move('assets/', $nama_file);
            $this->ModelBaner->editData($data);
        }
        session()->setFlashdata('edit', 'Data Berhasil Di Ubah !!');
        return redirect()->to('/baner');
    }

    public function deleteData($id_baner)
    {
        $baner = $this->ModelBaner->detailBaner($id_baner);
        if ($baner['baner'] != "") {
            unlink('./assets/' . $baner['baner']);
        }

        $data = [
            'id_baner' => $id_baner,
        ];
        $this->ModelBaner->deleteData($data);
        session()->setFlashdata('delete', 'Data Berhasil Di Delete !!');
        return redirect()->to('/baner');
    }
}
