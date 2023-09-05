<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang_model extends Model
{
    protected $table = 'barang';
    public function getBarang($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            return $this->getWhere(['id_barang' => $id]);
        }
    }

    public function saveBarang($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function deleteBarang($id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_barang', $id);
        $builder->delete();
    }

    public function editBarang($data, $id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_barang', $id);
        return $builder->update($data);
    }

    // public function deleteBarang($id)
    // {
    //     $stQuery = "DELETE FROM ".$this->table." ";
    //     $stQuery .= "WHERE id_barang = ".$this->db->escapeString($id);
    //     $this->db->query($stQuery);
    // }
}
