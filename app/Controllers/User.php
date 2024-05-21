<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $UserModel;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        helper('form');
    }
    public function index()
    {
        $data = [
            'title'         => 'Halaman User',
            'subtitle'      => 'Data User',
            'page'          => '',
            'menu'          => 'user',
            'submenu'       => 'datamaster',
            'user'          => $this->UserModel->whereIn('level',['Admin','Admin Pondok Gede','Admin Pondok Melati','Admin Jatiasih','Admin Jatisampurna','Admin Rawalumbu','Admin Bantargebang','Admin Medan Satria','Admin Mustika Jaya','Admin Bekasi Selatan','Admin Bekasi Timur','Admin Bekasi Barat','Admin Bekasi Utara'])->findAll(),
        ];

        return view('home/user', $data);
    }

    public function deleteData($id_user)
    {
        $data = [
            'id_user'           => $id_user,
        ];

        $this->UserModel->deleteData($id_user, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('User');
    }

    
}