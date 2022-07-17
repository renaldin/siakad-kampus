<?php

namespace App\Controllers;

use App\Models\ModelAdmin;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jumlah_gedung' => $this->ModelAdmin->jumlah_gedung(),
            'jumlah_ruangan' => $this->ModelAdmin->jumlah_ruangan(),
            'jumlah_fakultas' => $this->ModelAdmin->jumlah_fakultas(),
            'jumlah_prodi' => $this->ModelAdmin->jumlah_prodi(),
            'jumlah_dosen' => $this->ModelAdmin->jumlah_dosen(),
            'jumlah_mahasiswa' => $this->ModelAdmin->jumlah_mahasiswa(),
            'jumlah_matakuliah' => $this->ModelAdmin->jumlah_matakuliah(),
            'jumlah_kelas' => $this->ModelAdmin->jumlah_kelas(),
            'isi'   => 'admin'
        ];
        return view('layout/v_wrapper', $data);
    }
}
