<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_bekatim;
use App\Models\ModelPelatih_bekatim;
use App\Models\UserModel;

class Bekatim extends BaseController
{
    protected $UserModel;
    protected $ModelPembina_bekatim;
    protected $ModelPelatih_bekatim;
    public function __construct()
    {
        $this->ModelPembina_bekatim = new ModelPembina_bekatim();
        $this->ModelPelatih_bekatim = new ModelPelatih_bekatim();
        $this->UserModel = new UserModel;
    }
    public function pembina_bekatim()
    {
        $data = [
            'title'             => ' Halaman Admin Pembina Bekasi Timur',
            'subtitle'          => 'Data Pembina Bekasi Timur',
            'page'              => 'Pembina Bekasi Timur',
            'menu'              => 'bekatim',
            'submenu'           => 'pembinabekatim',
            'bekatim'           => $this->ModelPembina_bekatim->findAll(),
        ];

        return view('bekatim/pembina_bekatim', $data);
    }

    public function detailData_pembina($idpembina_bekatim)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Bekasi Timur',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekatim',
            'submenu'       => 'datapembina',
            'bekatim'    => $this->ModelPembina_bekatim->detailData_pembina($idpembina_bekatim),
        ];

        return view('/Bekatim/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_bekatim)
    {
        $namaGambar = $this->ModelPembina_bekatim->find($idpembina_bekatim);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'bekatim'    => $this->ModelPembina_bekatim->findAll(),
        ];

        return view('Bekatim/excelData_pembina', $data);
    }

    public function deleteData($idpembina_bekatim)
    {
        $bekatim = $this->ModelPembina_bekatim->find($idpembina_bekatim);

        unlink('image/' . $bekatim['foto']);
        
        $data = [
            'idpembina_bekatim'     => $idpembina_bekatim,
        ];

        $this->ModelPembina_bekatim->deleteData($idpembina_bekatim, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/Bekatim/pembina_bekatim');
    }

    public function pelatih_bekatim()
    {
        $data = [
            'title'         => 'Halaman Admin Pelatih Bekasi Timur',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Bekasi Timur',
            'menu'          => 'bekatim',
            'submenu'       => 'pelatihbekatim',
            'bekatim'      => $this->ModelPelatih_bekatim->findAll()
        ];

        return view('bekatim/pelatih_bekatim', $data);
    }

    public function detailData_pelatih($idpelatih_bekatim)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Bekasi Timur',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekatim',
            'submenu'       => 'pelatihbekatim',
            'bekatim'       => $this->ModelPelatih_bekatim->detailData_pelatih($idpelatih_bekatim),
        ];

        return view('bekatim/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_bekatim)
    {
        $namaGambar = $this->ModelPelatih_bekatim->find($idpelatih_bekatim);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'bekatim'    => $this->ModelPelatih_bekatim->findAll(),
        ];

        return view('Bekatim/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_bekatim)
    {
        $bekatim = $this->ModelPelatih_bekatim->find($idpelatih_bekatim);

        unlink('image/' . $bekatim['foto']);
        
        $data = [
            'idpelatih_bekatim'     => $idpelatih_bekatim,
        ];

        $this->ModelPelatih_bekatim->deletePelatih($idpelatih_bekatim, $data);

        session()->getFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekatim/pelatih_bekatim');
    }

    // Halaman User admin pembina bekasi timur

   
    
}