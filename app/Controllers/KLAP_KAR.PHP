<?php

namespace App\Controllers;

use App\Models\Klaporan_karModel;
use App\Models\Kdata_karModel;
use App\Models\Kabsensi_karModel;
use App\Models\Kkinerja_karModel;

class KLAP_KAR extends BaseController
{
    protected $Klaporan_karModel;
    public function __construct()
    {
        $this->Klaporan_karModel = new Kdata_karModel();
    }
    public function index()
    {
        $tanggalawal = $this->request->getVar('tanggal1');
        $tanggalakhir = $this->request->getVar('tanggal2');
        if ($tanggalawal && $tanggalakhir) {
            $data['title'] = 'Laporan Karyawan tanggal' . ' ' . $tanggalawal . ' - ' . $tanggalakhir;
        } else {
            $data['title'] = 'Laporan Karyawan';
            return view('KelolaLaporanKaryawan/laporan', $data);
        }
    }
}