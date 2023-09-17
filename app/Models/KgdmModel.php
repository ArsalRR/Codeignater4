<?php

namespace App\Models;

use CodeIgniter\Model;

class KgdmModel extends Model
{
    protected $table = 'datamasuk_gudang';
    protected $primaryKey = 'idmasuk';
    protected $returnType = 'object';
    protected $allowedFields = ['nama_produk','jumlahmasuk','tanggal_masuk','harga_satuan','kondisi_produk','slug'];

    public function getStok($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $id])->first();
    }
    public function cariData($cari)
    {
        return $this->table('id_produk')->like('nama_produk', $cari);
    }

    function jointabledatamasuk()
    {
        return $this->findAll();
    }

    public function getProdukMasuk()
    {
        return $this->findAll();
    }
}

