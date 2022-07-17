<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model {

    public function allData()
    {
        return $this->db->table('user')
                    ->orderBy('id_user', 'DESC')
                    ->get()->getResultArray();
    }

    public function detailData($id_user)
    {
        return $this->db->table('user')
                    ->where('id_user', $id_user)
                    ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('user')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->delete($data);
    }
}