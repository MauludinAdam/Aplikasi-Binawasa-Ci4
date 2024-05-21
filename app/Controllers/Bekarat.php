<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_bekarat;
use App\Models\ModelPelatih_bekarat;
use App\Models\UserModel;

class Bekarat extends BaseController
{
    protected $UserModel;
    protected $ModelPelatih_bekarat;
    protected $ModelPembina_bekarat;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPembina_bekarat = new ModelPembina_bekarat();
        $this->ModelPelatih_bekarat = new ModelPelatih_bekarat();
    }
    public function pembina_bekarat()
    {
        $data = [
            'title'         => 'Halaman Admin Pembina Bekasi Barat',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Bekasi Barat',
            'menu'          => 'bekarat',
            'submenu'       => 'pembinabekarat',
            'bekarat'       => $this->ModelPembina_bekarat->findAll()
        ];

        return view('bekarat/pembina_bekarat', $data);
    }

    public function detailData_pembina($idpembina_bekasibarat)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Bekasi Barat',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekarat',
            'submenu'       => 'pembinabekarat',
            'bekarat'       => $this->ModelPembina_bekarat->detailData_pembina($idpembina_bekasibarat),
        ];

        return view('bekarat/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_bekasibarat)
    {
        $namaGambar = $this->ModelPembina_bekarat->find($idpembina_bekasibarat);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'bekarat'    => $this->ModelPembina_bekarat->findAll(),
        ];

        return view('Bekarat/excelData_pembina', $data);
    }

    public function deleteData($idpembina_bekasibarat)
    {
        $bekarat = $this->ModelPembina_bekarat->find($idpembina_bekasibarat);

        unlink('image/' . $bekarat['foto']);
        $data = [
            'idpembina_bekasibarat'     => $idpembina_bekasibarat,
        ];

        $this->ModelPembina_bekarat->deleteData($idpembina_bekasibarat, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekarat/pembina_bekarat');
    }

    public function pelatih_bekarat()
    {
        $data = [
            'title'         => 'Halaman Admin Pelatih Bekasi Barat',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Bekasi Barat',
            'menu'          => 'bekarat',
            'submenu'       => 'pelatihbekarat',
            'bekarat'       => $this->ModelPelatih_bekarat->findAll(),
        ];

        return view('bekarat/pelatih_bekarat', $data);
    }

    public function detailData_pelatih($idpelatih_bekarat)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Bekasi Barat',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekarat',
            'submenu'       => 'pembinabekarat',
            'bekarat'       => $this->ModelPelatih_bekarat->detailData_pelatih($idpelatih_bekarat),
        ];

        return view('bekarat/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_bekarat)
    {
        $namaGambar = $this->ModelPelatih_bekarat->find($idpelatih_bekarat);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'bekarat'    => $this->ModelPelatih_bekarat->findAll(),
        ];

        return view('Bekarat/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_bekarat)
    {
        $bekarat = $this->ModelPelatih_bekarat->find($idpelatih_bekarat);

        unlink('image/' . $bekarat['foto']);
        $data = [
            'idpelatih_bekarat'     => $idpelatih_bekarat,
        ];

        $this->ModelPelatih_bekarat->deletePelatih($idpelatih_bekarat, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekarat/pelatih_bekarat');
    }

    
}