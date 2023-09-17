<?php

namespace App\Models;

use CodeIgniter\Model;

class Kkinerja_karModel extends Model
{
    protected $table = 'kinerja_karyawan';

    protected $allowedFields = ['id_karyawan','nama', 'hasil_kerja', 'pengetahuan_pekerjaan', 'disiplin_absensi', 'total', 'slug'];

    public function getProduksi($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function cariData($cari)
    {
        return $this->table('jadwal_produksi')->like('nama_produk', $cari);
    }
}