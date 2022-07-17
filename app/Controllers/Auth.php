<?php

namespace App\Controllers;

use App\Models\ModelAuth;

class Auth extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->ModelAuth = new ModelAuth();
    }

    public function index()
    {
        $data = [
            'title' => 'Login',
            'isi'   => 'v_login'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function cek_login()
    {

        $loginValid = [
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'level' => [
                'label' => 'Hak akses',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ],
            ],
        ];

        if ($this->validate($loginValid)) {
            //jika valid
            $level = $this->request->getPost('level');

            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($level == 1) {
                $cek_user = $this->ModelAuth->login_user($username, $password);
                if ($cek_user) {
                    //jika data cocok
                    session()->set('username', $cek_user['username']);
                    session()->set('nama', $cek_user['nama_user']);
                    session()->set('foto', $cek_user['foto']);
                    session()->set('level', $level);

                    return redirect()->to(base_url('admin'));
                } else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                    return redirect()->to(base_url('Auth/index'));
                }
            } else if ($level == 2) {
                $cek_mahasiswa = $this->ModelAuth->login_mahasiswa($username, $password);
                if ($cek_mahasiswa) {
                    //jika data cocok
                    session()->set('username', $cek_mahasiswa['nim']);
                    session()->set('nama', $cek_mahasiswa['nama_mahasiswa']);
                    session()->set('foto', $cek_mahasiswa['fotomahasiswa']);
                    session()->set('level', $level);

                    return redirect()->to(base_url('mhs'));
                } else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                    return redirect()->to(base_url('Auth/index'));
                }
            } else if ($level == 3) {
                $cek_dosen = $this->ModelAuth->login_dosen($username, $password);
                if ($cek_dosen) {
                    //jika data cocok
                    session()->set('username', $cek_dosen['nidn']);
                    session()->set('nama', $cek_dosen['nama_dosen']);
                    session()->set('foto', $cek_dosen['foto_dosen']);
                    session()->set('level', $level);

                    return redirect()->to(base_url('dsn'));
                } else {
                    //jika data tidak cocok
                    session()->setFlashdata('pesan', 'Login gagal!!! Username atau password salah.');
                    return redirect()->to(base_url('Auth/index'));
                }
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/index'));
        }
    }

    public function logout()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('nama');
        session()->remove('foto');
        session()->remove('level');

        session()->setFlashdata('success', 'Logout Berhasil !!!');
        return redirect()->to(base_url('Auth/index'));
    }
}
