<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTahunAkademik extends Model
{

    public function allData()
    {
        return $this->db->table('tahun_akademik')
            ->orderBy('id_tahun_akademik', 'DESC')
            ->get()->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tahun_akademik')->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tahun_akademik')->where('id_tahun_akademik', $data['id_tahun_akademik'])->update($data);
    }

    public function delete_data($data)
    {
        $this->db->table('tahun_akademik')->where('id_tahun_akademik', $data['id_tahun_akademik'])->delete($data);
    }

    public function reset_status_ta()
    {
        $this->db->table('tahun_akademik')
            ->update(['status' => 0]);
    }

    public function tahun_akademik_aktif()
    {
        return $this->db->table('tahun_akademik')
            ->where('status', 1)
            ->get()
            ->getRowArray();
    }
}
