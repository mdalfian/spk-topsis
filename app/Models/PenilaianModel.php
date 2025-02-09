<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class PenilaianModel extends Model
{
    protected $table      = 'penilaian';
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function get_penilaian()
    {
        return $this->db->table('penilaian tb1')
            ->select('tb1.*,tb2.nama_kriteria')
            ->join('kriteria tb2', 'tb2.id_kriteria = tb1.id_kriteria')
            ->get();
    }

    function get_perhitungan()
    {
        return $this->db->table('penilaian tb1')
            ->select('tb1.*,tb2.nama_kriteria,tb3.nama_alternatif')
            ->join('kriteria tb2', 'tb2.id_kriteria = tb1.id_kriteria')
            ->join('alternatif tb3', 'tb3.id_alternatif = tb1.id_alternatif')
            ->groupBy('tb1.id_alternatif')
            ->get();
    }

    function insert_penilaian($data, $id)
    {
        return [
            $this->db->table('penilaian')->insertBatch($data),
            $this->db->table('alternatif')->update(['status' => 1], ['id_alternatif' => $id])
        ];
    }

    function update_penilaian($data)
    {
        return $this->db->table('penilaian')->updateBatch($data, 'id_penilaian');
    }

    function get_total()
    {
        return $this->db->table('penilaian')
            ->select('id_kriteria,SUM(nilai) AS total')
            ->groupBy('id_kriteria')
            ->get();
    }
}
