<?php

namespace App\Models;

use CodeIgniter\Model;

class LModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_pesanan';
    protected $allowedFields = ['id_pesanan', 'tgl_laporan', 'nama_pelanggan', 'total_harga', 'status_pembayaran'];

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
