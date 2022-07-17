<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{

    public function allData()
    {
        return $this->db->table('kelas')
            ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
            ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
            ->orderBy('kelas.id_prodi', 'ASC')
            ->get()->getResultArray();
    }

    public function detail($id_kelas)
    {
        return $this->db->table('kelas')
            ->join('prodi', 'prodi.id_prodi = kelas.id_prodi', 'left')
            ->join('dosen', 'dosen.id_dosen = kelas.id_dosen', 'left')
            ->where('id_kelas', $id_kelas)
            ->get()->getRowArray();
    }

    public function add($data)
    {
        $this->db->table('kelas')->insert($data);
    }

    public function delete_data($data)
    {
        $this->db->table('kelas')->where('id_kelas', $data['id_kelas'])->delete($data);
    }

    // menampilkan mahasiswa berdasarakan kelas
    public function mahasiswa($id_kelas)
    {
        return $this->db->table('mahasiswa')
            ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left')
            ->where('id_kelas', $id_kelas)
            ->orderBy('nama_mahasiswa', 'ASC')
            ->get()->getResultArray();
    }

    // Menampilkan mahasiswa belum punya kelas
    public function mahasiswa_tidak_ada_kelas()
    {
        return $this->db->table('mahasiswa')
            ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left')
            ->where('id_kelas', null)
            ->orderBy('nama_mahasiswa', 'ASC')
            ->get()->getResultArray();
    }

    public function jumlah_mahasiswa($id_kelas)
    {
        return $this->db->table('mahasiswa')
            ->where('id_kelas', $id_kelas)
            ->countAllResults();
    }

    public function update_mhs($data)
    {
        $this->db->table('mahasiswa')
            ->where('id_mahasiswa', $data['id_mahasiswa'])
            ->update($data);
    }
}
