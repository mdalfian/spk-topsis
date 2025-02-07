<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class AlternatifModel extends Model
{
    protected $table      = 'alternatif';
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function get_alternatif()
    {
        return $this->db->table('alternatif')->get();
    }

    function insert_alternatif($data)
    {
        return $this->db->table('alternatif')->insert($data);
    }

    function update_alternatif($data, $id)
    {
        return $this->db->table('alternatif')->update($data, ['id_alternatif' => $id]);
    }

    function remove_alternatif($id)
    {
        return $this->db->table('alternatif')->delete(['id_alternatif' => $id]);
    }
}