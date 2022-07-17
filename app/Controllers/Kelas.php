<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelDosen;
use App\Models\ModelProdi;

class Kelas extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelDosen = new ModelDosen();
        $this->ModelProdi = new ModelProdi();
    }
    public function index()
    {
        $data = [
            'title' => 'Kelas',
            'kelas' => $this->ModelKelas->allData(),
            'dosen' => $this->ModelDosen->allData(),
            'prodi' => $this->ModelProdi->allData(),
            'isi'   => 'admin/kelas/kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add()
    {
        $kelasValid = [
            'nama_kelas' => [
                'label' => 'Nama Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'id_prodi' => [
                'label' => 'Program Studi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'id_dosen' => [
                'label' => 'Nama Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'tahun_angkatan' => [
                'label' => 'Tahun Angkatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($kelasValid)) {
            //jika valid
            $data = [
                'nama_kelas' => $this->request->getPost('nama_kelas'),
                'id_prodi' => $this->request->getPost('id_prodi'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'tahun_angkatan' => $this->request->getPost('tahun_angkatan'),
            ];

            $this->ModelKelas->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('kelas'));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('kelas'));
        }
    }

    public function delete($id_kelas)
    {
        $data = [
            'id_kelas'   => $id_kelas,
        ];

        $this->ModelKelas->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('kelas'));
    }

    public function rincian_kelas($id_kelas)
    {
        $data = [
            'title' => 'Kelas',
            'kelas' => $this->ModelKelas->detail($id_kelas),
            'mhs'   => $this->ModelKelas->mahasiswa($id_kelas),
            'mhs_tpk'   => $this->ModelKelas->mahasiswa_tidak_ada_kelas($id_kelas),
            'jumlah_mahasiswa' => $this->ModelKelas->jumlah_mahasiswa($id_kelas),
            'isi'   => 'admin/kelas/rincian_kelas'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add_anggota_kelas($id_mahasiswa, $id_kelas)
    {
        $data = [
            'id_mahasiswa'   => $id_mahasiswa,
            'id_kelas' => $id_kelas
        ];

        $this->ModelKelas->update_mhs($data);
        session()->setFlashdata('pesan', 'Mahasiswa Berhasil Ditambahkan Ke Kelas!!!');

        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }

    public function remove_anggota_kelas($id_mahasiswa, $id_kelas)
    {
        $data = [
            'id_mahasiswa'   => $id_mahasiswa,
            'id_kelas' => null
        ];

        $this->ModelKelas->update_mhs($data);
        session()->setFlashdata('pesan', 'Mahasiswa Berhasil Dihapus Dari Kelas!!!');

        return redirect()->to(base_url('kelas/rincian_kelas/' . $id_kelas));
    }
}
