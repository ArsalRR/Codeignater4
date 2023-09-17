<?php

namespace App\Models;

use CodeIgniter\Model;

class HPModel extends Model
{
    protected $table = 'hasil_produksi';
    protected $allowedFields = ['jumlah_produksi', 'jumlah_cacat', 'jumlah_sukses','id_jadwal'];
    public function joinToJadwalProduksi()
    {
        return $this->join('jadwal_produksi', 'jadwal_produksi.id=hasil_produksi.id_jadwal')->select('jadwal_produksi.nama_produk,jadwal_produksi.tgl_ml_pd,hasil_produksi.jumlah_produksi,hasil_produksi.jumlah_cacat,hasil_produksi.jumlah_sukses,hasil_produksi.keterangan,hasil_produksi.id');
        
    }
    public function getHasilProduksi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $slug])->first();
    }
    public function cariData($cari)
    {
        return $this->table('hasil_produksi')->like('nama_produk', $cari);
    }
}
