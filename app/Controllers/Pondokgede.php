<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_pondokgede;
use App\Models\ModelPelatih_pondokgede;
use App\Models\UserModel;

class Pondokgede extends BaseController
{
    protected $ModelPembina_Pondokgede;
    protected $ModelPelatih_pondokgede;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPelatih_pondokgede = new ModelPelatih_pondokgede();
        $this->ModelPembina_pondokgede = new ModelPembina_pondokgede();
    }
    public function pembina_pondokgede()
    {   
        $data = [
            'title'       => 'Halaman Admin Pembina Pondok Gede',
            'subtitle'    => 'Data Pembina',
            'page'        => 'Pembina Pondok Gede',
            'menu'        => 'pondokgede',
            'submenu'     => 'pembinapondokgede',
            'pondokgede'  => $this->ModelPembina_pondokgede->findAll()
        ];

        return view('pondokgede/pembina_pondokgede', $data);
    }

    public function detailData_pembina($idpembina_pondokgede)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Pondok Gede',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'       => 'pembinapondokgede',
            'pondokgede'    => $this->ModelPembina_pondokgede->detailData_pembina($idpembina_pondokgede),
        ];

        return view('/Pondokgede/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_pondokgede)
    {
        $namaGambar = $this->ModelPembina_pondokgede->find($idpembina_pondokgede);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'pondokgede'    => $this->ModelPembina_pondokgede->findAll(),
        ];

        return view('pondokgede/excelData_pembina', $data);
    }

    public function deleteData($idpembina_pondokgede)
    {
        $pondokgede = $this->ModelPembina_pondokgede->find($idpembina_pondokgede);

        unlink('image/' . $pondokgede['foto']);

        $data = [
            'idpembina_pondokgede'  => $idpembina_pondokgede,
        ];

        $this->ModelPembina_pondokgede->deleteData($idpembina_pondokgede, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Pondokgede/pembina_pondokgede');
    }

    public function pelatih_pondokgede()
    {
        $data = [
            'title'         => 'Halaman Admin Pelatih Pondok Gede',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Pondok Gede',
            'menu'          => 'pondokgede',
            'submenu'       => 'pelatihpondokgede',
            'pondokgede'    => $this->ModelPelatih_pondokgede->findAll()
        ];

        return view('pondokgede/pelatih_pondokgede', $data);
    }

    public function detailData_pelatih($idpelatih_pondokgede)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Pondok Gede',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'pondokgede',
            'submenu'       => 'pembinapondokgede',
            'pondokgede'    => $this->ModelPelatih_pondokgede->detailData_pelatih($idpelatih_pondokgede),
        ];

        return view('/Pondokgede/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_pondokgede)
    {
        $namaGambar = $this->ModelPelatih_pondokgede->find($idpelatih_pondokgede);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'pondokgede'    => $this->ModelPelatih_pondokgede->findAll(),
        ];

        return view('pondokgede/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_pondokgede)
    {
        $pondokgede = $this->ModelPelatih_pondokgede->find($idpelatih_pondokgede);

        unlink('image/' . $pondokgede['foto']);

        $data = [
            'idpelatih_pondokgede'  => $idpelatih_pondokgede
        ];

        $this->ModelPelatih_pondokgede->deletePelatih($idpelatih_pondokgede, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Pondokgede/Pelatih_pondokgede');
    }

    // Halaman User Admin Pondok Gede

   

}

    



