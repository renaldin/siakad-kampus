<?php

namespace App\Controllers;

use App\Models\ModelProdi;
use App\Models\ModelFakultas;
use App\Models\ModelDosen;

class Prodi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelProdi = new ModelProdi();
        $this->ModelFakultas = new ModelFakultas();
        $this->ModelDosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'title' => 'Program Studi',
            'prodi' => $this->ModelProdi->allData(),
            'isi'   => 'admin/prodi/index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title'     => 'Add Program Studi',
            'fakultas'    => $this->ModelFakultas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'isi'       => 'admin/prodi/add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        $prodiValid = [
            'id_fakultas' => [
                'label' => 'Fakultas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'kode_prodi' => [
                'label' => 'Kode Program Studi',
                'rules' => 'required|is_unique[prodi.kode_prodi]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada. Silahkan input yang lain!!!.'
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'jenjang' => [
                'label' => 'Jenjang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ka_prodi' => [
                'label' => 'Ketua Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($prodiValid)) {
            //jika valid
            $data = [
                'id_fakultas' => $this->request->getPost('id_fakultas'),
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'prodi' => $this->request->getPost('prodi'),
                'jenjang' => $this->request->getPost('jenjang'),
                'ka_prodi' => $this->request->getPost('ka_prodi'),
            ];

            $this->ModelProdi->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('prodi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/add'));
        }
    }

    public function edit($id_prodi)
    {
        $data = [
            'title'     => 'Edit Program Studi',
            'fakultas'    => $this->ModelFakultas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'prodi'    => $this->ModelProdi->detailData($id_prodi),
            'isi'       => 'admin/prodi/edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_prodi)
    {
        $prodiValid = [
            'id_fakultas' => [
                'label' => 'Fakultas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'jenjang' => [
                'label' => 'Jenjang',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'ka_prodi' => [
                'label' => 'Ketua Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($prodiValid)) {
            //jika valid
            $data = [
                'id_prodi' => $id_prodi,
                'id_fakultas' => $this->request->getPost('id_fakultas'),
                'kode_prodi' => $this->request->getPost('kode_prodi'),
                'prodi' => $this->request->getPost('prodi'),
                'jenjang' => $this->request->getPost('jenjang'),
                'ka_prodi' => $this->request->getPost('ka_prodi'),
            ];

            $this->ModelProdi->edit($data);
            session()->setFlashdata('pesan', 'Data Berhasil Diupdate!!!');

            return redirect()->to(base_url('prodi'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('prodi/edit/' . $id_prodi));
        }
    }

    public function delete($id_prodi)
    {
        $data = [
            'id_prodi'   => $id_prodi,
        ];

        $this->ModelProdi->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('prodi'));
    }
}
