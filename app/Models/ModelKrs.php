<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKrs extends Model
{

    public function dataMahasiswa()
    {
        return $this->db->table('mahasiswa')
            ->join('prodi', 'prodi.id_prodi=mahasiswa.id_prodi', 'left')
            ->join('fakultas', 'fakultas.id_fakultas=prodi.id_fakultas', 'left')
            ->join('kelas', 'kelas.id_kelas=mahasiswa.id_kelas', 'left')
            ->join('dosen', 'dosen.id_dosen=kelas.id_dosen', 'left')
            ->where('nim', session()->get('username'))
            ->get()
            ->getRowArray();
    }

    public function MatakuliahDitawarkan($id_tahun_akademik, $id_prodi)
    {
        return $this->db->table('jadwal')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah=jadwal.id_mata_kuliah', 'left')
            ->join('kelas', 'kelas.id_kelas=jadwal.id_kelas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan=jadwal.id_ruangan', 'left')
            ->join('dosen', 'dosen.id_dosen=jadwal.id_dosen', 'left')
            ->join('prodi', 'prodi.id_prodi=jadwal.id_prodi', 'left')
            ->where('jadwal.id_tahun_akademik', $id_tahun_akademik)
            ->where('jadwal.id_prodi', $id_prodi)
            ->get()
            ->getResultArray();
    }

    public function TambahMatkul($data)
    {
        $this->db->table('krs')->insert($data);
    }

    public function DataKrs($id_mahasiswa, $id_ta)
    {
        return $this->db->table('krs')
            ->join('jadwal', 'jadwal.id_jadwal=krs.id_jadwal', 'left')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah=jadwal.id_mata_kuliah', 'left')
            ->join('kelas', 'kelas.id_kelas=jadwal.id_kelas', 'left')
            ->join('ruangan', 'ruangan.id_ruangan=jadwal.id_ruangan', 'left')
            ->join('dosen', 'dosen.id_dosen=jadwal.id_dosen', 'left')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->where('krs.id_tahun_akademik', $id_ta)
            ->get()
            ->getResultArray();
    }

    public function delete_data($data)
    {
        $this->db->table('krs')
            ->where('id_krs', $data['id_krs'])
            ->delete($data);
    }
}
