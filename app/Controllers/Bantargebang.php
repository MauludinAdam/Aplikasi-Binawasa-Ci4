<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_bantargebang;
use App\Models\ModelPelatih_bantargebang;

class Bantargebang extends BaseController
{
    protected $ModelPelatih_bantargebang;
    protected $ModelPembina_bantargebang;
    public function __construct()
    {
        $this->ModelPelatih_bantargebang = new ModelPelatih_bantargebang();
        $this->ModelPembina_bantargebang = new ModelPembina_bantargebang();
    }
    public function pembina_bantargebang()
    {
        $data = [
            'title'         => 'Halaman Admin Pembina Bantar Gebang',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Bantargebang',
            'menu'          => 'bantargebang',
            'submenu'       => 'pembinabantargebang',
            'bantargebang'   => $this->ModelPembina_bantargebang->findAll(),
        ];

        return view('bantargebang/pembina_bantargebang', $data);
    }

    public function detailData_pembina($idpembina_bantargebang)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Bantar Gebang',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bantargebang',
            'submenu'       => 'pembinabantargebang',
            'bantargebang'       => $this->ModelPembina_bantargebang->detailData_pembina($idpembina_bantargebang),
        ];

        return view('bantargebang/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_bantargebang)
    {
        $namaGambar = $this->ModelPembina_bantargebang->find($idpembina_bantargebang);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'bantargebang'    => $this->ModelPembina_bantargebang->findAll(),
        ];

        return view('Bantargebang/excelData_pembina', $data);
    }

    public function deleteData($idpembina_bantargebang)
    {
        $bantargebang = $this->ModelPembina_bantargebang->find($idpembina_bantargebang);

        unlink('image/' . $bantargebang['foto']);

        $data = [
            'idpembina_bantargebang'    => $idpembina_bantargebang,
        ];

        $this->ModelPembina_bantargebang->deleteData($idpembina_bantargebang, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bantargebang/pembina_bantargebang');
    }

    public function pelatih_bantargebang()
    {
        $data = [
            'title'         => 'Halaman Pelatih Bantar Gebang',
            'subtitle'      => 'Data pelatih',
            'page'          => 'Pelatih Bantar Gebang',
            'menu'          => 'bantargebang',
            'submenu'       => 'pelatihbantargebang',
            'bantargebang'  => $this->ModelPelatih_bantargebang->findAll()
        ];

        return view('bantargebang/pelatih_bantargebang', $data);
    }

    public function detailData_pelatih($idpelatih_bantargebang)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Bantar Gebang',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bantargebang',
            'submenu'       => 'pelatihbantargebang',
            'bantargebang'       => $this->ModelPelatih_bantargebang->detailData_pelatih($idpelatih_bantargebang),
        ];

        return view('bantargebang/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_bantargebang)
    {
        $namaGambar = $this->ModelPelatih_bantargebang->find($idpelatih_bantargebang);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'bantargebang'    => $this->ModelPelatih_bantargebang->findAll(),
        ];

        return view('Bantargebang/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_bantargebang)
    {
        $bantargebang = $this->ModelPelatih_bantargebang->find($idpelatih_bantargebang);

        unlink('image/' . $bantargebang['foto']);
        
        $data = [
            'idpelatih_bantargebang'    => $idpelatih_bantargebang,
        ];

        $this->ModelPelatih_bantargebang->deletePelatih($idpelatih_bantargebang, $data);

        session()->setFlashdata('pesan','Data berhasil dihapus');
        return redirect()->to('bantargebang/pelatih_bantargebang');
    }
}