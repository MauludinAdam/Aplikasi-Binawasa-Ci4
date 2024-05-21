<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_jatiasih;
use App\Models\ModelPelatih_jatiasih;

class Jatiasih extends BaseController
{
    public function __construct()
    {
        $this->ModelPembina_jatiasih = new ModelPembina_jatiasih();
        $this->ModelPelatih_jatiasih = new ModelPelatih_jatiasih();
    }
    public function pembina_jatiasih()
    {
        $data = [
            'title'     => 'Halaman Admin Pembina Jatiasih',
            'subtitle'  => 'Data Pembina',
            'page'      => 'Pembina Jatiasih',
            'menu'      => 'jatiasih',
            'submenu'   => 'pembinajatiasih',
            'jatiasih'  => $this->ModelPembina_jatiasih->findAll(),
        ];

        return view('jatiasih/pembina_jatiasih', $data);
    }

    public function detailData_pembina($idpembina_jatiasih)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Jatiasih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatiasih',
            'submenu'       => 'pembinajatiasih',
            'jatiasih'       => $this->ModelPembina_jatiasih->detailData_pembina($idpembina_jatiasih),
        ];

        return view('/jatiasih/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_jatiasih)
    {
        $namaGambar = $this->ModelPembina_jatiasih->find($idpembina_jatiasih);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'jatiasih'    => $this->ModelPembina_jatiasih->findAll(),
        ];

        return view('jatiasih/excelData_pembina', $data);
    }

    public function deleteData($idpembina_jatiasih)
    {
        $jatiasih = $this->ModelPembina_jatiasih->find($idpembina_jatiasih);

        unlink('image/' . $jatiasih['foto']);

        $data = [
            'idpembina_jatiasih'    => $idpembina_jatiasih,
        ];

        $this->ModelPembina_jatiasih->deleteData($idpembina_jatiasih, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Jatiasih/pembina_jatiasih');
    }

    public function pelatih_jatiasih()
    {
        $data = [
            'title'     => 'Halaman Admin Pelatih Jatiasih',
            'subtitle'  => 'Data Pelatih',
            'page'      => 'pelatih Jatiasih',
            'menu'      => 'jatiasih',
            'submenu'   => 'pelatihjatiasih',
            'jatiasih'  => $this->ModelPelatih_jatiasih->findAll(),
        ];

        return view('jatiasih/pelatih_jatiasih', $data);
    }

    public function detailData_pelatih($idpelatih_jatiasih)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Jatiasih',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'jatiasih',
            'submenu'       => 'pelatihjatiasih',
            'jatiasih'       => $this->ModelPelatih_jatiasih->detailData_pelatih($idpelatih_jatiasih),
        ];

        return view('/jatiasih/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_jatiasih)
    {
        $namaGambar = $this->ModelPelatih_jatiasih->find($idpelatih_jatiasih);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'jatiasih'    => $this->ModelPelatih_jatiasih->findAll(),
        ];

        return view('jatiasih/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_jatiasih)
    {
        $jatiasih = $this->ModelPelatih_jatiasih->find($idpelatih_jatiasih);

        unlink('image/' . $jatiasih['foto']);
        
        $data = [
            'idpelatih_jatiasih'    => $idpelatih_jatiasih
        ];

        $this->ModelPelatih_jatiasih->deletePelatih($idpelatih_jatiasih, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Jatiasih/pelatih_jatiasih');
    }
}