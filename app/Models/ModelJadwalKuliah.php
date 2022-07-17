<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalKuliah extends Model
{

    public function allData($id_prodi)
    {
        return $this->db->table('jadwal')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah', 'left')
            ->join('prodi', 'prodi.id_prodi = jadwal.id_prodi', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal.id_kelas', 'left')
            ->where('jadwal.id_prodi', $id_prodi)
            ->orderBy('mata_kuliah.smt', 'ASC')
            ->get()->getResultArray();
    }

    public function matkul($id_prodi)
    {
        return $this->db->table('mata_kuliah')
            ->where('id_prodi', $id_prodi)
            ->orderBy('smt', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function kelas($id_prodi)
    {
        return $this->db->table('kelas')
            ->where('id_prodi', $id_prodi)
            ->orderBy('nama_kelas', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('jadwal')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('jadwal')->where('id_jadwal', $data['id_jadwal'])->delete($data);
    }
}
