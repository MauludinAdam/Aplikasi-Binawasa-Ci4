<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_jatisampurna;
use App\Models\ModelPelatih_jatisampurna;

class Jatisampurna extends BaseController
{
    public function __construct()
    {
        $this->ModelPelatih_jatisampurna = new ModelPelatih_jatisampurna();
        $this->ModelPembina_jatisampurna = new ModelPembina_jatisampurna();
    }
    public function pembina_jatisampurna()
    {
        $data = [
            'title'         => 'Halaman Admin Pembina Jatisampurna',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Jatisampurna',
            'menu'          => 'jatisampurna',
            'submenu'       => 'pembinajatisampurna',
            'jatisampurna'  => $this->ModelPembina_jatisampurna->findAll()
        ];

        return view('jatisampurna/pembina_jatisampurna', $data);
    }

    public function detailData_pembina($idpembina_jatisampurna)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Jatisampurna',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapembina',
            'jatisampurna'    => $this->ModelPembina_jatisampurna->detailData_pembina($idpembina_jatisampurna),
        ];

        return view('/Jatisampurna/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_jatisampurna)
    {
        $namaGambar = $this->ModelPembina_jatisampurna->find($idpembina_jatisampurna);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'jatisampurna'    => $this->ModelPembina_jatisampurna->findAll(),
        ];

        return view('Jatisampurna/excelData_pembina', $data);
    }

    public function deleteData($idpembina_jatisampurna)
    {
        $jatisampurna = $this->ModelPembina_jatisampurna->find($idpembina_jatisampurna);

        unlink('image/' . $jatisampurna['foto']);

        $data = [
            'idpembina_jatisampurna'    => $idpembina_jatisampurna,
        ];

        $this->ModelPembina_jatisampurna->deleteData($idpembina_jatisampurna, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Jatisampurna/pembina_jatisampurna');
    }

    public function pelatih_jatisampurna()
    {
        $data = [
            'title'         => ' Halaman Adin Pelatih Jatisampurna',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Jatisampurna',
            'menu'          => 'jatisampurna',
            'submenu'       => 'pelatihjatisampurna',
            'jatisampurna'  => $this->ModelPelatih_jatisampurna->findAll()
        ];

        return view('jatisampurna/pelatih_jatisampurna', $data);
    }

    public function detailData_pelatih($idpelatih_jatisampurna)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Jatisampurna',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatisampurna',
            'submenu'       => 'datapelatih',
            'jatisampurna'    => $this->ModelPelatih_jatisampurna->detailData_pelatih($idpelatih_jatisampurna),
        ];

        return view('/Jatisampurna/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_jatisampurna)
    {
        $namaGambar = $this->ModelPelatih_jatisampurna->find($idpelatih_jatisampurna);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'jatisampurna'    => $this->ModelPelatih_jatisampurna->findAll(),
        ];

        return view('Jatisampurna/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_jatisampurna)
    {
        $jatisampurna = $this->ModelPelatih_jatisampurna->find($idpelatih_jatisampurna);

        unlink('image/' . $jatisampurna['foto']);

        $data = [
            'idpelatih_jatisampurna'    => $idpelatih_jatisampurna
        ];

        $this->ModelPelatih_jatisampurna->deletePelatih($idpelatih_jatisampurna, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Jatisampurna/pelatih_jatisampurna');
    }
}