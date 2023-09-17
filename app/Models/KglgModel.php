<?php

namespace App\Models;

use CodeIgniter\Model;

class KglgModel extends Model
{
    protected $table = 'stok_gudang';
    protected $allowedFields = ['nama_produk', 'tanggal_keluar','tanggal_masuk', 'jumlahmasuk', 'jumlahkeluar', 'harga_satuan'];
   
    public function getLaporanGudangWithStokBarang()
    {
        return $this->findAll();
    }
}
