<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPembina_bekasilatan;
use App\Models\ModelPelatih_bekasilatan;
use App\Models\UserModel;

class Bekasilatan extends BaseController
{
    protected $UserModel;
    protected $ModelPeltaih_bekasilatan;
    protected $ModelPembina_bekasilatan;
    public function __construct()
    {
        $this->UserModel = new UserModel();
        $this->ModelPembina_bekasilatan = new ModelPembina_bekasilatan();
        $this->ModelPelatih_bekasilatan = new ModelPelatih_bekasilatan();
    }
    public function pembina_bekasilatan()
    {
        $data = [
            'title'         => 'Halaman Admin Pembina Bekasi Selatan',
            'subtitle'      => 'Data Pembina',
            'page'          => 'Pembina Bekasi Selatan',
            'menu'          => 'bekasilatan',
            'submenu'       => 'pembinabekasilatan',
            'bekasilatan'   => $this->ModelPembina_bekasilatan->findAll()
        ];

        return view('Bekasilatan/pembina_bekasilatan', $data);
    }

    public function detailData_pembina($idpembina_bekasilatan)
    {
        $data = [
            'title'         => 'Halaman Detail Pembina Bekasi Selatan',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekasilatan',
            'submenu'       => 'datapembina',
            'bekasilatan'       => $this->ModelPembina_bekasilatan->detailData_pembina($idpembina_bekasilatan),
        ];

        return view('bekasilatan/detailData_pembina', $data);
    }

    public function downloadData_pembina($idpembina_bekasilatan)
    {
        $namaGambar = $this->ModelPembina_bekasilatan->find($idpembina_bekasilatan);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pembina()
    {
        $data = [
            'bekasilatan'    => $this->ModelPembina_bekasilatan->findAll(),
        ];

        return view('Bekasilatan/excelData_pembina', $data);
    }

    public function deleteData($idpembina_bekasilatan)
    {
        $bekasilatan = $this->ModelPembina_bekasilatan->find($idpembina_bekasilatan);

        unlink('image/' . $bekasilatan['foto']);
        $data = [
            'idpembina_bekasilatan'     => $idpembina_bekasilatan,
        ];

        $this->ModelPembina_bekasilatan->deleteData($idpembina_bekasilatan, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekasilatan/pembina_bekasilatan');
    }

    public function pelatih_bekasilatan()
    {
        $data = [
            'title'         => 'Pelatih Bekasi Selatan',
            'subtitle'      => 'Data Pelatih',
            'page'          => 'Pelatih Bekasi Selatan',
            'menu'          => 'bekasilatan',
            'submenu'       => 'pelatihbekasilatan',
            'bekasilatan'   => $this->ModelPelatih_bekasilatan->findAll(),
        ];

        return view('bekasilatan/pelatih_bekasilatan', $data);
    }

    public function detailData_pelatih($idpelatih_bekasiselatan)
    {
        $data = [
            'title'         => 'Halaman Detail Pelatih Bekasi Selatan',
            'subtitle'      => '',
            'page'          => '',
            'menu'          => 'bekasilatan',
            'submenu'       => 'pelatihbekasilatan',
            'bekasilatan'       => $this->ModelPelatih_bekasilatan->detailData_pelatih($idpelatih_bekasiselatan),
        ];

        return view('bekasilatan/detailData_pelatih', $data);
    }

    public function downloadData_pelatih($idpelatih_bekasiselatan)
    {
        $namaGambar = $this->ModelPelatih_bekasilatan->find($idpelatih_bekasiselatan);
        return $this->response->download('ijazah/'. $namaGambar['ijazah'], null);

    }

    public function excelData_pelatih()
    {
        $data = [
            'bekasilatan'    => $this->ModelPelatih_bekasilatan->findAll(),
        ];

        return view('Bekasilatan/excelData_pelatih', $data);
    }


    public function deletePelatih($idpelatih_bekasiselatan)
    {
        $bekasilatan = $this->ModelPelatih_bekasilatan->find($idpelatih_bekasiselatan);

        unlink('image/' . $bekasilatan['foto']);

        $data = [
            'id_pelatih_bekasiselatan'   => $idpelatih_bekasiselatan,
        ];

        $this->ModelPelatih_bekasilatan->deletePelatih($idpelatih_bekasiselatan, $data);

        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('Bekasilatan/pelatih_bekasilatan');
    }

    // Halaman User Pembina Bekasi Selatan

    

}