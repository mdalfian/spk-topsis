<?php

namespace App\Models;

use CodeIgniter\Model;
use Config\Database;

class AuthModel extends Model
{
    protected $db;

    function __construct()
    {
        $this->db = Database::connect();
    }

    function auth_user($username, $password)
    {
        return $this->db->table('user')->getWhere(['username' => $username, 'password' => hash('sha256', $password)]);
    }
}