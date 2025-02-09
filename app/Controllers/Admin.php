<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use App\Models\PenilaianModel;
use Config\Database;

class Admin extends BaseController
{
    protected $kriteriaModel;
    protected $alternatifModel;
    protected $penilaianModel;
    protected $db;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->alternatifModel = new AlternatifModel();
        $this->penilaianModel = new PenilaianModel();
        $this->db = Database::connect();
    }

    public function index(): string
    {
        $data = [
            'title' => 'Home'
        ];

        return view('admin/home', $data);
    }

    public function kriteria()
    {
        $data = [
            'title' => 'Kriteria',
            'kriteria' => $this->kriteriaModel->get_kriteria()->getResult(),
        ];

        return view('admin/kriteria', $data);
    }

    public function sub_kriteria()
    {
        $data = [
            'title' => 'Sub Kriteria',
            'kriteria' => $this->kriteriaModel->get_kriteria()->getResult(),
            'sub_kriteria' => $this->kriteriaModel->get_sub_kriteria()->getResult(),
        ];

        return view('admin/sub_kriteria', $data);
    }

    public function alternatif()
    {
        $data = [
            'title' => 'Alternatif',
            'alternatif' => $this->alternatifModel->get_alternatif()->getResult(),
        ];

        return view('admin/alternatif', $data);
    }

    public function penilaian()
    {
        $data = [
            'title' => 'Penilaian',
            'alternatif' => $this->alternatifModel->get_alternatif()->getResult(),
            'kriteria' => $this->kriteriaModel->get_kriteria()->getResult(),
            'sub_kriteria' => $this->kriteriaModel->get_sub_kriteria()->getResult(),
            'penilaian' => $this->penilaianModel->get_penilaian()->getResult(),
        ];

        return view('admin/penilaian', $data);
    }

    public function perhitungan()
    {
        $data = [
            'title' => 'Perhitungan',
            'alternatif' => $this->alternatifModel->get_alternatif()->getResult(),
            'kriteria' => $this->kriteriaModel->get_kriteria()->getResult(),
            'sub_kriteria' => $this->kriteriaModel->get_sub_kriteria()->getResult(),
            'perhitungan' => $this->penilaianModel->get_perhitungan()->getResult(),
            'penilaian' => $this->penilaianModel->get_penilaian()->getResult(),
            'total' => $this->penilaianModel->get_total()->getResult(),
        ];

        return view('admin/perhitungan', $data);
    }
}
