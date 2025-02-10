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
            ->select('id_kriteria,SUM(pow(nilai,2)) AS total')
            ->groupBy('id_kriteria')
            ->get();
    }

    function get_normalisasi()
    {
        return $this->db->table('penilaian tb1')
            ->select('tb1.*,MAX(tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) AS max,MIN(tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) AS min,tb3.kode_kriteria')
            ->join('(SELECT id_kriteria,SUM(pow(nilai,2)) AS total FROM penilaian GROUP BY id_kriteria) AS tb2', 'tb1.id_kriteria = tb2.id_kriteria')
            ->join('kriteria tb3', 'tb1.id_kriteria = tb3.id_kriteria')
            ->groupBy('id_kriteria')
            ->get();
    }

    function get_solusi()
    {
        return $this->db->table('penilaian tb1')
            ->select('tb1.*,(tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) AS normalisasi,tb4.min,tb4.max,(SQRT(SUM(pow((tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) - IF(tb3.jenis_kriteria = \'Benefit\', tb4.max, tb4.min) , 2)))) AS solusi_positif,(SQRT(SUM(pow((tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) - IF(tb3.jenis_kriteria = \'Benefit\', tb4.min, tb4.max) , 2)))) AS solusi_negatif')
            ->join('(SELECT id_kriteria,SUM(pow(nilai,2)) AS total FROM penilaian GROUP BY id_kriteria) AS tb2', 'tb1.id_kriteria = tb2.id_kriteria')
            ->join('kriteria tb3', 'tb1.id_kriteria = tb3.id_kriteria')
            ->join('(SELECT tb1.id_kriteria, MAX(tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) AS max, MIN(tb1.nilai / SQRT(tb2.total) * tb3.bobot_kriteria) AS min,tb3.kode_kriteria FROM penilaian tb1 JOIN (SELECT id_kriteria,SUM(pow(nilai,2)) AS total FROM penilaian GROUP BY id_kriteria) AS tb2 ON tb1.id_kriteria = tb2.id_kriteria JOIN kriteria tb3 ON tb1.id_kriteria = tb3.id_kriteria GROUP BY id_kriteria) tb4', 'tb1.id_kriteria = tb4.id_kriteria')
            ->groupBy('id_kriteria')
            ->get();
    }
}