<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;
use App\Models\ModelSiswa;
use App\Models\ModelJurusan;
use App\Models\ModeljalurMasuk;
use App\Models\ModelKuisioner;


class Pendaftaran extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTa = new ModelTa();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModeljalurMasuk = new ModeljalurMasuk();
        $this->ModelKuisioner = new ModelKuisioner();
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Pendaftaran',
            'ta' => $this->ModelTa->statusTa(),
            'jalur' => $this->ModeljalurMasuk->getAllData(),
            'jurusan' => $this->ModelJurusan->getAllData(),
            'kuisioner' => $this->ModelKuisioner->getAllData(),
            'validation' =>  \Config\Services::validation(),
        ];
        return view('v_pendaftaran', $data);
    }

    public function simpanPendaftaran()
    {
        if ($this->validate([
            'nama_lengkap'       => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'tempat_lahir'       => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'tempat_lahir'       => [
                'label' => 'Tempat Lahir',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'jk'       => [
                'label' => 'Jenis Kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'tanggal'       => [
                'label' => 'Tanggal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'bulan'       => [
                'label' => 'Bulan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'tahun'       => [
                'label' => 'Tahun',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'no_telpon'       => [
                'label' => 'No telp',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'id_kuisioner'       => [
                'label' => 'Kuisioner',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'id_jurusan'       => [
                'label' => 'Jurusan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
            'id_jalur_masuk'       => [
                'label' => 'Jalur Masuk',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!'
                ]
            ],
        ])) {
            //Jika Tidak ada validasi maka simpan data
            $ta = $this->ModelTa->statusTa();
            $tahun = $this->request->getPost('tahun');
            $bulan = $this->request->getPost('bulan');
            $tanggal = $this->request->getPost('tanggal');
            $no_pendaftaran = $this->ModelSiswa->noPendaftaran($this->request->getPost('id_jurusan'));



            $data = [
                'no_pendaftaran' => $no_pendaftaran,
                'tahun' => $ta['tahun'],
                'tgl_pendaftaran' => date('Y-m-d'),
                'id_jurusan' => $this->request->getPost('id_jurusan'),
                'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'id_kuisioner' => $this->request->getPost('id_kuisioner'),
                'nama_lengkap' => $this->request->getPost('nama_lengkap'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'jk' => $this->request->getPost('jk'),
                'tgl_lahir' => $tahun . '-' . $bulan . '-' . $tanggal,
                'password' => $tanggal . $bulan . $tahun,
            ];
            $this->ModelSiswa->insertData($data);
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil, Silahkan Login Untuk Melengkapi Data');
            return redirect()->to('Pendaftaran');
        } else {
            //Jika ada validasi
            $validation =  \Config\Services::validation();
            return redirect()->to('Pendaftaran')->withInput()->with('validation', $validation);
        }
    }
}
