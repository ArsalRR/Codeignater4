<?php

namespace App\Models;

use CodeIgniter\Model;

class LPModel extends Model
{
    protected $table = 'laporan_produksi';
    protected $allowedFields = [ 'bulan','id_jadwal'];
    public function joinToLaporanProduksi()
    {
        return $this->join('jadwal_produksi', 'jadwal_produksi.id=laporan_produksi.id_jadwal')->join('hasil_produksi','jadwal_produksi.id=hasil_produksi.id_jadwal')->findAll();
    }
  
}