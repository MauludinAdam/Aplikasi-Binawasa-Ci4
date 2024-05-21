<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_mustikajaya;
use App\Models\ModelPelatih_mustikajaya;
use App\Models\UserModel;

class Mustikajaya extends BaseController
{
    protected $UserModel;
    protected $ModelPelatih_mustikajaya;
    protected $ModelPembina_mustikajaya;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPembina_mustikajaya = new ModelPembina_mustikajaya();
        $this->ModelPelatih_mustikajaya = new ModelPelatih_mustikaJaya();
    }
    public function pembina_mustikajaya()
    {
        $data = [
            'title'           => 'Halama Admin Pembina Mustika Jaya',
            'subtitle'        => 'Data Pembina',
            'page'            => 'Pembina Mustika jaya',
            'menu'            => 'mustikajaya',
            'submenu'         => 'pembinamustikajaya',
            'mustikajaya'     => $this->ModelPembina_mustikajaya->findAll(),
        ];

        return view('mustikajaya/pembina_mustikajaya', $data);
    }

    public function detailData_pembina($idpembina_mustikajaya)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Mustika Jaya',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'pembinamustikajaya',
            'mustikajaya'   => $this->ModelPembina_mustikajaya->detailData_pembina($idpembina_mustikajaya),
        ];

        return view('mustikajaya/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_mustikajaya)
    {
        $namaGambar = $this->ModelPembina_mustikajaya->find($idpembina_mustikajaya);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'mustikajaya'    => $this->ModelPembina_mustikajaya->findAll(),
        ];

        return view('Mustikajaya/excelData_pembina', $data);
    }

    public function deleteData($idpembina_mustikajaya)
    {
        $mustikajaya = $this->ModelPembina_mustikajaya->find($idpembina_mustikajaya);

        unlink('image' . $mustikajaya['foto']);
        $data = [
            'idpembina_mustikajaya'     => $idpembina_mustikajaya
        ];

        $this->ModelPembina_mustikajaya->deleteData($idpembina_mustikajaya, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Mustikajaya/pembina_mustikajaya');
    }

    public function pelatih_mustikajaya()
    {
        $data = [
            'title'         => 'Halaman Admin Pelatih Mustika Jaya',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Mustika Jaya',
            'menu'          => 'mustikajaya',
            'submenu'       => 'pelatihmustikajaya',
            'mustikajaya'   => $this->ModelPelatih_mustikajaya->findAll(),
        ];

        return view('mustikajaya/pelatih_mustikajaya', $data);
    }

    public function detailData_pelatih($idpelatih_mustikajaya)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Mustika Jaya',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'mustikajaya',
            'submenu'       => 'pelatihmustikajaya',
            'mustikajaya'   => $this->ModelPelatih_mustikajaya->detailData_pelatih($idpelatih_mustikajaya),
        ];

        return view('mustikajaya/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_mustikajaya)
    {
        $namaGambar = $this->ModelPelatih_mustikajaya->find($idpelatih_mustikajaya);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'mustikajaya'    => $this->ModelPelatih_mustikajaya->findAll(),
        ];

        return view('Mustikajaya/excelData_pelatih', $data);
    }

    public function deletePelatih($idpelatih_mustikajaya)
    {
        $mustikajaya = $this->ModelPelatih_mustikajaya->find($idpelatih_mustikajaya);

        unlink('image/' . $mustikajaya['foto']);

        $data = [
            'idpelatih_mustikajaya'     => $idpelatih_mustikajaya,
        ];

        $this->ModelPelatih_mustikajaya->deletePelatih($idpelatih_mustikajaya, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Mustikajaya/pelatih_mustikajaya');
    }

    
}