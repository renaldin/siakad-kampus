<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelRuangan extends Model {

    public function allData()
    {
        return $this->db->table('ruangan')
                    ->join('gedung', 'gedung.id_gedung = ruangan.id_gedung', 'left')
                    ->orderBy('gedung.id_gedung', 'ASC')
                    ->get()->getResultArray();
    }

    public function detailData($id_ruangan)
    {
        return $this->db->table('ruangan')
                    ->join('gedung', 'gedung.id_gedung = ruangan.id_gedung', 'left')
                    ->where('id_ruangan', $id_ruangan)
                    ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('ruangan')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('ruangan')->where('id_ruangan', $data['id_ruangan'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('ruangan')->where('id_ruangan', $data['id_ruangan'])->delete($data);
    }
}