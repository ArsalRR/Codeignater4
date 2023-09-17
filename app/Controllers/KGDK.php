<?php

namespace App\Controllers;

use App\Models\KgdkModel;
use App\Models\KgModel;

class KGDK extends BaseController
{
    public function __construct()
    {
        $this->KgdkModel = new KgdkModel();
        $this->KgModel = new KgModel();
    }
    protected $KgdkModel;
    public function index()
    {
        $tampildata = $this->KgdkModel->jointabledatakeluar();
        $data = [
            'tampildata' => $tampildata
        ];

        return view('KelolaDataKeluar/datakeluar', $data);
    }
    public function formtambah()
    {
        $KgModel = new KgModel();
        $data = [
            'title' => 'Form Tambah Data Keluar',
            'stok_gudang' => $KgModel->findAll()

        ];
        return view('KelolaDataKeluar/formtambah', $data);
    }

  public function simpan()
{
    $nama_produk = $this->request->getVar('nama_produk');
    $harga = $this->request->getVar('harga');
    $jumlahkeluar = $this->request->getVar('jumlahkeluar');
    $tanggal_keluar = $this->request->getVar('tanggal_keluar');
    $kondisi_produk = $this->request->getVar('kondisi_produk');

    // Get the jumlahmasuk from stok_gudang
    $stok = $this->KgModel->getStokByNamaProduk($nama_produk);

    if ($stok['jumlahmasuk'] < $jumlahkeluar) {
        // Jumlah keluar is greater than jumlah masuk, display an error message
        session()->setFlashdata('error', 'Jumlah barang keluar melebihi jumlah barang masuk.');
        return redirect()->back()->withInput();
    }

    // Simpan data ke tabel datamasuk_gudang
    $this->KgdkModel->save([
        'nama_produk' => $nama_produk,
        'harga' => $harga,
        'jumlahkeluar' => $jumlahkeluar,
        'tanggal_keluar' => $tanggal_keluar,
        'kondisi_produk' => $kondisi_produk
    ]);

    // Update jumlahmasuk di tabel stok_gudang
    $this->KgModel->minus_stok($jumlahkeluar, $nama_produk);

    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

    return redirect()->to('/KGDK');
}

     public function edit($idkeluar)
    {
        // Load the model
        $model = new KgdkModel();

        // Get the record to edit
        $data['stok'] = $model->find($idkeluar);

        // Pass the data to the view for editing
        return view('KelolaDataKeluar/formedit', $data);
    }

    public function update($idkeluar)
    {
        // Load the model
        $model = new KgdkModel();

        // Get the updated data from the form
        $updatedData = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jumlahkeluar' => $this->request->getPost('jumlahkeluar'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'harga' => $this->request->getPost('harga'),
            'kondisi_produk' => $this->request->getPost('kondisi_produk')
        ];

        // Update the record
        $model->update($idkeluar, $updatedData);

        // Redirect to the index page or any other page after updating
        return redirect()->to('/KGDK');
    }

    public function delete($idkeluar)
    {
        // Load the model
        $model = new KgdkModel();

        // Delete the record
        $model->delete($idkeluar);

        // Redirect to the index page or any other page after deletion
        return redirect()->to('/KGDK');
    }
}