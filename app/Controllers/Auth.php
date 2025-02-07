<?php

namespace App\Controllers;

use App\Models\AuthModel;
use Config\Database;

class Auth extends BaseController
{
    protected $dataAuth;
    protected $userModel;
    protected $db;

    public function __construct()
    {
        $this->dataAuth = new AuthModel();
        $this->db = Database::connect();
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $check = $this->dataAuth->auth_user($username, $password)->getRowArray();
        $res = $this->dataAuth->auth_user($username, $password)->getNumRows();

        if ($res > 0) {
            $ses_data = array(
                'id' => $check['id_user'],
                'nama' => $check['nama_lengkap'],
                'level' => $check['level'],
                'isLoggedIn' => TRUE
            );
            session()->set($ses_data);
            if ($check['level'] == 'Admin') {
                return redirect()->to(base_url('Admin/home'));
            } else {
                return redirect()->to(base_url('User/home'));
            }
        } else {
            session()->setFlashdata('failed', 'Username / Password salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/'));
    }
}