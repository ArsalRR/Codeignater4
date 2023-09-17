<?php

namespace App\Models;

use CodeIgniter\Model;

class KpeModel extends Model
{
    protected $table = 'kelola_pesanan';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_produk', 'invoice', 'pelangan', 'produk', 'harga', 'qty', 'satuan', 'create_at','status'];


    public function getDataByID($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_produk' => $id]);
        }
    }

    public function hapusData($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['id_produk' => $id]);
    }
}
