<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{

    public function login_user($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_mahasiswa($username, $password)
    {
        return $this->db->table('mahasiswa')->where([
            'nim' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }

    public function login_dosen($username, $password)
    {
        return $this->db->table('dosen')->where([
            'nidn' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
