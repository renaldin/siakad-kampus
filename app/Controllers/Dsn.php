<?php

namespace App\Controllers;

use App\Models\ModelDsn;
use App\Models\ModelTahunAkademik;

class Dsn extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelDsn = new ModelDsn();
        $this->ModelTahunAkademik = new ModelTahunAkademik();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'isi'   => 'dashboard_dsn'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function jadwal()
    {
        $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();

        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Jadwal Mengajar',
            'ta' => $tahun_akademik,
            'jadwal' => $this->ModelDsn->jadwalDosen($dosen['id_dosen'], $tahun_akademik['id_tahun_akademik']),
            'isi'   => 'dosen/jadwal'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function AbsenKelas()
    {
        $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Absen Kelas',
            'ta' => $tahun_akademik,
            'absen' => $this->ModelDsn->jadwalDosen($dosen['id_dosen'], $tahun_akademik['id_tahun_akademik']),
            'isi'   => 'dosen/absen_kelas/absen_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi($id_jadwal)
    {
        $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();

        $data = [
            'title' => 'Absensi',
            'ta' => $tahun_akademik,
            'jadwal' => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs' => $this->ModelDsn->mhs($id_jadwal),
            'isi'   => 'dosen/absen_kelas/absensi'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function SimpanAbsen($id_jadwal)
    {
        $mhs = $this->ModelDsn->mhs($id_jadwal);
        foreach ($mhs as $row) {

            $data = [
                'id_krs' => $this->request->getPost($row['id_krs'] . 'id_krs'),
                'p1' => $this->request->getPost($row['id_krs'] . 'p1'),
                'p2' => $this->request->getPost($row['id_krs'] . 'p2'),
                'p3' => $this->request->getPost($row['id_krs'] . 'p3'),
                'p4' => $this->request->getPost($row['id_krs'] . 'p4'),
                'p5' => $this->request->getPost($row['id_krs'] . 'p5'),
                'p6' => $this->request->getPost($row['id_krs'] . 'p6'),
                'p7' => $this->request->getPost($row['id_krs'] . 'p7'),
                'p8' => $this->request->getPost($row['id_krs'] . 'p8'),
                'p9' => $this->request->getPost($row['id_krs'] . 'p9'),
                'p10' => $this->request->getPost($row['id_krs'] . 'p10'),
                'p11' => $this->request->getPost($row['id_krs'] . 'p11'),
                'p12' => $this->request->getPost($row['id_krs'] . 'p12'),
                'p13' => $this->request->getPost($row['id_krs'] . 'p13'),
                'p14' => $this->request->getPost($row['id_krs'] . 'p14'),
                'p15' => $this->request->getPost($row['id_krs'] . 'p15'),
                'p16' => $this->request->getPost($row['id_krs'] . 'p16'),
                'p17' => $this->request->getPost($row['id_krs'] . 'p17'),
                'p18' => $this->request->getPost($row['id_krs'] . 'p18'),
            ];
            $this->ModelDsn->SimpanAbsen($data);
        }
        session()->setFlashdata('pesan', 'Absensi Berhasil Diupdate!!!');

        return redirect()->to(base_url('dsn/absensi/' . $id_jadwal));
    }

    public function print_absensi($id_jadwal)
    {
        $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();

        $data = [
            'title' => 'Print Absensi',
            'ta' => $tahun_akademik,
            'jadwal' => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs' => $this->ModelDsn->mhs($id_jadwal),
        ];
        return view('dosen/absen_kelas/print_absensi', $data);
    }

    public function NilaiMahasiswa()
    {
        $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();
        $dosen = $this->ModelDsn->DataDosen();
        $data = [
            'title' => 'Nilai Mahasiswa',
            'ta' => $tahun_akademik,
            'absen' => $this->ModelDsn->jadwalDosen($dosen['id_dosen'], $tahun_akademik['id_tahun_akademik']),
            'isi'   => 'dosen/nilai/nilaimahasiswa'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function DataNilai($id_jadwal)
    {
        $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();

        $data = [
            'title' => 'Data Nilai',
            'ta' => $tahun_akademik,
            'jadwal' => $this->ModelDsn->detailJadwal($id_jadwal),
            'mhs' => $this->ModelDsn->mhs($id_jadwal),
            'isi'   => 'dosen/nilai/datanilai'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function SimpanNilai($id_jadwal)
    {
        $mhs = $this->ModelDsn->mhs($id_jadwal);
        foreach ($mhs as $row) {

            $absen = $this->request->getPost($row['id_krs'] . 'absen');
            $tugas = $this->request->getPost($row['id_krs'] . 'nilai_tugas');
            $uts = $this->request->getPost($row['id_krs'] . 'nilai_uts');
            $uas = $this->request->getPost($row['id_krs'] . 'nilai_uas');
            $na = ($absen * 15 / 100) + ($tugas * 15 / 100) + ($uts * 30 / 100) + ($uas * 40 / 100);
            if ($na >= 85) {
                $nh = 'A';
            } elseif ($na < 85 && $na >= 75) {
                $nh = 'B';
            } elseif ($na < 75 && $na >= 65) {
                $nh = 'C';
            } elseif ($na < 65 && $na >= 55) {
                $nh = 'D';
            } else {
                $nh = 'E';
            }

            $data = [
                'id_krs' => $this->request->getPost($row['id_krs'] . 'id_krs'),
                'nilai_tugas' => $this->request->getPost($row['id_krs'] . 'nilai_tugas'),
                'nilai_uts' => $this->request->getPost($row['id_krs'] . 'nilai_uts'),
                'nilai_uas' => $this->request->getPost($row['id_krs'] . 'nilai_uas'),
                'nilai_akhir' => number_format($na, 0),
                'nilai_HURUF' => $nh
            ];
            $this->ModelDsn->SimpanNilai($data);
        }
        session()->setFlashdata('pesan', 'Nilai Berhasil Diupdate!!!');

        return redirect()->to(base_url('dsn/DataNilai/' . $id_jadwal));
    }
}
