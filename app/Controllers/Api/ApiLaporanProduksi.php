<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\HPModel;

class ApiLaporanProduksi extends BaseController
{
    protected HPModel $hpmodel;
    public function __construct()
    {
        $this->hpmodel = new HPModel();
    }
    public function index()
    {
        $id =  $this->request->getVar('id');
        $laporan = $this->hpmodel->where('hasil_produksi.id', $id)->join('jadwal_produksi', 'hasil_produksi.id_jadwal=jadwal_produksi.id')->join('laporan_produksi', 'jadwal_produksi.id=laporan_produksi.id_jadwal')->select('*')->first();
        $html = "";
        if ($laporan != null) {
            $html .= '<p>' . $laporan["nama_produk"] . '</p>';
            $html .= '<p>' . 'Pcs ' . $laporan['jumlah_sukses'] . '<p>';
            $html .=  $laporan['jumlah_sukses'] < 100 ? "<div class='badge badge-danger badge-pill'>Belum Memenuhi Target</div>" : "<div class='badge badge-success badge-pill'>Sudah Memenihi target</div>";

            return  $html;
        }
    
    }
}
