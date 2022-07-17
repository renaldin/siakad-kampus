<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelMataKuliah extends Model {

    public function allData()
    {
        return $this->db->table('mata_kuliah')
                    ->orderBy('id_mata_kuliah', 'DESC')
                    ->get()->getResultArray();
    }

    public function allDataMatkul($id_prodi)
    {
        return $this->db->table('mata_kuliah')
                    ->where('id_prodi', $id_prodi)
                    ->orderBy('smt', 'ASC')
                    ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('mata_kuliah')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('mata_kuliah')->where('id_mata_kuliah', $data['id_mata_kuliah'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('mata_kuliah')->where('id_mata_kuliah', $data['id_mata_kuliah'])->delete($data);
    }
}