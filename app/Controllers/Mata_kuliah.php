<?php

namespace App\Controllers;
use App\Models\ModelMataKuliah;
use App\Models\ModelProdi;

class Mata_kuliah extends BaseController
{
    
    public function __construct()
    {
        helper('form');
        $this->ModelMataKuliah = new ModelMataKuliah();
        $this->ModelProdi = new ModelProdi();
    }
    

    public function index()
    {
        $data = [
            'title'     => 'Mata Kuliah',
            'mata_kuliah'  => $this->ModelMataKuliah->allData(),
            'prodi'  => $this->ModelProdi->allData(),
            'isi'       => 'admin/matkul/mata_kuliah'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detail($id_prodi)
    {
        $data = [
            'title'     => 'Mata Kuliah',
            'mata_kuliah'  => $this->ModelMataKuliah->allDataMatkul($id_prodi),
            'prodi'  => $this->ModelProdi->detailData($id_prodi),
            'isi'       => 'admin/matkul/detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_prodi)
    {
        $matkulValid = [
            'kode_mata_kuliah' => [
                'label' => 'Kode Mata Kuliah',
                'rules' => 'required|is_unique[mata_kuliah.kode_mata_kuliah]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada. Silahkan input yang lain!!!.'
                ]
            ],
            'mata_kuliah' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'sks' => [
                'label' => 'SKS',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'smt' => [
                'label' => 'Semester',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($matkulValid)) {
            //jika valid
            $smt = $this->request->getPost('smt');
            if ($smt == 1 || $smt == 3 || $smt == 5 || $smt == 7) {
                $semester = 'Ganjil';
            } else {
                $semester = 'Genap';
            }
            $data = [
                'kode_mata_kuliah' => $this->request->getPost('kode_mata_kuliah'),
                'mata_kuliah' => $this->request->getPost('mata_kuliah'),
                'sks' => $this->request->getPost('sks'),
                'kategori' => $this->request->getPost('kategori'),
                'smt' => $this->request->getPost('smt'),
                'semester' => $semester,
                'id_prodi' => $id_prodi,
            ];
    
            $this->ModelMataKuliah->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');
    
            return redirect()->to(base_url('mata_kuliah/detail/'.$id_prodi));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('mata_kuliah/detail/'.$id_prodi));
        }
    }

    public function delete($id_prodi, $id_mata_kuliah)
    {
        $data = [
            'id_mata_kuliah'   => $id_mata_kuliah,
        ];

        $this->ModelMataKuliah->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');
        return redirect()->to(base_url('mata_kuliah/detail/'.$id_prodi));
    }
}
