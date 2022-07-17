<?php

namespace App\Controllers;
use App\Models\ModelUser;


class User extends BaseController {

    public function __construct()
    {
        helper('form');
        $this->ModelUser = new ModelUser();
    }
    

    public function index()
    {
        $data = [
            'title'     => 'User',
            'user'  => $this->ModelUser->allData(),
            'isi'       => 'admin/user'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $userValid = [
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required|is_unique[user.username]',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                    'is_unique' => '{field} sudah ada. Silahkan input yang lain!!!.'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'uploaded[foto]|max_size[foto,2024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'uploaded' => '{field} wajib diisi.',
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($userValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto');
            //mengganti nama 
            $nameFoto = $foto->getRandomName();

            $data = [
                'nama_user' => $this->request->getPost('nama_user'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'foto' => $nameFoto,
            ];
            // memindahkan lokasi foto
            $foto->move('foto', $nameFoto);
    
            $this->ModelUser->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');
    
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function edit($id_user)
    {
        $userValid = [
            'nama_user' => [
                'label' => 'Nama User',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,2024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
                'errors' => [
                    'max_size' => '{field} Maksimal Ukurannya 2 MB',
                    'max_size' => 'Format {field} Wajib PNG/JPG/JPEG',
                ]
            ],
        ];

        if ($this->validate($userValid)) {
            //jika valid
            //mengambil data foto di form
            $foto = $this->request->getFile('foto');

            if ($foto->getError() == 4) {
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                ];
                $this->ModelUser->edit($data);
            } else {
                //menghapus foto lama
                $user = $this->ModelUser->detailData($id_user);
                if ($user['foto'] != "") {
                    unlink('foto/'.$user['foto']);
                }
                //mengganti nama 
                $nameFoto = $foto->getRandomName();

                // memindahkan lokasi foto
                $foto->move('foto', $nameFoto);
        
                $data = [
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'foto' => $nameFoto,
                ];

                $this->ModelUser->edit($data);
            }

            session()->setFlashdata('pesan', 'Data Berhasil Diedit!!!');
    
            return redirect()->to(base_url('user'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('user'));
        }
    }

    public function delete($id_user)
    {
        //menghapus foto lama
        $user = $this->ModelUser->detailData($id_user);
        if ($user['foto'] != "") {
            unlink('foto/'.$user['foto']);
        }
        
        $data = [
            'id_user'   => $id_user,
        ];

        $this->ModelUser->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('user'));
    }
}