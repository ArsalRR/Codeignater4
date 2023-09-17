<?php

namespace App\Controllers;

use App\Models\NpModel;
Use Dompdf\Dompdf;

class NP extends BaseController
{
    public function index()
    {
        $NpModel = new NpModel();
        $tampildata = $NpModel->findAll();
        $data = [
            'tampildata' => $tampildata
        ];

        return view('NomorPesanan/nomorpesanan', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => "Tambah Data Nomor Pesanan"
        ];
        return view('NomorPesanan/tambah', $data);
    }

    public function add()
    {
        $NpModel = new NpModel();
        $data = [
            'id_pesanan' => $this->request->getVar('id'),
            'tgl_pesanan' => $this->request->getVar('tanggal'),
            'nama_pelanggan' => $this->request->getVar('nama'),
            'total_harga' => $this->request->getVar('harga'),
            'alamat_tujuan' => $this->request->getVar('alamat'),
            'ekspedisi' => $this->request->getVar('ekspedisi'),
            'tgl_pengiriman' => $this->request->getVar('tgl_pengiriman'),
        ];
        $NpModel->insert($data);
        return redirect()->to('NP');
    }

    public function edit($id)
    {
        $NpModel = new NpModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => "Edit Kelola Pesanan",
            'np' => $NpModel->getDataByID($id)->getRow()
        ];
        return view('NomorPesanan/edit', $data);
    }

    public function update($id)
    {
        $NpModel = new NpModel();
        $data = [
            $id                 => $this->request->getVar('id'),
            'id_pesanan'        => $id,
            'tgl_pesanan'       => $this->request->getVar('tanggal'),
            'nama_pelanggan'    => $this->request->getVar('nama'),
            'total_harga'       => $this->request->getVar('harga'),
            'alamat_tujuan' => $this->request->getVar('alamat'),
            'ekspedisi' => $this->request->getVar('ekspedisi'),
            'tgl_pengiriman' => $this->request->getVar('tgl_pengiriman'),
        ];
        $NpModel->update($id, $data);
        return redirect()->to('NP');
    }


    public function hapus($id)
    {
        $NpModel = new NpModel();
        $getData = $NpModel->getDataByID($id)->getRow();
        if (isset($getData)) {
            $NpModel->hapusData($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/NP');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/NP');
        }
        return redirect()->to('NP');
    }

    public function cetakLaporan()
    {
       
        $NpModel = new NpModel();
        $tampildata = $NpModel->findAll();
        $data = [
            'tampildata' => $tampildata
        ];


        $html = view('NomorPesanan/laporan', $data);
        
        // instantiate and use the dompdf class
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');
        
        // Render the HTML as PDF
        $dompdf->render();
        
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
