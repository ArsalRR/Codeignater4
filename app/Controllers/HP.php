<?php

namespace App\Controllers;

use App\Models\HPModel;
use App\Models\JPModel;

class HP extends BaseController
{
    protected HPModel $HPModel;
    protected JPModel $JadwalProduksiModel;
    public function __construct()
    {
        $this->HPModel = new HPModel();
        $this->JadwalProduksiModel = new JPModel();
    }
    public function index()
    {
        $tombolcari = $this->request->getPost('tombolcari');

        if (isset($tombolcari)) {
            $cari = $this->request->getPost('cari');
            redirect()->to('/HP/index');
        } else {
            $cari = session()->get('cari_judul');
        }
        $tampildata = $this->HPModel->joinToJadwalProduksi()->findAll();
        $data = [
            'pager' => $this->HPModel->pager,
            'tampildata' => $tampildata
        ];

        return view('HasilProduksi/hasilproduksi', $data);
    }
    public function create()
    {
        $tampildata = $this->HPModel->joinToJadwalProduksi()->findAll();
        $jadwalModel = new JPModel();
        $data = [
            'tampildata' => $tampildata,
            'jadwals' => $jadwalModel->findAll(),
        ];
        return view('HasilProduksi/create', $data);
    }
    public function simpan()
    {    
        if ($this->request->getVar('jumlah_cacat') > $this->request->getVar('jumlah_produksi')) {
            session()->setFlashdata('alert_danger', 'Jumlah Produksi tidak memenuhi');
            return redirect()->back();
        } else {
            $this->HPModel->save([
                'jumlah_produksi'     => $this->request->getVar('jumlah_produksi'),
                'jumlah_cacat'   => $this->request->getVar('jumlah_cacat'),
                'jumlah_sukses'  => $this->request->getVar('jumlah_produksi') - $this->request->getVar('jumlah_cacat'),
                'total_produksi'  => $this->request->getVar('total_produksi'),
                'keterangan'  => $this->request->getVar('keterangan'),
                'id_jadwal'  => $this->request->getVar('id_jadwal')
            ]);
            session()->setFlashdata('alert_success', 'Berhasil menambah Hasil Produksi');            
            return redirect()->to('HP');
        }
    }
    public function delete($id)
    {
        $this->HPModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/HP/index');
    }
    public function update($id)
    {
        if ($this->request->getVar('jumlah_cacat') > $this->request->getVar('jumlah_produksi')) {
            session()->setFlashdata('alert_danger', 'Jumlah Produksi tidak memenuhi');
            return redirect()->back();
        } else {

        $select_hp = $this->HPModel->find($id);

        if ($select_hp != null) {
            $jdw = $this->JadwalProduksiModel->where('id', $select_hp['id_jadwal'])->first();
            $this->HPModel->update($id, [
                'jumlah_produksi'     => $this->request->getVar('jumlah_produksi'),
                'jumlah_cacat'   => $this->request->getVar('jumlah_cacat'),
                'jumlah_sukses'  => $this->request->getVar('jumlah_produksi') - $this->request->getVar('jumlah_cacat'),
                'total_produksi'  => $this->request->getVar('total_produksi'),
                'keterangan'  => $this->request->getVar('keterangan'),
                'id_jadwal'  => $jdw['id']

            ]);
            session()->setFlashdata('alert_success', 'Berhasil menambah Hasil Produksi');
            return redirect()->to('/HP/index');
        }
    }
    }
    public function edit($slug)
    {
        $hasil = $this->HPModel->getHasilProduksi($slug);
        if ($hasil != null) {
            $data = [
                'hp' => $hasil
            ];
            return view('HasilProduksi/edit', $data);
        } else {
            return redirect()->to(base_url('HP'));
        }
    }
}
