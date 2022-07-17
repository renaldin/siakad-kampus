<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;
use App\Models\ModelKrs;

class Mhs extends BaseController
{
    public function __construct()
    {
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        $this->ModelKrs = new ModelKrs();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'mhs'   => $this->ModelKrs->dataMahasiswa(),
            'ta'    => $this->ModelTahunAkademik->tahun_akademik_aktif(),
            'isi'   => 'dashboard_mhs'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function absensi()
    {
        $mhs = $this->ModelKrs->dataMahasiswa();
        $ta = $this->ModelTahunAkademik->tahun_akademik_aktif();
        $data = [
            'title' => 'Absensi',
            'tahun_akademik_aktif' => $this->ModelTahunAkademik->tahun_akademik_aktif(),
            'mahasiswa' => $this->ModelKrs->dataMahasiswa(),
            'DataKrs' => $this->ModelKrs->DataKrs($mhs['id_mahasiswa'], $ta['id_tahun_akademik']),
            'isi'   => 'mahasiswa/absensi'
        ];
        return view('layout/v_wrapper', $data);
    }
}
