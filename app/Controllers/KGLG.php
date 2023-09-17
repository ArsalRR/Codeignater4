<?php

namespace App\Controllers;
use App\Models\KglgModel;

class KGLG extends BaseController
{
    public function __construct()
    {
        $this->KglgModel = new KglgModel();
    }
    protected $KglgModel;
    public function index()
    {
        $tampildata = $this->KglgModel->findAll();
        $data =[
            'tampildata' => $tampildata
        ];

        return view('KelolaLaporanGudang/laporangudang',$data);
    }
    public function formtambah()
    {
        return view('KelolaGudang/KelolaLaporanGudang/formtambah');
    }
    public function simpandata()
    {
        $namastok = $this->request->getvar('namastok');
       $validation = \Config\Services::validation();
       $valid =$this->validate([
        'namastok'=>[
            'rules' =>'required',
            'label' => 'Nama Stok Gudang',
            'errors'=> [
                'required' => '{field} tidak boleh kosong'
            ]
        ]
       ]);
       if (!$valid) {
       $pesan =[
        'errorNamaStok'=>'<br><div class="alert-danger">'.$validation->getError().'</div>'
       ];
       session()->setFlashdata($pesan);
       return redirect()->to('/KelolaGudang/formtambah');
       } else{
        $this->KelolaGudang->insert([
            'nama_produk' => $namastok
        ]);
        $pesan =[
            'sukses'=> '<div class="alert-secondary">Data Berhasil disimpan</div>'
           ];
           session()->setFlashdata($pesan);
           return redirect()->to('KelolaGudang/index');
       }
}
}