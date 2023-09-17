<?php

namespace App\Controllers;

use App\Models\KglgModel;

class LAP_GUD extends BaseController
{
    protected $KglgModel;
    public function __construct()
    {
        $this->KglgModel = new KglgModel();
    }
    
    public function index()
    {
        $data = [
        'tampildata' => $this->KglgModel->getLaporanGudangWithStokBarang()
        ];

        return view('KelolaLaporanGudang/laporangudang', $data);
    }
}