<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_medansat;
use App\Models\ModelPelatih_medansat;
use App\Models\UserModel;

class Medansat extends BaseController
{
    protected $UserModel;
    protected $ModelPelatih_medansat;
    protected $ModelPembina_medansat;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPelatih_medansat = new ModelPelatih_medansat();
        $this->ModelPembina_medansat = new ModelPembina_medansat();
    }
    public function pembina_medansat()
    {
        $data = [
            'title'         => ' Halaman Admin User Pembina Medan Satria',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Medan Satria',
            'menu'          => 'medansat',
            'submenu'       => 'pembinamedansat',
            'medansat'      => $this->ModelPembina_medansat->findAll(),
        ];

        return view('medansat/pembina_medansat', $data);
    }

    public function detailData_pembina($idpembina_medansatria)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Bekasi Timur',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'pembinamedansat',
            'medansat'      => $this->ModelPembina_medansat->detailData_pembina($idpembina_medansatria),
        ];

        return view('medansat/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_medansatria)
    {
        $namaGambar = $this->ModelPembina_medansat->find($idpembina_medansatria);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'medansat'    => $this->ModelPembina_medansat->findAll(),
        ];

        return view('Medansat/excelData_pembina', $data);
    }

    public function deletePembina($idpembina_medansatria)
    {
        $medansat = $this->ModelPembina_medansat->find($idpembina_medansatria);

        unlink('image/' . $medansat['foto']);

        $data = [
            'idpembina_medansatria'     => $idpembina_medansatria,
        ];

        $this->ModelPembina_medansat->deletePembina($idpembina_medansatria, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Medansat/pembina_medansat');
    }

    public function pelatih_medansat()
    {
        $data = [
            'title'         => ' Halaman Admin User Pelatih Medan Satria',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Medan Satria',
            'menu'          => 'medansat',
            'submenu'       => 'pelatihmedansat',
            'medansat'      => $this->ModelPelatih_medansat->findAll(),
        ];

        return view('medansat/pelatih_medansat', $data);
    }

    public function detailData_pelatih($idpelatih_medansatria)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Medan Satria',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'medansat',
            'submenu'       => 'pelatihmedansat',
            'medansat'      => $this->ModelPelatih_medansat->detailData_pelatih($idpelatih_medansatria),
        ];

        return view('medansat/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_medansatria)
    {
        $namaGambar = $this->ModelPelatih_medansat->find($idpelatih_medansatria);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'medansat'    => $this->ModelPelatih_medansat->findAll(),
        ];

        return view('Medansat/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_medansatria)
    {
        $medansat = $this->ModelPelatih_medansat->find($idpelatih_medansatria);

        unlink('image/' . $medansat['foto']);
        $data = [
            'idpelatih_medansatria'     => $idpelatih_medansatria,
        ];

        $this->ModelPelatih_medansat->deletePelatih($idpelatih_medansatria, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Medansat/pelatih_medansat');
    }

    // Halaman Admin User Pembina Medan Satria

    
}