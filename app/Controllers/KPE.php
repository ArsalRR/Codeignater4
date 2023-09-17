<?php

namespace App\Controllers;

use App\Models\KpeModel;
use Dompdf\Dompdf;

class KPE extends BaseController
{
    public function index()
    {
        $KpeModel = new KpeModel();
        $tampildata = $KpeModel->findAll();
        $data = [
            'tampildata' => $tampildata
        ];

        return view('KelolaPesanan/kelolapesanan', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => "Tambah Data Kelola Pesanan"
        ];
        return view('KelolaPesanan/tambah', $data);
    }

    public function add()
    {
        $KpeModel = new KpeModel();
        $data = [
            'id_produk' => $this->request->getVar('id'),
            'invoice' => $this->request->getVar('invoice'),
            'pelangan' => $this->request->getVar('nama'),
            'produk' => $this->request->getVar('produk'),
            'harga' => $this->request->getVar('harga'),
            'qty' => $this->request->getVar('qty'),
            'satuan' => $this->request->getVar('satuan'),
            'create_at' => $this->request->getVar('tanggal'),
            'status' => $this->request->getVar('status'),
        ];
        $KpeModel->insert($data);
        return redirect()->to('KPE');
    }

    public function edit($id)
    {
        $KpeModel = new KpeModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => "Edit Kelola Pesanan",
            'kpe' => $KpeModel->getDataByID($id)->getRow()
        ];
        return view('KelolaPesanan/edit', $data);
    }

    public function update($id)
    {
        $KpeModel = new KpeModel();
        $data = [
            $id => $this->request->getPost('id'),
            'id_produk' => $id,
            'invoice' => $this->request->getVar('invoice'),
            'pelangan' => $this->request->getVar('nama'),
            'produk' => $this->request->getVar('produk'),
            'harga' => $this->request->getVar('harga'),
            'qty' => $this->request->getVar('qty'),
            'satuan' => $this->request->getVar('satuan'),
            'create_at' => $this->request->getVar('tanggal'),
            'status' => $this->request->getVar('status'),
        ];
        $KpeModel->update($id, $data);
        return redirect()->to('KPE');
    }



    public function hapus($id)
    {
        $KpeModel = new KpeModel();
        $getData = $KpeModel->getDataByID($id)->getRow();
        if (isset($getData)) {
            $KpeModel->hapusData($id);
            session()->setFlashData('pesan_hapus', "Data berhasil dihapus");
            return redirect()->to('/KPE');
        } else {
            session()->setFlashData('pesan_hapus', "Data gagal dihapus");
            return redirect()->to('/KPE');
        }
        return redirect()->to('KPE');
    }

    public function cetakLaporan()
    {
       
        $KpeModel = new KpeModel();
        $tampildata = $KpeModel->findAll();
        $data = [
            'tampildata' => $tampildata
        ];


        $html = view('KelolaPesanan/laporan', $data);
        
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
