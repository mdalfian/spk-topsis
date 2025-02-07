<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class KriteriaModel extends Model
{
    protected $table      = 'kriteria';
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function get_kriteria()
    {
        return $this->db->table('kriteria')->get();
    }

    function insert_kriteria($data)
    {
        return $this->db->table('kriteria')->insert($data);
    }

    function update_kriteria($data, $id)
    {
        return $this->db->table('kriteria')->update($data, ['id_kriteria' => $id]);
    }

    function remove_kriteria($id)
    {
        return $this->db->table('kriteria')->delete(['id_kriteria' => $id]);
    }

    function get_sub_kriteria()
    {
        return $this->db->table('sub_kriteria')->orderBy('nilai', 'DESC')->get();
    }

    function insert_sub_kriteria($data)
    {
        return $this->db->table('sub_kriteria')->insert($data);
    }

    function update_sub_kriteria($data, $id)
    {
        return $this->db->table('sub_kriteria')->update($data, ['id_sub_kriteria' => $id]);
    }

    function remove_sub_kriteria($id)
    {
        return $this->db->table('sub_kriteria')->delete(['id_sub_kriteria' => $id]);
    }
}