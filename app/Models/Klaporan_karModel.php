<?php

namespace App\Models;

use CodeIgniter\Model;

class Klaporan_karModel extends Model
{
    protected $table = 'laporan_karyawan';
    protected $allowedFields = ['id', 'id_karyawan', 'posisi', 'kehadiran'];
    // public function joinToLaporanProduksi()
    // {
    //     return $this->join('jadwal_produksi', 'jadwal_produksi.id=laporan_produksi.id_jadwal')->join('hasil_produksi', 'jadwal_produksi.id=hasil_produksi.id_jadwal')->findAll();
    // }
}