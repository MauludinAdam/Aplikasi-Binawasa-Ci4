<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_bekasut;
use App\Models\ModelPelatih_bekasut;
use App\Models\UserModel;

class Bekasut extends BaseController
{
    protected $UserModel;
    protected $ModelPelatih_bekasut;
    protected $ModelPembina_bekasut;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPembina_bekasut = new ModelPembina_bekasut();
        $this->ModelPelatih_bekasut = new ModelPelatih_bekasut();
    }
    public function pembina_bekasut()
    {
        $data = [
            'title'         => 'Halaman Admin Pembina Bekasi Utara',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Bekasi Utara',
            'menu'          => 'bekasut',
            'submenu'       => 'pembinabekasut',
            'bekasut'       => $this->ModelPembina_bekasut->findAll()
        ];

        return view('bekasut/pembina_bekasut', $data);
    }

    public function detailData_pembina($idpembina_bekasut)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Bekasi Utara',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekasut',
            'submenu'       => 'pembinabekarat',
            'bekasut'       => $this->ModelPembina_bekasut->detailData_pembina($idpembina_bekasut),
        ];

        return view('bekasut/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_bekasut)
    {
        $namaGambar = $this->ModelPembina_bekasut->find($idpembina_bekasut);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'bekasut'    => $this->ModelPembina_bekasut->findAll(),
        ];

        return view('Bekasut/excelData_pembina', $data);
    }

    public function deleteData($ModelPembina_bekasut)
    {
        $bekasut = $this->ModelPembina_bekasut->find($ModelPembina_bekasut);

        unlink('image/' . $bekasut['foto']);
        $data = [
            'idpembina_bekasut'     => $ModelPembina_bekasut,
        ]; 

        $this->ModelPembina_bekasut->deleteData($ModelPembina_bekasut, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekasut/pembina_bekasut');
    }

    public function pelatih_bekasut()
    {
        $data = [
            'title'         => 'Halaman Admin Pelatih Bekasi Utara',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Bekasi Utara',
            'menu'          => 'bekasut',
            'submenu'       => 'pelatihbekasut',
            'bekasut'       => $this->ModelPelatih_bekasut->findAll(),
        ];

        return view('bekasut/pelatih_bekasut', $data);
    }

    public function detailData_pelatih($slug)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Bekasi Utara',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekasut',
            'submenu'       => 'pelatihbekasut',
            'bekasut'       => $this->ModelPelatih_bekasut->detailData_pelatih($slug),
        ];

        return view('bekasut/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_bekasiutara)
    {
        $namaGambar = $this->ModelPelatih_bekasut->find($idpelatih_bekasiutara);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'bekasut'    => $this->ModelPelatih_bekasut->findAll(),
        ];

        return view('Bekasut/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_bekasiutara)
    {
        $bekasut = $this->ModelPelatih_bekasut->find($idpelatih_bekasiutara);

        unlink('image/' . $bekasut['foto']);
        $data = [
            'idpelatih_bekasiutara'     => $idpelatih_bekasiutara,
        ];

        $this->ModelPelatih_bekasut->deletePelatih($idpelatih_bekasiutara, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekasut/pelatih_bekasut');
    }

    // Halaman Admin User Bekasi 
}