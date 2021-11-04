<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Petunjuk extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }
    public function petunjuk()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Petunjuk Pendaftaran',
            'petunjuk' => $this->ModelAdmin->detailSetting(),
        ];
        return view('v_petunjuk-pendaftaran', $data);
    }

    public function petunjukDaftar()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Petunjuk Pendaftaran',
            'petunjuk' => $this->ModelAdmin->detailSetting(),
        ];
        return view('admin/v_petunjuk', $data);
    }

    public function savePetunjuk()
    {
        $data = [
            'petunjuk' => $this->request->getPost('petunjuk'),
        ];
        $this->ModelAdmin->saveSetting($data);
        session()->setFlashdata('pesan', 'Beranda Berhasil Di Update.');
        return redirect()->to('/Petunjuk/petunjuk');
    }
}
