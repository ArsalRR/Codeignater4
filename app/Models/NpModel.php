<?php

namespace App\Models;

use CodeIgniter\Model;

class NpModel extends Model
{
    protected $table = 'nomor_pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['id_pesanan', 'tgl_pesanan', 'nama_pelanggan', 'total_harga','alamat_tujuan','ekspedisi','tgl_pengiriman'];

    public function getDataByID($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_pesanan' => $id]);
        }
    }

    public function hapusData($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_pesanan' => $id]);
    }
}
