<?php

namespace App\Models;

use CodeIgniter\Model;

class KgModel extends Model
{
    protected $table = 'stok_gudang';
    protected $primaryKey = 'id_stok';
    protected $allowedFields = ['id_produk','nama_produk','idmasuk','idkeluar', 'jumlahmasuk', 'jumlahkeluar',
    'tanggal_masuk','tanggal_keluar','kondisi_produk','harga_satuan','slug'];

    public function getStok($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $id])->first();
    }

    public function cariData($cari)
    {
        return $this->table('id_stok')->like('nama_produk', $cari);
    }

     public function getData()
    {
        return $this->findAll();
    }

    public function getStokGudang($id_produk)
    {
        return $this->find($id_produk);
    }

    public function plus_stok($jumlahmasuk, $nama_produk)
    {
    $this->builder()
        ->set('jumlahmasuk', "jumlahmasuk + {$jumlahmasuk}", false)
        ->where('nama_produk', $nama_produk)
        ->update($this->_table);
    }

   public function minus_stok($jumlahkeluar, $nama_produk)
    {
    $this->builder()
        ->set('jumlahmasuk', "jumlahmasuk - {$jumlahkeluar}", false)
        ->set('jumlahkeluar', "jumlahkeluar + {$jumlahkeluar}", false)
        ->where('nama_produk', $nama_produk)
        ->update($this->_table);
    }

    public function getStokByNamaProduk($nama_produk)
    {
        return $this->where('nama_produk', $nama_produk)->first();
    }
}

