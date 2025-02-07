<?php

namespace App\Controllers;

use App\Models\PenilaianModel;
use Config\Database;

class Penilaian extends BaseController
{
    protected $penilaianModel;
    protected $db;

    public function __construct()
    {
        $this->penilaianModel = new PenilaianModel();
        $this->db = Database::connect();
    }

    public function add_penilaian($id_alternatif)
    {
        $id_kriteria = $this->request->getPost('id_kriteria');
        $nilai = $this->request->getPost('nilai');
        $data = [];

        $index = 0;
        foreach ($id_kriteria as $id) {
            array_push($data, [
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id,
                'nilai' => $nilai[$index]
            ]);

            $index++;
        }

        $this->penilaianModel->insert_penilaian($data, $id_alternatif);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil melakukan penilaian');
        } else {
            return redirect()->back()->with('error', 'Gagal melakukan penilaian');
        }
    }

    public function edit_penilaian()
    {
        $id_penilaian = $this->request->getPost('id_penilaian');
        $nilai = $this->request->getPost('nilai');
        $data = [];

        $index = 0;
        foreach ($id_penilaian as $id) {
            array_push($data, [
                'id_penilaian' => $id,
                'nilai' => $nilai[$index]
            ]);

            $index++;
        }

        $this->penilaianModel->update_penilaian($data);

        if ($this->db->affectedRows() > 0) {
            return redirect()->back()->with('success', 'Berhasil mengedit penilaian');
        } else {
            return redirect()->back()->with('error', 'Gagal mengedit penilaian');
        }
    }
}
