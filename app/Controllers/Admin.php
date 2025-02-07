<?php

namespace App\Controllers;

use App\Models\KriteriaModel;
use Config\Database;

class Admin extends BaseController
{
    protected $kriteriaModel;
    protected $db;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
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
            'kriteria' => $this->kriteriaModel->findAll()
        ];

        return view('admin/kriteria', $data);
    }
}