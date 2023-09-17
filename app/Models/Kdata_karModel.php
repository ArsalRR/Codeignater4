<?php

namespace App\Models;

use CodeIgniter\Model;

class Kdata_karModel extends Model
{
    protected $table = 'data_karyawan';
    protected $allowedFields = ['id_karywan', 'nama', 'posisi', 'jenis_kelamin', 'alamat', 'status', 'gaji', 'slug'];

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
    public function JointTable($tanggalawal, $tanggalakhir)
    {
        if ($tanggalakhir == false && $tanggalawal == false) {
            $query = $this->db->query("SELECT data_karyawan.*, count(absensi_karyawan.id_karyawan) as jumlah_kehadiran FROM data_karyawan LEFT JOIN absensi_karyawan ON data_karyawan.id = absensi_karyawan.id_karyawan WHERE absensi_karyawan.tanggal_kerja BETWEEN DATE_FORMAT(NOW() ,'%Y-%m-01') AND NOW() GROUP BY data_karyawan.id");
            return $query->getResultArray();
        }
        $query = $this->db->query("SELECT data_karyawan.*, count(absensi_karyawan.id_karyawan) as jumlah_kehadiran FROM data_karyawan LEFT JOIN absensi_karyawan ON data_karyawan.id = absensi_karyawan.id_karyawan WHERE absensi_karyawan.tanggal_kerja BETWEEN '$tanggalawal' AND '$tanggalakhir' GROUP BY data_karyawan.id");
        return $query->getResultArray();
    }
}