<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDsn extends Model
{

    public function DataDosen()
    {
        return $this->db->table('dosen')
            ->where('nidn', session()->get('username'))
            ->get()
            ->getRowArray();
    }

    public function jadwalDosen($id_dosen, $id_tahun_akademik)
    {
        return $this->db->table('jadwal')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah', 'left')
            ->join('prodi', 'prodi.id_prodi = jadwal.id_prodi', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left')
            ->join('ruangan', 'ruangan.id_ruangan = jadwal.id_ruangan', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal.id_kelas', 'left')
            ->where('jadwal.id_dosen', $id_dosen)
            ->where('jadwal.id_tahun_akademik', $id_tahun_akademik)
            ->get()->getResultArray();
    }

    public function detailJadwal($id_jadwal)
    {
        return $this->db->table('jadwal')
            ->join('prodi', 'prodi.id_prodi = jadwal.id_prodi', 'left')
            ->join('fakultas', 'fakultas.id_fakultas = prodi.id_fakultas', 'left')
            ->join('mata_kuliah', 'mata_kuliah.id_mata_kuliah = jadwal.id_mata_kuliah', 'left')
            ->join('dosen', 'dosen.id_dosen = jadwal.id_dosen', 'left')
            ->join('kelas', 'kelas.id_kelas = jadwal.id_kelas', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getRowArray();
    }

    public function mhs($id_jadwal)
    {
        return $this->db->table('krs')
            ->join('mahasiswa', 'mahasiswa.id_mahasiswa = krs.id_mahasiswa', 'left')
            ->where('id_jadwal', $id_jadwal)
            ->get()->getResultArray();
    }

    public function SimpanAbsen($data)
    {
        $this->db->table('krs')
            ->where('id_krs', $data['id_krs'])
            ->update($data);
    }

    public function SimpanNilai($data)
    {
        $this->db->table('krs')
            ->where('id_krs', $data['id_krs'])
            ->update($data);
    }
}
