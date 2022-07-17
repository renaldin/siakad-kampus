<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDosen extends Model
{

    public function allData()
    {
        return $this->db->table('dosen')
            ->orderBy('id_dosen', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_dosen)
    {
        return $this->db->table('dosen')
            ->where('id_dosen', $id_dosen)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('dosen')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('dosen')->where('id_dosen', $data['id_dosen'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('dosen')->where('id_dosen', $data['id_dosen'])->delete($data);
    }
}
