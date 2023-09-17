<?php

namespace App\Controllers;

use App\Models\Kdata_karModel;

class KDATA_KAR extends BaseController
{
    public function __construct()
    {
        $this->Kdata_karModel = new Kdata_karModel();
    }
    protected $Kdata_karModel;

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
        $data_karyawan = $this->Kdata_karModel->findAll();
        $data = [
            'tampildata' => $data_karyawan
        ];

        return view('KelolaDataKaryawan/datakaryawan', $data);
    }

    public function formtambah()
    {
        $data = [
            'title' => 'Form Tambah Data Karyawan',
            'validation' => \Config\Services::validation(),
            'data_karyawan' => $this->Kdata_karModel->findAll()
        ];
        return view('KelolaDataKaryawan/formtambah', $data);
    }

    public function simpandata()
    {
        if (!$this->validate([
            'id_karywan' => [
                'rules' => 'required|is_unique[data_karyawan.id_karywan]',
                'errors' => [
                    'required' => 'ID Karyawan harus di isi.',
                    'is_unique' => 'ID Karyawan sudah terdaftar'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/KDATA_KAR/formtambah')->withInput()->with('validation', $validation->getErrors());
        }
        $slug = url_title($this->request->getVar('id_karywan'), '-', true);
        $this->Kdata_karModel->save([
            'id_karywan'     => $this->request->getVar('id_karywan'),
            'slug'      => $slug,
            'nama'   => $this->request->getVar('nama'),
            'posisi'  => $this->request->getVar('posisi'),
            'alamat'  => $this->request->getVar('alamat'),
            'status'  => $this->request->getVar('status'),
            'gaji'  => $this->request->getVar('gaji'),
            'jenis_kelamin'  => $this->request->getVar('jenis_kelamin'),

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/KDATA_KAR');
    }

    public function delete($id)
    {
        $this->Kdata_karModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/KDATA_KAR');
    }
    public function update($id)
    {
        $slug = url_title($this->request->getVar('id_karyawan'), '-', true);
        $this->Kdata_karModel->save([
            'id' => $id,
            'id_karywan' => $this->request->getVar('id_karyawan'),
            'slug'      => $slug,
            'nama'   => $this->request->getVar('nama'),
            'posisi'  => $this->request->getVar('posisi'),
            'alamat'  => $this->request->getVar('alamat'),
            'status'  => $this->request->getVar('status'),
            'gaji'  => $this->request->getVar('gaji'),
            'jenis_kelamin'  => $this->request->getVar('jenis_kelamin'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/KDATA_KAR');
    }
    public function fromedit($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'data_karyawan' => $this->Kdata_karModel->getProduksi($id)
        ];

        return view('KelolaDataKaryawan/fromedit', $data);
    }
}