<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKuisioner extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_kuisioner')
            ->orderBy('id_kuisioner', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_kuisioner')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tbl_kuisioner')
            ->where('id_kuisioner', $data['id_kuisioner'])
            ->update($data);
    }

    public function deleteData($data)
    {

        $this->db->table('tbl_kuisioner')
            ->where('id_kuisioner', $data['id_kuisioner'])
            ->delete($data);
    }
}
