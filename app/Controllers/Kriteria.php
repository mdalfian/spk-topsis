<?php

namespace App\Controllers;

use App\Models\AuthModel;
use App\Models\KriteriaModel;
use Config\Database;

class Kriteria extends BaseController
{
    protected $kriteriaModel;
    protected $db;

    public function __construct()
    {
        $this->kriteriaModel = new KriteriaModel();
        $this->db = Database::connect();
    }

    public function add_kriteria()
    {
        $data = [
            'kode_kriteria' => $this->request->getPost('kode_kriteria'),
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
            'jenis_kriteria' => $this->request->getPost('jenis_kriteria'),
        ];

        $this->kriteriaModel->insert_kriteria($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menambah Kriteria');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah Kriteria');
        }
    }

    public function edit_kriteria($id)
    {
        $data = [
            'kode_kriteria' => $this->request->getPost('kode_kriteria'),
            'nama_kriteria' => $this->request->getPost('nama_kriteria'),
            'bobot_kriteria' => $this->request->getPost('bobot_kriteria'),
            'jenis_kriteria' => $this->request->getPost('jenis_kriteria'),
        ];

        $this->kriteriaModel->update_kriteria($data, $id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil mengedit Kriteria');
        } else {
            return redirect()->back()->with('error', 'Gagal mengedit Kriteria');
        }
    }
    public function delete_kriteria($id)
    {
        $this->kriteriaModel->remove_kriteria($id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menghapus Kriteria');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus Kriteria');
        }
    }
    public function add_sub_kriteria($id)
    {
        $data = [
            'nama_sub_kriteria' => $this->request->getPost('nama_sub_kriteria'),
            'nilai' => $this->request->getPost('nilai'),
            'id_kriteria' => $id
        ];

        $this->kriteriaModel->insert_sub_kriteria($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menambah Sub Kriteria');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah Sub Kriteria');
        }
    }

    public function edit_sub_kriteria($id)
    {
        $data = [
            'nama_sub_kriteria' => $this->request->getPost('nama_sub_kriteria'),
            'nilai' => $this->request->getPost('nilai'),
        ];

        $this->kriteriaModel->update_sub_kriteria($data, $id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil mengedit Sub Kriteria');
        } else {
            return redirect()->back()->with('error', 'Gagal mengedit Sub Kriteria');
        }
    }
    public function delete_sub_kriteria($id)
    {
        $this->kriteriaModel->remove_sub_kriteria($id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menghapus Sub Kriteria');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus Sub Kriteria');
        }
    }
}