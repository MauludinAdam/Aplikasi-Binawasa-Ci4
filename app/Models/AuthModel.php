<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function save_register($data)
    {
      return $this->db->table('user')->insert($data);
    }

    public function login_admin($email, $password)
    {
        return $this->db->table('user')->where([
            'email'     => $email,
            'password'  => $password
        ])->get()->getRowArray();
    }

    public function login_user($email, $password)
    {
        return $this->db->table('user')->where([
            'email'     => $email,
            'password'  => $password
        ])->get()->getRowArray();
    }
}