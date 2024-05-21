<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_rawalumbu;
use App\Models\ModelPelatih_rawalumbu;

class Rawalumbu extends BaseController
{
    protected $ModelPelatih_rawalumbu;
    protected $ModelPembina_rawalumbu;
    public function __construct()
    {
        $this->ModelPelatih_rawalumbu = new ModelPelatih_rawalumbu();
        $this->ModelPembina_rawalumbu = new ModelPembina_rawalumbu();
    }
    public function pembina_rawalumbu()
    {
        $data = [
            'title'     => 'Halaman Admin Rawalumbu',
            'subtitle'  => 'Data Pembina',
            'page'      => 'Pembina Rawalumbu',
            'menu'      => 'rawalumbu',
            'submenu'   => 'pembinarawalumbu',
            'rawalumbu' => $this->ModelPembina_rawalumbu->findAll(),
        ];

        return view('rawalumbu/pembina_rawalumbu', $data);
    }

    public function detailData_pembina($idpembina_rawalumb)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Rawalumbu',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'rawalumbu',
            'submenu'       => 'pembinamedansat',
            'rawalumbu'      => $this->ModelPembina_rawalumbu->detailData_pembina($idpembina_rawalumb),
        ];

        return view('rawalumbu/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_rawalumb)
    {
        $namaGambar = $this->ModelPembina_rawalumbu->find($idpembina_rawalumb);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'rawalumbu'    => $this->ModelPembina_rawalumbu->findAll(),
        ];

        return view('rawalumbu/excelData_pembina', $data);
    }

    public function deleteData($idpembina_rawalumbu)
    {
        $rawalumbu = $this->ModelPembina_rawalumbu->find($idpembina_rawalumbu);

        unlink('image/' . $rawalumbu['foto']);
        $data = [
            'idpembina_rawalumbu'   => $idpembina_rawalumbu,
        ];

        $this->ModelPembina_rawalumbu->deleteData($idpembina_rawalumbu, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Rawalumbu/pembina_rawalumbu');
    }

    public function pelatih_rawalumbu()
    {
        $data   = [
            'title'     => 'Halaman Admin Rawalumbu',
            'subtitle'  => 'Data Pelatih',
            'page'      => 'Pelatih Rawalumbu',
            'menu'      => 'rawalumbu',
            'submenu'   => 'pelatihrawalumbu',
            'rawalumbu' => $this->ModelPelatih_rawalumbu->findAll(),
        ];

        return view('rawalumbu/pelatih_rawalumbu', $data);
    }

    public function detailData_pelatih($idpelatih_rawalumb)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Rawalumbu',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'rawalumbu',
            'submenu'       => 'pelatihmedansat',
            'rawalumbu'      => $this->ModelPelatih_rawalumbu->detailData_pelatih($idpelatih_rawalumb),
        ];

        return view('rawalumbu/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_rawalumb)
    {
        $namaGambar = $this->ModelPelatih_rawalumbu->find($idpelatih_rawalumb);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'rawalumbu'    => $this->ModelPelatih_rawalumbu->findAll(),
        ];

        return view('rawalumbu/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_rawalumbu)
    {
        $rawalumbu = $this->ModelPelatih_rawalumbu->find($idpelatih_rawalumbu);
        unlink('image/' . $rawalumbu['foto']);
        
        $data = [
            'idpelatih_rawalumbu'   => $idpelatih_rawalumbu,
        ]; 

        $this->ModelPelatih_rawalumbu->deletePelatih($idpelatih_rawalumbu, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Rawalumbu/pelatih_rawalumbu');
    }

    // Halaman Admin User Rawalumbu

    
}