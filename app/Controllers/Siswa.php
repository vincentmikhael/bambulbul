<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelJalurMasuk;
use App\Models\ModelAgama;
use App\Models\ModelJurusan;
use App\Models\ModelPekerjaan;
use App\Models\ModelWilayah;
use App\Models\ModelLampiran;
use App\Models\ModelAdmin;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelJalurMasuk = new ModelJalurMasuk();
        $this->ModelAgama = new ModelAgama();
        $this->ModelJurusan = new ModelJurusan();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelLampiran = new ModelLampiran();
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Siswa',
            'siswa' => $this->ModelSiswa->getBiodataSiswa(),
            'jalur' => $this->ModelJalurMasuk->getAllData(),
            'jurusan' => $this->ModelJurusan->getAllData(),
            'agama' => $this->ModelAgama->getAllData(),
            'pekerjaan' => $this->ModelPekerjaan->getAllData(),
            'provinsi' => $this->ModelWilayah->getProvinsi(),
            'berkas' => $this->ModelSiswa->lampiran(),
            'lampiran' => $this->ModelLampiran->getAllData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('Siswa/v_formulir', $data);
    }

    public function updatePendaftaran($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
            'nisn' => $this->request->getPost('nisn'),

        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to('/Siswa');
    }

    public function updatePendaftaran2($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_jalur_masuk' => $this->request->getPost('id_jalur_masuk'),
            'nisn' => $this->request->getPost('nisn'),

        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to('/tueow');
    }


    public function updateFoto($id_siswa)
    {
        if ($this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024kb !!',
                ]
            ]
        ])) {

            //hapus foto lama
            $siswa = $this->ModelSiswa->detailData($id_siswa);
            if ($siswa['foto'] != "" or $siswa['foto'] != null) {
                unlink('./foto/' . $siswa['foto']);
            }

            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();
            $data = [
                'id_siswa' => $id_siswa,
                'foto' => $nama_file,
            ];
            //upload File Foto
            $file->move('foto/', $nama_file);
            $this->ModelSiswa->editData($data);
            session()->setFlashdata('pesan', 'Foto Berhasil Di Update !!');
            return redirect()->to('/Siswa');
        } else {
            //jika ada validasi
            $validation =  \Config\Services::validation();
            return redirect()->to('/Siswa')->withInput()->with('validation', $validation);
        }
    }

    public function updateFoto2($id_siswa)
    {
        if ($this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024kb !!',
                ]
            ]
        ])) {

            //hapus foto lama
            $siswa = $this->ModelSiswa->detailData($id_siswa);
            if ($siswa['foto'] != "" or $siswa['foto'] != null) {
                unlink('./foto/' . $siswa['foto']);
            }

            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();
            $data = [
                'id_siswa' => $id_siswa,
                'foto' => $nama_file,
            ];
            //upload File Foto
            $file->move('foto/', $nama_file);
            $this->ModelSiswa->editData($data);
            session()->setFlashdata('pesan', 'Foto Berhasil Di Update !!');
            return redirect()->to('adjkjfk');
        } else {
            //jika ada validasi
            $validation =  \Config\Services::validation();
            return redirect()->to('adjkjfk')->withInput()->with('validation', $validation);
        }
    }

    public function updateIdentitasSiswa($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'jk' => $this->request->getPost('jk'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'id_agama' => $this->request->getPost('id_agama'),
            'no_telpon' => $this->request->getPost('no_telpon'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Siswa Berhasil Di Update !!');
        return redirect()->to('/Siswa');
    }

    public function updateIdentitasSiswa2($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'jk' => $this->request->getPost('jk'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'id_agama' => $this->request->getPost('id_agama'),
            'no_telpon' => $this->request->getPost('no_telpon'),
            'asal_sekolah' => $this->request->getPost('asal_sekolah'),
            'tahun_lulus' => $this->request->getPost('tahun_lulus'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Siswa Berhasil Di Update !!');
        return redirect()->to('adjkjfk');
    }

    public function updateDataAyah($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'alamat_ayah' => $this->request->getPost('alamat_ayah'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'no_telpon_ayah' => $this->request->getPost('no_telpon_ayah'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Ayah Berhasil Di Update !!');
        return redirect()->to('/Siswa');
    }

    public function updateDataAyah2($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'nama_ayah' => $this->request->getPost('nama_ayah'),
            'alamat_ayah' => $this->request->getPost('alamat_ayah'),
            'pekerjaan_ayah' => $this->request->getPost('pekerjaan_ayah'),
            'no_telpon_ayah' => $this->request->getPost('no_telpon_ayah'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Ayah Berhasil Di Update !!');
        return redirect()->to('adjkjfk');
    }

    public function updateDataIbu($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'alamat_ibu' => $this->request->getPost('alamat_ibu'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            'no_telpon_ibu' => $this->request->getPost('no_telpon_ibu'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Ibu Berhasil Di Update !!');
        return redirect()->to('/Siswa');
    }

    public function updateDataIbu2($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'nama_ibu' => $this->request->getPost('nama_ibu'),
            'alamat_ibu' => $this->request->getPost('alamat_ibu'),
            'pekerjaan_ibu' => $this->request->getPost('pekerjaan_ibu'),
            'no_telpon_ibu' => $this->request->getPost('no_telpon_ibu'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Ibu Berhasil Di Update !!');
        return redirect()->to('adjkjfk');
    }

    public function updateDataAlamat($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_provinsi' => $this->request->getPost('id_provinsi'),
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'id_kabupaten' => $this->request->getPost('id_kabupaten'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Alamat Berhasil Di Update !!');
        return redirect()->to('/Siswa');
    }

    public function updateDataAlamat2($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'id_provinsi' => $this->request->getPost('id_provinsi'),
            'id_kecamatan' => $this->request->getPost('id_kecamatan'),
            'id_kabupaten' => $this->request->getPost('id_kabupaten'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Identitas Alamat Berhasil Di Update !!');
        return redirect()->to('adjkjfk');
    }

    public function addBerkas($id_siswa)
    {
        if ($this->validate([
            'id_lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ],
            'berkas' => [
                'label' => 'Berkas',
                'rules' => 'max_size[berkas,1024]|ext_in[berkas,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024kb !!',
                    'ext_in' => '{field} Harus PDF !!',
                ]
            ]
        ])) {
            // hapus berkas lama
            $berkas = $this->request->getFile('berkas');
            $nama_file = $berkas->getRandomName();

            $data = [
                'id_siswa' => $id_siswa,
                'id_lampiran' => $this->request->getPost('id_lampiran'),
                'ket' => $this->request->getPost('ket'),
                'berkas' => $nama_file
            ];
            //upload Berkas
            $berkas->move('berkas/', $nama_file);
            $this->ModelSiswa->addBerkas($data);
            session()->setFlashdata('pesan', 'Berkas Berhasil Di Upload !!');
            return redirect()->to('/Siswa');
        } else {
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Siswa'));
        }
    }

    public function addBerkas2($id_siswa)
    {
        if ($this->validate([
            'id_lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih !!',
                ]
            ],
            'berkas' => [
                'label' => 'Berkas',
                'rules' => 'max_size[berkas,1024]|ext_in[berkas,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} Max 1024kb !!',
                    'ext_in' => '{field} Harus PDF !!',
                ]
            ]
        ])) {
            // hapus berkas lama
            $berkas = $this->request->getFile('berkas');
            $nama_file = $berkas->getRandomName();

            $data = [
                'id_siswa' => $id_siswa,
                'id_lampiran' => $this->request->getPost('id_lampiran'),
                'ket' => $this->request->getPost('ket'),
                'berkas' => $nama_file
            ];
            //upload Berkas
            $berkas->move('berkas/', $nama_file);
            $this->ModelSiswa->addBerkas($data);
            session()->setFlashdata('pesan', 'Berkas Berhasil Di Upload !!');
            return redirect()->to('adjkjfk');
        } else {
            //tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('adjkjfk');
        }
    }

    public function deleteBerkas($id_berkas)
    {
        $berkas = $this->ModelSiswa->detailBerkas($id_berkas);
        if ($berkas['berkas'] !== "") {
            unlink('./berkas/' . $berkas['berkas']);
        }
        $data = [
            'id_berkas' => $id_berkas,
        ];
        $this->ModelSiswa->deleteBerkas($data);
        session()->setFlashdata('pesan', 'Berkas Berhasil Di Delete !!');
        return redirect()->to('/Siswa');
    }

    public function deleteBerkas2($id_berkas)
    {
        $berkas = $this->ModelSiswa->detailBerkas($id_berkas);
        if ($berkas['berkas'] !== "") {
            unlink('./berkas/' . $berkas['berkas']);
        }
        $data = [
            'id_berkas' => $id_berkas,
        ];
        $this->ModelSiswa->deleteBerkas($data);
        session()->setFlashdata('pesan', 'Berkas Berhasil Di Delete !!');
        return redirect()->to('adjkjfk');
    }

    public function apply($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'stat_pendaftaran' => '1'
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Pendaftaran Berhasil Dikirim !!');
        return redirect()->to('/Siswa');
    }

    public function apply2($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'stat_pendaftaran' => '1'
        ];
        $this->ModelSiswa->editData($data);
        session()->setFlashdata('pesan', 'Pendaftaran Berhasil Dikirim !!');
        return redirect()->to('adjkjfk');
    }

    public function bukti_lulus()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Siswa',
            'siswa' => $this->ModelSiswa->getBiodataSiswa(),
            'setting' => $this->ModelAdmin->detailSetting(),
        ];
        return view('siswa/v_buktilulus', $data);
    }
}
