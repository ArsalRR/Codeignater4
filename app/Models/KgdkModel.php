<?php

namespace App\Models;

use CodeIgniter\Model;

class KgdkModel extends Model
{
    protected $table = 'datakeluar_gudang';
    protected $primaryKey = 'idkeluar';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_produk','jumlahkeluar','tanggal_keluar','harga','kondisi_produk','slug'];

    public function getStok($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
    public function cariData($cari)
    {
        return $this->table('id_produk')->like('nama_produk', $cari);

}
function jointabledatakeluar()
    {
        return $this->findAll();
    }
    
public function getProdukKeluar()
    {
        return $this->findAll();
    }
}