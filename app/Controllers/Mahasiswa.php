<?php

namespace App\Controllers;

use App\Models\ModelMahasiswa;
use App\Models\ModelProdi;

class Mahasiswa extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelMahasiswa = new ModelMahasiswa();
        $this->ModelProdi = new ModelProdi();
    }
    public function index()
    {
        $data = [
            'title' => 'Mahasiswa',
            'mahasiswa' => $this->ModelMahasiswa->allData(),
            'isi'   => 'admin/mahasiswa/index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Mahasiswa',
            'prodi' => $this->ModelProdi->allData(),
            'isi'   => 'admin/mahasiswa/add'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function insert()
    {
        $mahasiswaValid = [
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'nama_mahasiswa' => [
                'label' => 'Nama Mahasiswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'id_prodi' => [
                'label' => 'Program Studi',
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
            'fotomahasiswa' => [
                'label' => 'Foto Mahasiswa',
                'rules' => 'uploaded[fotomahasiswa]|max_size[fotomahasiswa,2024]|mime_in[fotomahasiswa,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($mahasiswaValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('fotomahasiswa');
            //mengganti nama 
            $nameFoto = $foto->getRandomName();

            $data = [
                'nim' => $this->request->getPost('nim'),
                'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                'id_prodi' => $this->request->getPost('id_prodi'),
                'password' => $this->request->getPost('password'),
                'fotomahasiswa' => $nameFoto,
            ];
            // memindahkan lokasi foto
            $foto->move('fotomahasiswa', $nameFoto);

            $this->ModelMahasiswa->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('mahasiswa'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/add'));
        }
    }

    public function edit($id_mahasiswa)
    {
        $data = [
            'title' => 'Edit Mahasiswa',
            'prodi' => $this->ModelProdi->allData(),
            'mahasiswa' => $this->ModelMahasiswa->detailData($id_mahasiswa),
            'isi'   => 'admin/mahasiswa/edit'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function update($id_mahasiswa)
    {
        $mahasiswaValid = [
            'nim' => [
                'label' => 'NIM',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'nama_mahasiswa' => [
                'label' => 'Nama Mahasiswa',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'id_prodi' => [
                'label' => 'Program Studi',
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
            'fotomahasiswa' => [
                'label' => 'Foto Mahasiswa',
                'rules' => 'max_size[fotomahasiswa,2024]|mime_in[fotomahasiswa,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($mahasiswaValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('fotomahasiswa');

            if ($foto->getError() == 4) {
                $data = [
                    'id_mahasiswa'  => $id_mahasiswa,
                    'nim' => $this->request->getPost('nim'),
                    'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                    'id_prodi' => $this->request->getPost('id_prodi'),
                    'password' => $this->request->getPost('password'),
                ];
                $this->ModelMahasiswa->edit($data);
            } else {
                //menghapus foto lama
                $mahasiswa = $this->ModelMahasiswa->detailData($id_mahasiswa);
                if ($mahasiswa['fotomahasiswa'] != "") {
                    unlink('fotomahasiswa/' . $mahasiswa['fotomahasiswa']);
                }
                //mengganti nama 
                $nameFoto = $foto->getRandomName();

                $data = [
                    'id_mahasiswa'  => $id_mahasiswa,
                    'nim' => $this->request->getPost('nim'),
                    'nama_mahasiswa' => $this->request->getPost('nama_mahasiswa'),
                    'id_prodi' => $this->request->getPost('id_prodi'),
                    'password' => $this->request->getPost('password'),
                    'fotomahasiswa' => $nameFoto,
                ];
                // memindahkan lokasi foto
                $foto->move('fotomahasiswa', $nameFoto);
                $this->ModelMahasiswa->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diubah!!!');
            return redirect()->to(base_url('mahasiswa'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('mahasiswa/edit/' . $id_mahasiswa));
        }
    }

    public function delete($id_mahasiswa)
    {
        //menghapus foto lama
        $mahasiswa = $this->ModelMahasiswa->detailData($id_mahasiswa);
        if ($mahasiswa['fotomahasiswa'] != "") {
            unlink('fotomahasiswa/' . $mahasiswa['fotomahasiswa']);
        }

        $data = [
            'id_mahasiswa'   => $id_mahasiswa,
        ];

        $this->ModelMahasiswa->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('mahasiswa'));
    }
}
