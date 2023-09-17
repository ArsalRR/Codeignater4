<?php

namespace App\Controllers;

use App\Models\KgModel;
use App\Models\KgdkModel;
use App\Models\KgdmModel;

class KG extends BaseController
{
    public function __construct()
    {
        $this->KgModel = new KgModel();
    }
    protected $KgModel;
    public function index()
    {
        $tampildata = $this->KgModel->findAll();
        $data = [
            'tampildata' => $tampildata
        ];

        return view('KelolaStokGudang/stokgudang', $data);
    }
    public function formtambah()
    {
        $data = [
            'title' => 'Form Tambah Data stok'];
        $KgdkModel = new KgdkModel();
        $data['produkKeluar'] = $KgdkModel->getProdukKeluar();
        $KgdmModel = new KgdmModel();
        $data['produkMasuk'] = $KgdmModel->getProdukMasuk();

        return view('KelolaStokGudang/formtambah', $data);
    }
    
    public function simpan()
    {
        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->KgModel->save([
            'slug' =>         $slug,
            'Id_produk' => $this->request->getVar('id_produk'),
            'nama_produk' => $this->request->getVar('nama_produk'),
            'jumlahmasuk' => $this->request->getVar('jumlahmasuk'),
            'jumlahkeluar' => $this->request->getVar('jumlahkeluar'),
            'harga_satuan' => $this->request->getVar('harga_satuan'),
            'tanggal_masuk' => $this->request->getVar('tanggal_masuk'),
            'tanggal_keluar' => $this->request->getVar('tanggal_keluar'),
            'kondisi_produk' => $this->request->getVar('kondisi_produk')

        ]);

        session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
        return redirect()->to('/KG');
    }

    public function formedit($id)
    {
        $data['stok'] = $this->KgModel->find($id);
        $KgdkModel = new KgdkModel();
        $data['produkKeluar'] = $KgdkModel->getProdukKeluar();
        $KgdmModel = new KgdmModel();
        $data['produkMasuk'] = $KgdmModel->getProdukMasuk();

        return view('KelolaStokGudang/formedit', $data);
    }

    public function update($id)
    {
        $data = [
            'id_produk' => $this->request->getPost('id_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'jumlahmasuk' => $this->request->getPost('jumlahmasuk'),
            'jumlahkeluar' => $this->request->getPost('jumlahkeluar'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'kondisi_produk' => $this->request->getPost('kondisi_produk')
        ];

        $this->KgModel->update($id, $data);

        return redirect()->to('/KG')->with('success', 'Data stok berhasil diubah.');
    }

    public function delete($id)
    {
        $this->KgModel->delete($id);

        return redirect()->to('/KG')->with('success', 'Data stok berhasil dihapus.');
    }
}
