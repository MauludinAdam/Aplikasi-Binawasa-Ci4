<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_pondokmelati;
use App\Models\ModelPelatih_pondokmelati;

class Pondokmelati extends BaseController
{
    public function __construct()
    {
        $this->ModelPelatih_pondokmelati = new ModelPelatih_Pondokmelati();
        $this->ModelPembina_pondokmelati = new ModelPembina_pondokmelati();
    }
    public function pembina_pondokmelati()
    {
        $data = [
            'title'         => 'Halaman Admin Pembina Pondok Melati',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Pondok Melati',
            'menu'          => 'pondokmelati',
            'submenu'       => 'pembinapondokmelati',
            'pondokmelati'  => $this->ModelPembina_pondokmelati->findAll()
        ];

        return view('pondokmelati/pembina_pondokmelati', $data);
    }

    public function detailData_pembina($idpembina_pondokmelati)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Pondok Melati',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'pembinapondokmelati',
            'pondokmelati'    => $this->ModelPembina_pondokmelati->detailData_pembina($idpembina_pondokmelati),
        ];

        return view('/Pondokmelati/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_pondokmelati)
    {
        $namaGambar = $this->ModelPembina_pondokmelati->find($idpembina_pondokmelati);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'pondokmelati'    => $this->ModelPembina_pondokmelati->findAll(),
        ];

        return view('pondokmelati/excelData_pembina', $data);
    }

    public function deleteData($idpembina_pondokmelati)
    {
        $pondokmelati = $this->ModelPembina_pondokmelati->find($idpembina_pondokmelati);

        unlink('image/' . $pondokmelati['foto']);

        $data = [
            'idpembina_pondokmelati'    => $idpembina_pondokmelati,
        ];

        $this->ModelPembina_pondokmelati->deleteData($idpembina_pondokmelati, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Pondokmelati/pembina_pondokmelati');
    }

    public function pelatih_pondokmelati()
    {
        $data = [
            'title'         => 'Halaman Admin pembina Pondok Melati',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Pondok Melati',
            'menu'          => 'pondokmelati',
            'submenu'       => 'pelatihpondokmelati',
            'pondokmelati'  => $this->ModelPelatih_pondokmelati->findAll()
        ];

        return view('pondokmelati/pelatih_pondokmelati', $data);
    }

    public function detailData_pelatih($idpelatih_pondokmelati)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Pondok Melati',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokmelati',
            'submenu'       => 'pelatihpondokmelati',
            'pondokmelati'    => $this->ModelPelatih_pondokmelati->detailData_pelatih($idpelatih_pondokmelati),
        ];

        return view('/Pondokmelati/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_pondokmelati)
    {
        $namaGambar = $this->ModelPelatih_pondokmelati->find($idpelatih_pondokmelati);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'pondokmelati'    => $this->ModelPelatih_pondokmelati->findAll(),
        ];

        return view('pondokmelati/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_pondokmelati)
    {
        $pondokmelati = $this->ModelPelatih_pondokmelati->find($idpelatih_pondokmelati);
    
        unlink('image/' . $pondokmelati['foto']);

        $data = [
            'idpelatih_pondokmelati'    => $idpelatih_pondokmelati,
        ];

        $this->ModelPelatih_pondokmelati->deletePelatih($idpelatih_pondokmelati, $data);

        session()->setFlashdata('pesan', 'Data berhasih dihapus');
        return redirect()->to('Pondokmelati/pelatih_pondokmelati');
    }
}