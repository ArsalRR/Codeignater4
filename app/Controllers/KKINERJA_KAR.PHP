<?php

namespace App\Controllers;

use App\Models\Kkinerja_karModel;
use App\Models\Kdata_karModel;

class KKINERJA_KAR extends BaseController
{
    public function __construct()
    {
        $this->Kkinerja_karModel = new Kkinerja_karModel();
    }
    protected $Kkinerja_karModel;

    public function index()
    {
        //Membuat kondisi pencarian
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            //  session()->set('cari_satuan',$cari);
            redirect()->to('/KelolaKaryawan/index');
        } else {
            $cari = session()->get('cari_satuan');
        }
        $kinerja_karyawan = $this->Kkinerja_karModel->findAll();
        $data = [
            'tampildata' => $kinerja_karyawan
        ];

        return view('KelolaKinerjaKaryawan/kinerjakaryawan', $data);
    }

    

    public function formtambah()
    {
        $data_karyawan = new Kdata_karModel();
        $data = [
            'title' => 'Form Tambah Data Kinerja Karyawan',
            'validation' => \Config\Services::validation(),
            'karyawan' => $data_karyawan->findAll(),
            'data_karyawan' => $this->Kkinerja_karModel->findAll()
        ];
        return view('KelolaKinerjaKaryawan/fromtambah', $data);
    }

    public function simpandata()
    {
        if (!$this->validate([
            'id_karyawan' => [
                'rules' => 'required|is_unique[kinerja_karyawan.id_karyawan]',
                'errors' => [
                    'required' => 'id karyawan harus di isi.',
                    'is_unique' => 'idkaryawan sudah terdaftar'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/KKINERJA_KAR/formtambah')->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('id_karyawan'), '-', true);
        $this->Kkinerja_karModel->save([
            'id_karyawan'     => $this->request->getVar('id_karyawan'),
            'slug'      => $slug,
            'nama'   => $this->request->getVar('nama'),
            'hasil_kerja'  => $this->request->getVar('hasil_kerja'),
            'pengetahuan_pekerjaan'  => $this->request->getVar('pengetahuan_pekerjaan'),
            'disiplin_absensi'  => $this->request->getVar('disiplin_absensi'),
            'total'  => $this->request->getVar('total')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/KKINERJA_KAR');
    }

    public function delete($id)
    {
        $this->Kkinerja_karModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/KKINERJA_KAR');
    }
    public function update($id)
    {

        $slug = url_title($this->request->getVar('id_karyawan'), '-', true);
        $this->Kkinerja_karModel->save([
            'id'        => $id,
            'id_karyawan'     => $this->request->getVar('id_karyawan'),
            'slug'      => $slug,
            'nama'   => $this->request->getVar('nama'),
            'hasil_kerja'  => $this->request->getVar('hasil_kerja'),
            'pengetahuan_pekerjaan'  => $this->request->getVar('pengetahuan_pekerjaan'),
            'disiplin_absensi'  => $this->request->getVar('disiplin_absensi'),
            'total'  => $this->request->getVar('total'),


        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/KKINERJA_KAR');
    }
    public function fromedit($id)
    {
        $data_karyawan = new Kdata_karModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'data_karyawan' => $data_karyawan->findAll(),
            'kinerja_karyawan' => $this->Kkinerja_karModel->getProduksi($id)
        ];

        return view('KelolaKinerjaKaryawan/fromedit', $data);
    }

    public function laporan()
    {
        $tanggalawal = $this->request->getPost('tanggalawal');
        $tanggalakhir = $this->request->getPost('tanggalakhir');
        if ($tanggalawal && $tanggalakhir) {
            $kinerja_karyawan = $this->Kkinerja_karModel->where('tanggal_kerja >=', $tanggalawal)->where('tanggal_kerja <=', $tanggalakhir)->findAll();
        } else {
            $kinerja_karyawan = $this->Kkinerja_karModel->findAll();
        }
        $data = [
            'tampildata' => $kinerja_karyawan,

        ];
        return view('KelolaKinerjaKaryawan/laporan', $data);
    }
}