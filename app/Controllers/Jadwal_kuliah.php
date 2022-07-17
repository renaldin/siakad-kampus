<?php

namespace App\Controllers;

use App\Models\ModelTahunAkademik;
use App\Models\ModelProdi;
use App\Models\ModelJadwalKuliah;
use App\Models\ModelDosen;
use App\Models\ModelRuangan;

class Jadwal_kuliah extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelTahunAkademik = new ModelTahunAkademik();
        $this->ModelProdi = new ModelProdi();
        $this->ModelJadwalKuliah = new ModelJadwalKuliah();
        $this->ModelDosen = new ModelDosen();
        $this->ModelRuangan = new ModelRuangan();
    }

    public function index()
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'tahun_akademik_aktif' => $this->ModelTahunAkademik->tahun_akademik_aktif(),
            'prodi' => $this->ModelProdi->allData(),
            'isi'   => 'admin/jadwalkuliah/index'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function detailjadwal($id_prodi)
    {
        $data = [
            'title' => 'Jadwal Kuliah',
            'tahun_akademik_aktif' => $this->ModelTahunAkademik->tahun_akademik_aktif(),
            'prodi' => $this->ModelProdi->detailData($id_prodi),
            'jadwal' => $this->ModelJadwalKuliah->allData($id_prodi),
            'matkul' => $this->ModelJadwalKuliah->matkul($id_prodi),
            'dosen' => $this->ModelDosen->allData(),
            'kelas' => $this->ModelJadwalKuliah->kelas($id_prodi),
            'ruangan' => $this->ModelRuangan->allData(),
            'isi'   => 'admin/jadwalkuliah/detail'
        ];
        return view('layout/v_wrapper', $data);
    }

    public function add($id_prodi)
    {
        $jadwalValid = [
            'id_mata_kuliah' => [
                'label' => 'Mata Kuliah',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib pilih.'
                ]
            ],
            'id_dosen' => [
                'label' => 'Dosen',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib pilih.',
                ]
            ],
            'id_kelas' => [
                'label' => 'Kelas',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib pilih.'
                ]
            ],
            'hari' => [
                'label' => 'Hari',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'waktu' => [
                'label' => 'Waktu',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
            'id_ruangan' => [
                'label' => 'ruangan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib pilih.'
                ]
            ],
            'quota' => [
                'label' => 'Quota',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib diisi.'
                ]
            ],
        ];

        if ($this->validate($jadwalValid)) {
            //jika valid
            $tahun_akademik = $this->ModelTahunAkademik->tahun_akademik_aktif();

            $data = [
                'id_prodi' => $id_prodi,
                'id_tahun_akademik' => $tahun_akademik['id_tahun_akademik'],
                'id_kelas' => $this->request->getPost('id_kelas'),
                'id_mata_kuliah' => $this->request->getPost('id_mata_kuliah'),
                'id_dosen' => $this->request->getPost('id_dosen'),
                'hari' => $this->request->getPost('hari'),
                'waktu' => $this->request->getPost('waktu'),
                'id_ruangan' => $this->request->getPost('id_ruangan'),
                'quota' => $this->request->getPost('quota'),
            ];
            $this->ModelJadwalKuliah->add($data);
            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!!');

            return redirect()->to(base_url('jadwal_kuliah/detailjadwal/' . $id_prodi));
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \config\Services::validation()->getErrors());
            return redirect()->to(base_url('jadwal_kuliah/detailjadwal/' . $id_prodi));
        }
    }

    public function delete($id_jadwal, $id_prodi)
    {
        $data = [
            'id_jadwal'   => $id_jadwal,
        ];

        $this->ModelJadwalKuliah->delete_data($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!!');

        return redirect()->to(base_url('jadwal_kuliah/detailjadwal/' . $id_prodi));
    }
}
