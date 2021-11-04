<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBaner extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_baner')
            ->orderBy('id_baner', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function detailBaner($id_baner)
    {
        return $this->db->table('tbl_baner')
            ->where('id_baner', $id_baner)
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_baner')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tbl_baner')
            ->where('id_baner', $data['id_baner'])
            ->update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('tbl_baner')
            ->where('id_baner', $data['id_baner'])
            ->delete($data);
    }

    ////estimasi pendaftaran
    public function jumlahPendaftar()
    {
        return $this->db->table('tbl_siswa')
            ->where('tahun', date('Y'))
            ->where('id_jurusan', '1')
            ->countAllResults();
    }

    public function jumlahFi()
    {
        return $this->db->table('tbl_siswa')
            ->where('tahun', date('Y'))
            ->where('id_jurusan', '1')
            ->countAllResults();
    }

    public function jumlahKi()
    {
        return $this->db->table('tbl_siswa')
            ->where('tahun', date('Y'))
            ->where('id_jurusan', '2')
            ->countAllResults();
    }
}
