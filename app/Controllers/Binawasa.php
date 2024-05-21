<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ModelAdmin;
class Binawasa extends BaseController
{
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelAdmin = new ModelAdmin();
    }
    public function index()
    {
        $data = [
            'title'                     => 'Halaman Admin Bekasi Selatan',
            'subtitle'                  => 'Selamat Datang Di Aplikasi Sistem Informasi Binawasa',
            'page'                      => ' Halaman Dashboard',
            'menu'                      => 'dashboard',
            'submenu'                   => '', 
        ];

        return view('binawasa/dashboard', $data);
    }

}