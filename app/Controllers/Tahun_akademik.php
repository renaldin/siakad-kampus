<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;

class Tahun_akademik extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelTahunAkademik = new ModelTahunAkademik();
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'tahun_akademik' => $this->ModelTahunAkademik->allData(),
            'isi'   => 'admin/tahun_akademik'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'tahun_akademik' => $this->request->getPost('tahun_akademik'),
            'semester' => $this->request->getPost('semester'),
        ];

        $this->ModelTahunAkademik->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

        return redirect()->to(base_url('tahun_akademik'));
    }

    public function edit($id_tahun_akademik)
    {
        $data = [
            'id_tahun_akademik' => $id_tahun_akademik,
            'tahun_akademik' => $this->request->getPost('tahun_akademik'),
            'semester' => $this->request->getPost('semester'),
        ];

        $this->ModelTahunAkademik->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');

        return redirect()->to(base_url('tahun_akademik'));
    }

    public function delete($id_tahun_akademik)
    {
        $data = [
            'id_tahun_akademik'   => $id_tahun_akademik,
        ];

        $this->ModelTahunAkademik->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('tahun_akademik'));
    }

    // setting tahun akademik
    public function setting()
    {
        $data = [
            'title' => 'Tahun Akademik',
            'tahun_akademik' => $this->ModelTahunAkademik->allData(),
            'isi'   => 'admin/set_tahun_akademik'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function set_status_ta($id_tahun_akademik)
    {
        // reset status tahun akademik
        $this->ModelTahunAkademik->reset_status_ta();

        // set status tahun akademik
        $data = [
            'id_tahun_akademik' => $id_tahun_akademik,
            'status' => 1
        ];

        $this->ModelTahunAkademik->edit($data);
        session()->setFlashdata('pesan', 'Tahun Akademik Berhasil Diaktifkan!!!');

        return redirect()->to(base_url('tahun_akademik/setting'));
    }
}
