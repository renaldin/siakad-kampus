<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;
use App\Models\ModelKrs;

class Krs extends BaseController
{

    public function __construct()
    {
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        $mhs = $this->ModelKrs->dataMahasiswa();
        $ta = $this->ModelTahunAkademik->tahun_akademik_aktif();
        $data = [
            'title' => 'Kartu Rencana Studi (KRS)',
            'tahun_akademik_aktif' => $this->ModelTahunAkademik->tahun_akademik_aktif(),
            'mahasiswa' => $this->ModelKrs->dataMahasiswa(),
            'MatakuliahDitawarkan' => $this->ModelKrs->MatakuliahDitawarkan($ta['id_tahun_akademik'], $mhs['id_prodi']),
            'DataKrs' => $this->ModelKrs->DataKrs($mhs['id_mahasiswa'], $ta['id_tahun_akademik']),
            'isi'   => 'mahasiswa/krs/krs'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function tambah_matkul($id_jadwal)
    {
        $mhs = $this->ModelKrs->dataMahasiswa();
        $ta = $this->ModelTahunAkademik->tahun_akademik_aktif();
        $data = [
            'id_jadwal' => $id_jadwal,
            'id_tahun_akademik' => $ta['id_tahun_akademik'],
            'id_mahasiswa' => $mhs['id_mahasiswa']
        ];

        $this->ModelKrs->TambahMatkul($data);
        session()->setFlashdata('pesan', 'Mata Kuliah Berhasil Ditambahkan!!!');

        return redirect()->to(base_url('krs'));
    }

    public function delete($id_krs)
    {
        $data = [
            'id_krs' => $id_krs
        ];

        $this->ModelKrs->delete_data($data);
        session()->setFlashdata('pesan', 'Data KRS Berhasil Dihapus!!!');

        return redirect()->to(base_url('krs'));
    }

    public function print()
    {
        $mhs = $this->ModelKrs->dataMahasiswa();
        $ta = $this->ModelTahunAkademik->tahun_akademik_aktif();
        $data = [
            'title' => 'Print KRS',
            'tahun_akademik_aktif' => $this->ModelTahunAkademik->tahun_akademik_aktif(),
            'mahasiswa' => $this->ModelKrs->dataMahasiswa(),
            'DataKrs' => $this->ModelKrs->DataKrs($mhs['id_mahasiswa'], $ta['id_tahun_akademik']),
        ];

        return view('mahasiswa/krs/print_krs', $data);
    }
}
