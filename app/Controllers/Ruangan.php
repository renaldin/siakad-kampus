<?php

namespace App\Controllers;
use App\Models\ModelRuangan;
use App\Models\ModelGedung;


class Ruangan extends BaseController {

    public function __construct()
    {
        helper('form');
        $this->ModelRuangan = new ModelRuangan();
        $this->ModelGedung = new ModelGedung();
    }
    

    public function index()
    {
        $data = [
            'title'     => 'Ruangan',
            'ruangan'  => $this->ModelRuangan->allData(),
            'isi'       => 'admin/ruangan/index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Add Ruangan',
            'gedung'    => $this->ModelGedung->allData(),
            'isi'       => 'admin/ruangan/add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        $gedungValid = [
            'id_gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($gedungValid)) {
            //jika valid
            $data = [
                'id_gedung' => $this->request->getPost('id_gedung'),
                'ruangan' => $this->request->getPost('ruangan'),
            ];
    
            $this->ModelRuangan->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');
    
            return redirect()->to(base_url('ruangan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Ruangan/add'));
        }
    }

    public function edit($id_ruangan)
    {
        $data = [
            'title'     => 'Edit Ruangan',
            'gedung'    => $this->ModelGedung->allData(),
            'ruangan'   => $this->ModelRuangan->detailData($id_ruangan),
            'isi'       => 'admin/ruangan/edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_ruangan)
    {
        $gedungValid = [
            'id_gedung' => [
                'label' => 'Gedung',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ]
        ];

        if ($this->validate($gedungValid)) {
            //jika valid
            $data = [
                'id_ruangan' => $id_ruangan,
                'id_gedung' => $this->request->getPost('id_gedung'),
                'ruangan' => $this->request->getPost('ruangan'),
            ];
    
            $this->ModelRuangan->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!!');
    
            return redirect()->to(base_url('ruangan'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Ruangan/edit/'.$id_ruangan));
        }
    }

    public function delete($id_ruangan)
    {
        $data = [
            'id_ruangan'   => $id_ruangan,
        ];

        $this->ModelRuangan->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('ruangan'));
    }
}