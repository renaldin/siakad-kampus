<?php

namespace App\Controllers;

use App\Models\ModelDosen;

class Dosen extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelDosen = new ModelDosen();
    }

    public function index()
    {
        $data = [
            'title' => 'Dosen',
            'dosen' => $this->ModelDosen->allData(),
            'isi'   => 'admin/dosen/index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Dosen',
            'isi'   => 'admin/dosen/add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        $dosenValid = [
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'foto_dosen' => [
                'label' => 'Foto Dosen',
                'rules' => 'uploaded[foto_dosen]|max_size[foto_dosen,2024]|mime_in[foto_dosen,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($dosenValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto_dosen');
            //mengganti nama 
            $nameFoto = $foto->getRandomName();

            $data = [
                'kode_dosen' => $this->request->getPost('kode_dosen'),
                'nidn' => $this->request->getPost('nidn'),
                'nama_dosen' => $this->request->getPost('nama_dosen'),
                'password' => $this->request->getPost('password'),
                'foto_dosen' => $nameFoto,
            ];
            // memindahkan lokasi foto
            $foto->move('fotodosen', $nameFoto);

            $this->ModelDosen->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('dosen'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/add'));
        }
    }

    public function edit($id_dosen)
    {
        $data = [
            'title' => 'Edit Dosen',
            'dosen' => $this->ModelDosen->detailData($id_dosen),
            'isi'   => 'admin/dosen/edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_dosen)
    {
        $dosenValid = [
            'kode_dosen' => [
                'label' => 'Kode Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'nidn' => [
                'label' => 'NIDN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'nama_dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'foto_dosen' => [
                'label' => 'Foto Dosen',
                'rules' => 'max_size[foto_dosen,2024]|mime_in[foto_dosen,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($dosenValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto_dosen');

            if ($foto->getError() == 4) {
                $data = [
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                ];
                $this->ModelDosen->edit($data);
            } else {
                //menghapus foto lama
                $dosen = $this->ModelDosen->detailData($id_dosen);
                if ($dosen['foto_dosen'] != "") {
                    unlink('fotodosen/' . $dosen['foto_dosen']);
                }
                //mengganti nama 
                $nameFoto = $foto->getRandomName();

                // memindahkan lokasi foto
                $foto->move('fotodosen', $nameFoto);

                $data = [
                    'id_dosen' => $id_dosen,
                    'kode_dosen' => $this->request->getPost('kode_dosen'),
                    'nidn' => $this->request->getPost('nidn'),
                    'nama_dosen' => $this->request->getPost('nama_dosen'),
                    'password' => $this->request->getPost('password'),
                    'foto_dosen' => $nameFoto,
                ];

                $this->ModelDosen->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');

            return redirect()->to(base_url('dosen'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('dosen/edit/' . $id_dosen));
        }
    }

    public function delete($id_dosen)
    {
        //menghapus foto lama
        $dosen = $this->ModelDosen->detailData($id_dosen);
        if ($dosen['foto_dosen'] != "") {
            unlink('fotodosen/' . $dosen['foto_dosen']);
        }

        $data = [
            'id_dosen'   => $id_dosen,
        ];

        $this->ModelDosen->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('dosen'));
    }
}
