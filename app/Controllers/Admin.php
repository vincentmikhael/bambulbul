<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Dashboard',
            'totjurusan' => $this->ModelAdmin->totalJurusan(),
            'totpekerjaan' => $this->ModelAdmin->totalPekerjaan(),
            'totagama' => $this->ModelAdmin->totalAgama(),
            'totuser' => $this->ModelAdmin->totalUser(),
            'totlistmasuk' => $this->ModelAdmin->totalListMasuk(),
            'totpendaftarmasuk' => $this->ModelAdmin->totalPendaftarMasuk(),
            'totpendaftarditerima' => $this->ModelAdmin->totalPendaftarDiterima(),
            'totpendaftarditolak' => $this->ModelAdmin->totalPendaftarDitolak(),
            'pendapatan' => $db->table('tbl_tgl_pembayaran')->get()->getResult()
        ];
        return view('admin/v_dashboard', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Setting',
            'setting' => $this->ModelAdmin->detailSetting(),
        ];
        return view('admin/v_setting', $data);
    }

    public function saveSetting()
    {
        $file = $this->request->getFile('logo');
        // jika logo/gambar tidak diganti
        if ($file->getError() == 4) {
            $data = [
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat' => $this->request->getPost('alamat'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'provinsi' => $this->request->getPost('provinsi'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'email' => $this->request->getPost('email'),
                'web' => $this->request->getPost('web'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ];
            $this->ModelAdmin->saveSetting($data);
        } else {
            // jika logo/gambar diganti
            $setting = $this->ModelAdmin->detailSetting();
            if ($setting['logo'] != "") {
                unlink('./logo/' . $setting['logo']);
            }
            $nama_file = $file->getRandomName();
            $data = [
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'alamat' => $this->request->getPost('alamat'),
                'kecamatan' => $this->request->getPost('kecamatan'),
                'kabupaten' => $this->request->getPost('kabupaten'),
                'provinsi' => $this->request->getPost('provinsi'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'email' => $this->request->getPost('email'),
                'web' => $this->request->getPost('web'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'logo' => $nama_file,
            ];
            //Upload File Foto
            $file->move('logo/', $nama_file);
            $this->ModelAdmin->saveSetting($data);
        }
        session()->setFlashdata('pesan', 'Settingan Berhasil Di Ganti.');
        return redirect()->to('/admin/setting');
    }

    public function beranda()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Beranda',
            'beranda' => $this->ModelAdmin->detailSetting(),
        ];
        return view('admin/v_beranda', $data);
    }

    public function saveberanda()
    {
        $data = [
            'beranda' => $this->request->getPost('beranda'),
        ];
        $this->ModelAdmin->saveSetting($data);
        session()->setFlashdata('pesan', 'Beranda Berhasil Di Update.');
        return redirect()->to('/Admin/beranda');
    }

    public function petunjuk()
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
        session()->setFlashdata('pesan', 'Petunjuk Berhasil Di Update.');
        return redirect()->to('/Admin/petunjuk');
    }
}
