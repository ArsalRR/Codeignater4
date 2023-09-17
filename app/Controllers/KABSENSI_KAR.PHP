<?php

namespace App\Controllers;

use App\Models\Kabsensi_karModel;
use App\Models\Kdata_karModel;

class KABSENSI_KAR extends BaseController
{
    public function __construct()
    {
        $this->Kabsensi_karModel = new Kabsensi_karModel();
    }
    protected $Kabsensi_karModel;

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
        $absensi_karyawan = $this->Kabsensi_karModel->findAll();
        $data = [
            'tampildata' => $absensi_karyawan
        ];

        return view('KelolaAbsensiKaryawan/absensikaryawan', $data);
    }

    public function formtambah()
    {
        $data_karyawan = new Kdata_karModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'data_karyawan' => $data_karyawan->findAll(),
            'absensi_karyawan' => $this->Kabsensi_karModel->findAll()
        ];
        return view('KelolaAbsensiKaryawan/formtambah', $data);
    }

    public function simpandata()
    {
        $slug = url_title($this->request->getVar('id_karyawan'), '-', true);
        $this->Kabsensi_karModel->save([
            'id_karyawan'     => $this->request->getVar('id_karyawan'),
            'slug' => $slug,
            'nama' => $this->request->getVar('nama'),
            'posisi'  => $this->request->getVar('posisi'),
            'jam_masuk'  => $this->request->getVar('jam_masuk'),
            'jam_kerja'  => $this->request->getVar('jam_kerja'),
            'tanggal_kerja'  => $this->request->getVar('tanggal_kerja'),
            'jam_pulang'  => $this->request->getVar('jam_pulang'),
             'status_kehadiran'  => $this->request->getVar('status_kehadiran')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/KABSENSI_KAR');
    }

    public function delete($id)
    {
        $this->Kabsensi_karModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/KABSENSI_KAR');
    }
    public function update($id)
    {

        $slug = url_title($this->request->getVar('id_karyawan'), '-', true);
        $this->Kabsensi_karModel->save([
            'id'        => $id,
            'id_karyawan'     => $this->request->getVar('id_karyawan'),
            'slug'      => $slug,
            'nama'   => $this->request->getVar('nama'),
            'posisi'  => $this->request->getVar('posisi'),
            'jam_masuk'  => $this->request->getVar('jam_masuk'),
            'jam_kerja'  => $this->request->getVar('jam_kerja'),
            'tanggal_kerja'  => $this->request->getVar('tanggal_kerja'),
            'jam_pulang'  => $this->request->getVar('jam_pulang'),

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/KABSENSI_KAR');
    }
    public function fromedit($id)
    {
        $data_karyawan = new Kdata_karModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'data_karyawan' => $data_karyawan->findAll(),
            'absensi_karyawan' => $this->Kabsensi_karModel->getProduksi($id)
        ];

        return view('KelolaAbsensiKaryawan/formedit', $data);
    }
}
