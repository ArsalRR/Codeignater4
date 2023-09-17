<?php

namespace App\Controllers;

use App\Models\KgdmModel;
use App\Models\KgModel;

class KGDM extends BaseController
{
    public function __construct()
    {
        $this->KgdmModel = new KgdmModel();
        $this->KgModel = new KgModel();
    }

    public function index()
    {
        $tampildata = $this->KgdmModel->jointabledatamasuk();
        $data = [
            'tampildata' => $tampildata
        ];

        return view('KelolaDataMasuk/datamasuk', $data);
    }

    public function formtambah()
    {   
        $KgModel = new KgModel();
        $data = [
            'title' => 'Form Tambah Data Masuk',
            'stok_gudang' => $KgModel->findAll()

        ];
        return view('KelolaDataMasuk/formtambah', $data);
    }

   public function simpan()
{
    $id_produk = $this->request->getVar('id_produk');
    $nama_produk = $this->request->getVar('nama_produk');
    $harga_satuan = $this->request->getVar('harga_satuan');
    $jumlahmasuk = $this->request->getVar('jumlahmasuk');
    $tanggal_masuk = $this->request->getVar('tanggal_masuk');
    $kondisi_produk = $this->request->getVar('kondisi_produk');

    // Simpan data ke tabel datamasuk_gudang
    $this->KgdmModel->save([
        'id_produk' => $id_produk,
        'nama_produk' => $nama_produk,
        'harga_satuan' => $harga_satuan,
        'jumlahmasuk' => $jumlahmasuk,
        'tanggal_masuk' => $tanggal_masuk,
        'kondisi_produk' => $kondisi_produk
    ]);

    // Update jumlahmasuk di tabel stok_gudang
    $this->KgModel->plus_stok($jumlahmasuk, $nama_produk);

    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');

    return redirect()->to('/KGDM');
}

     public function edit($idmasuk)
    {
        // Load the model
        $model = new KGDMModel();

        // Get the record to edit
        $data['stok'] = $model->find($idmasuk);

        $KgModel = new KgModel();
        $data['stok_gudang'] = $KgModel->findAll();

        // Pass the data to the view for editing
        return view('KelolaDataMasuk/formedit', $data);
    }

    public function update($idmasuk)
    {
        // Load the model
        $model = new KGDMModel();

        // Get the updated data from the form
        $updatedData = [
            'id_produk' => $this->request->getPost('id_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jumlahmasuk' => $this->request->getPost('jumlahmasuk'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'kondisi_produk' => $this->request->getPost('kondisi_produk')
        ];

        // Update the record
        $model->update($idmasuk, $updatedData);

        // Redirect to the index page or any other page after updating
        return redirect()->to('/KGDM');
    }

    public function delete($idmasuk)
    {
        // Load the model
        $model = new KGDMModel();

        // Delete the record
        $model->delete($idmasuk);

        // Redirect to the index page or any other page after deletion
        return redirect()->to('/KGDM');
    }
}