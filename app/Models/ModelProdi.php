<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelProdi extends Model {

    public function allData()
    {
        return $this->db->table('prodi')
                    ->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left')
                    ->orderBy('fakultas.id_fakultas', 'ASC')
                    ->get()->getResultArray();
    }

    public function detailData($id_prodi)
    {
        return $this->db->table('prodi')
                    ->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left')
                    ->where('id_prodi', $id_prodi)
                    ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('prodi')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('prodi')->where('id_prodi', $data['id_prodi'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('prodi')->where('id_prodi', $data['id_prodi'])->delete($data);
    }
}