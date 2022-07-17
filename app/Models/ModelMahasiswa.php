<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMahasiswa extends Model
{

    public function allData()
    {
        return $this->db->table('mahasiswa')
            ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left')
            ->orderBy('id_mahasiswa', 'DESC')
            ->get()->getResultArray();
    }

    public function detailData($id_mahasiswa)
    {
        return $this->db->table('mahasiswa')
            ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('mahasiswa')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('mahasiswa')->where('id_mahasiswa', $data['id_mahasiswa'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('mahasiswa')->where('id_mahasiswa', $data['id_mahasiswa'])->delete($data);
    }
}
