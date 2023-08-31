<?php
namespace App\Models;
use CodeIgniter\Model;

class Barang_model extends Model {
    protected $table = 'barang';
    public function getBarang($id = false)
    {
        if($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_barang' => $id]);
        }
    }
}