<?php

namespace App\Models;

use CodeIgniter\Model;

class Kabsensi_karModel extends Model
{
    protected $table = 'absensi_karyawan';
    protected $allowedFields = ['id_karyawan', 'nama', 'posisi', 'jam_masuk', 'jam_kerja', 'tanggal_kerja', 'jam_pulang', 'slug','status_kehadiran'];

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