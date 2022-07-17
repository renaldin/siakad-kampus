<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelGedung extends Model {

    public function allData()
    {
        return $this->db->table('gedung')
                    ->orderBy('id_gedung', 'DESC')
                    ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('gedung')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('gedung')->where('id_gedung', $data['id_gedung'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('gedung')->where('id_gedung', $data['id_gedung'])->delete($data);
    }
}