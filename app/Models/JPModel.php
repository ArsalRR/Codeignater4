<?php

namespace App\Models;

use CodeIgniter\Model;

class JPModel extends Model
{
    protected $table = 'jadwal_produksi';
    protected $allowedFields = ['nama_produk', 'slug', 'tgl_ml_pd', 'tgl_sl_pd'];
 
    public function getProduksi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
public function cariData($cari)
{
    return $this->table('jadwal_produksi')->like('nama_produk',$cari);
}
}

