<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table = 'absensi_karyawan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_karyawan', 'nama', 'posisi', 'jam_masuk', 'jam_kerja', 'tanggal_kerja', 'jam_pulang', 'slug', 'status_kehadiran'];
}