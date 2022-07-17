<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{

    public function jumlah_gedung()
    {
        return $this->db->table('gedung')
            ->countAllResults();
    }

    public function jumlah_ruangan()
    {
        return $this->db->table('ruangan')
            ->countAllResults();
    }

    public function jumlah_fakultas()
    {
        return $this->db->table('fakultas')
            ->countAllResults();
    }

    public function jumlah_prodi()
    {
        return $this->db->table('prodi')
            ->countAllResults();
    }

    public function jumlah_dosen()
    {
        return $this->db->table('dosen')
            ->countAllResults();
    }

    public function jumlah_matakuliah()
    {
        return $this->db->table('mata_kuliah')
            ->countAllResults();
    }

    public function jumlah_mahasiswa()
    {
        return $this->db->table('mahasiswa')
            ->countAllResults();
    }

    public function jumlah_kelas()
    {
        return $this->db->table('kelas')
            ->countAllResults();
    }
}
