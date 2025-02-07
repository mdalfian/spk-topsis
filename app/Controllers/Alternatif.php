<?php

namespace App\Controllers;

use App\Models\alternatifModel;
use Config\Database;

class alternatif extends BaseController
{
    protected $alternatifModel;
    protected $db;

    public function __construct()
    {
        $this->alternatifModel = new alternatifModel();
        $this->db = Database::connect();
    }

    public function add_alternatif()
    {
        $data = [
            'nama_alternatif' => $this->request->getPost('nama_alternatif'),
        ];

        $this->alternatifModel->insert_alternatif($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menambah alternatif');
        } else {
            return redirect()->back()->with('error', 'Gagal menambah alternatif');
        }
    }

    public function edit_alternatif($id)
    {
        $data = [
            'nama_alternatif' => $this->request->getPost('nama_alternatif'),
        ];

        $this->alternatifModel->update_alternatif($data, $id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil mengedit alternatif');
        } else {
            return redirect()->back()->with('error', 'Gagal mengedit alternatif');
        }
    }

    public function delete_alternatif($id)
    {
        $this->alternatifModel->remove_alternatif($id);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil menghapus alternatif');
        } else {
            return redirect()->back()->with('error', 'Gagal menghapus alternatif');
        }
    }
}