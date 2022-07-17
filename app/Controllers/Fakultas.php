<?php

namespace App\Controllers;
use App\Models\ModelFakultas;

class Fakultas extends BaseController
{
    
    public function __construct()
    {
        helper('form');
        $this->ModelFakultas = new ModelFakultas();
    }
    

    public function index()
    {
        $data = [
            'title'     => 'Fakultas',
            'fakultas'  => $this->ModelFakultas->allData(),
            'isi'       => 'admin/v_fakultas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'fakultas' => $this->request->getPost('fakultas'),
        ];

        $this->ModelFakultas->add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

        return redirect()->to(base_url('fakultas'));
    }

    public function edit($id_fakultas)
    {
        $data = [
            'id_fakultas'   => $id_fakultas,
            'fakultas'      => $this->request->getPost('fakultas'),
        ];

        $this->ModelFakultas->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!!');

        return redirect()->to(base_url('fakultas'));
    }

    public function delete($id_fakultas)
    {
        $data = [
            'id_fakultas'   => $id_fakultas,
        ];

        $this->ModelFakultas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('fakultas'));
    }
}
