<?php

namespace App\Controllers;

use App\Models\AlternatifModel;
use App\Models\KriteriaModel;
use Config\Database;

class Admin extends BaseController
{
    protected $kriteriaModel;
    protected $alternatifModel;
    protected $db;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->alternatifModel = new AlternatifModel();
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
}