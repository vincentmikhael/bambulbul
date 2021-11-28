<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPendaftaranSiswa;
use App\Models\ModelAdmin;
use App\Models\ModelSiswa;
use App\Models\ModelJalurMasuk;
use App\Models\ModelAgama;
use App\Models\ModelJurusan;
use App\Models\ModelPekerjaan;
use App\Models\ModelWilayah;
use App\Models\ModelLampiran;



class PendaftaranSiswa extends BaseController
{
    public function __construct()
    {
        $this->ModelPendaftaranSiswa = new ModelPendaftaranSiswa();
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
            'subtitle' => 'Pendaftaran Masuk',
            'ppdb' => $this->ModelPendaftaranSiswa->getPpdbMasuk(),
        ];
        return view('admin/ppdb/v_masuk', $data);
    }

    public function listMasuk()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'List Masuk',
            'ppdb' => $this->ModelPendaftaranSiswa->getListMasuk(),
        ];
        return view('admin/ppdb/v_listmasuk', $data);
    }

    public function listMasukKeuangan()
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Detail Siswa',
            'ppdb' => $this->ModelPendaftaranSiswa->getPpdbDiterima(),
            'data' => []
        ];

        foreach ($data['ppdb'] as $z) {
            $potongan = $db->table('tbl_potongan')->where('id_jalur_masuk', $z['id_jalur_masuk'])->get()->getResult();
            $z += ['potongan' => $potongan];
            $data['data'][] = $z;
        }
        return view('admin/keuangan/v_keuangan', $data);
    }

    public function cetakKwitansi($id)
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'Keuangan',
            'subtitle' => 'Cetak Kwitansi',
            'setting' => $this->ModelAdmin->detailSetting(),
            'siswa' => $this->ModelPendaftaranSiswa->getDataLaporan($id),
            'pembayaran' => '',
            'total' => '',
        ];
        $data['total'] = $db->table('tbl_jalur_masuk')->where('id_jalur_masuk', $data['siswa']['id_jalur_masuk'])->get()->getResult()[0];
        $data['pembayaran'] = $db->table('tbl_tgl_pembayaran')->where('siswa_id', $data['siswa']['id_siswa'])->get()->getResult('array');

        return view('admin/keuangan/v_cetakkwitansi', $data);
    }


    public function listDiterima()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Pendaftaran Diterima',
            'ppdb' => $this->ModelPendaftaranSiswa->getPpdbDiterima(),
        ];
        return view('admin/ppdb/v_diterima', $data);
    }

    public function listDitolak()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Pendaftaran Ditolak',
            'ppdb' => $this->ModelPendaftaranSiswa->getPpdbDitolak(),
        ];
        return view('admin/ppdb/v_ditolak', $data);
    }

    public function detailData($id_siswa)
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Detail Data Siswa',
            'siswa' => $this->ModelPendaftaranSiswa->detailData($id_siswa),
            'berkas' => $this->ModelPendaftaranSiswa->lampiran($id_siswa),
            'jalur' => $this->ModelJalurMasuk->getAllData(),
            'jurusan' => $this->ModelJurusan->getAllData(),
            'agama' => $this->ModelAgama->getAllData(),
            'pekerjaan' => $this->ModelPekerjaan->getAllData(),
            'provinsi' => $this->ModelWilayah->getProvinsi(),
            'lampiran' => $this->ModelLampiran->getAllData(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/ppdb/v_detail', $data);
    }

    public function detailDataAdmin($id_siswa)
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Detail Data Siswa',
            'siswa' => $this->ModelPendaftaranSiswa->detailDataAdmin($id_siswa),
            'berkas' => $this->ModelPendaftaranSiswa->lampiran($id_siswa),
        ];
        return view('admin/ppdb/v_detailAdmin', $data);
    }

    public function editKeuangan($id)
    {
        $db = \Config\Database::connect();
        $db->table('tbl_siswa')->where('id_siswa', $id)->update([
            "stat_formulir" => $this->request->getPost('formulir1'),
            "stat_dpsp" => $this->request->getPost('dpsp1'),
            "stat_dps" => $this->request->getPost('dps1'),
            "stat_bopp" => $this->request->getPost('bopp1'),
            "pemb_formulir" => $this->request->getPost('formulir'),
            "pemb_dpsp" => $this->request->getPost('dpsp'),
            "pemb_dps" => $this->request->getPost('dps'),
            "pemb_bopp" => $this->request->getPost('bopp'),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!');
        return redirect()->to('/PendaftaranSiswa/detaildatakeuangan/' . $id);
    }

    public function tglkeuangan($id)
    {
        $db = \Config\Database::connect();
        $db->table('tbl_tgl_pembayaran')->insert([
            "siswa_id" => $id,
            "tipe" => $this->request->getPost('tipe'),
            "tanggal" => $this->request->getPost('tanggal'),
            "total" => $this->request->getPost('total')
        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan !!');
        return redirect()->to('/PendaftaranSiswa/detaildatakeuangan/' . $id);
    }

    public function detailDataKeuangan($id_siswa)
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Detail Siswa',
            'ppdb' => $this->ModelPendaftaranSiswa->getPpdbDiterimaDetail($id_siswa),
            'data' => [],
            'tgl_pembayaran' => $db->table('tbl_tgl_pembayaran')->where('siswa_id', $id_siswa)->get()->getResult()
        ];

        foreach ($data['ppdb'] as $z) {
            $potongan = $db->table('tbl_potongan')->where('id_jalur_masuk', $z['id_jalur_masuk'])->get()->getResult();
            $z += ['potongan' => $potongan];
            $data['data'][] = $z;
        }
        return view('admin/keuangan/v_detailkeuangan', $data);
    }

    public function diterima($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'stat_ppdb' => '1'
        ];
        $this->ModelPendaftaranSiswa->editData($data);
        session()->setFlashdata('terima', 'Siswa Telah Diterima!');
        return redirect()->to('/PendaftaranSiswa');
    }

    public function ditolak($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'stat_ppdb' => '2'
        ];
        $this->ModelPendaftaranSiswa->editData($data);
        session()->setFlashdata('ditolak', 'Siswa Telah Ditolak!');
        return redirect()->to('/PendaftaranSiswa');
    }

    public function laporan()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Laporan Diterima',
            'ta' => $this->ModelPendaftaranSiswa->getAllDataTa(),
        ];
        return view('admin/ppdb/v_laporan', $data);
    }
    public function laporankeuangan()
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Laporan Keuangan',
            'ta' => $this->ModelPendaftaranSiswa->getAllDataTa(),
        ];
        return view('admin/keuangan/v_laporankeuangan', $data);
    }

    public function cetakLaporan($tahun)
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Laporan Diterima',
            'tahun' => $tahun,
            'setting' => $this->ModelAdmin->detailSetting(),
            'siswa' => $this->ModelPendaftaranSiswa->getDataLaporan($tahun),
        ];
        return view('admin/ppdb/v_cetaklaporan', $data);
    }

    public function cetakLaporanKeuangan($tahun)
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Laporan Keuangan',
            'tahun' => $tahun,
            'setting' => $this->ModelAdmin->detailSetting(),
            'siswa' => $this->ModelPendaftaranSiswa->getDataLaporan($tahun),
        ];
        return view('admin/keuangan/v_cetaklaporankeuangan', $data);
    }

    public function editDataKeuangan($id_siswa)
    {
        $data = [
            'title' => 'PPDB Online',
            'subtitle' => 'Detail Siswa',
            'ppdb' => $this->ModelPendaftaranSiswa->getPpdbDiterimaDetail($id_siswa),
        ];
        return view('admin/keuangan/v_editkeuangan', $data);
    }
}
