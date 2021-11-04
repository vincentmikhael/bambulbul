<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPotongan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_potongan')
            ->orderBy('id', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_potongan')
            ->insert($data);
    }

    public function editData($data)
    {
        $this->db->table('tbl_potongan')
            ->where('id', $data['id'])
            ->update($data);
    }

    public function deleteData($data)
    {

        $this->db->table('tbl_potongan')
            ->where('id', $data['id'])
            ->delete($data);
    }
}
