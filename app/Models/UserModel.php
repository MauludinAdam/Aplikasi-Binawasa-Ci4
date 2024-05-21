<?php 

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['nama_lengkap','email','password','role','foto'];

    // public function getAllData()
    // {
    //     return $this->db->table('user')
    //         ->where('id_user', 'ASC')
    //         ->get()
    //         ->getResultArray();
    // }

    public function deleteData($id_user, $data)
    {
        return $this->db->table('user')
            ->where('id_user', $id_user)
            ->delete($data);
    }
}