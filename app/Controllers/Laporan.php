<?php

namespace App\Controllers;

use App\Models\LModel;

class Laporan extends BaseController
{
    public function index()
    {
        $LModel = new LModel();
        $tampildata = $LModel->findAll();
        $data = [
            'tampildata' => $tampildata
        ];

        return view('Laporan/laporan', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Tambah Data Kelola Laporan"
        ];
        return view('Laporan/tambah', $data);
    }

    public function add()
    {
        $LModel = new LModel();
        $data = [
            'id_pesanan' => $this->request->getVar('id'),
            'tgl_laporan' => $this->request->getVar('tanggal'),
            'nama_pelanggan' => $this->request->getVar('nama'),
            'total_harga' => $this->request->getVar('harga'),
            'status_pembayaran' => $this->request->getVar('status'),
        ];
        $LModel->insert($data);
        return redirect()->to('L');
    }

    public function edit($id)
    {
        $LModel = new LModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => "Edit Kelola Pesanan",
            'l' => $LModel->getDataByID($id)->getRow()
        ];
        return view('Laporan/edit', $data);
    }


    public function update($id)
    {
        $LModel = new LModel();
        $data = [
            'id_pesanan' => $this->request->getVar('id'),
            'tgl_laporan' => $this->request->getVar('tanggal'),
            'nama_pelanggan' => $this->request->getVar('nama'),
            'total_harga' => $this->request->getVar('harga'),
            'status_pembayaran' => $this->request->getVar('status'),
        ];
        $LModel->update($id, $data);
        return redirect()->to('L');
    }


    public function hapus($id)
    {
        $LModel = new LModel();
        $getData = $LModel->getDataByID($id)->getRow();
        if (isset($getData)) {
            $LModel->hapusData($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/L');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/L');
        }
        return redirect()->to('L');
    }
}
