<?php

namespace App\Controllers;
use App\Models\ModelAdmin;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }
    public function index()
    {
        $data = [
            'title'                     => 'Dashboard',
            'subtitle'                  => '',
            'page'                      => 'Halaman Dashboard',
            'menu'                      => 'dashboard',
            'submenu'                   => '',       
            'jml_user'                  => $this->ModelAdmin->JumlahUser(),
            'jml_pembina_bekatim'       => $this->ModelAdmin->JmlPembinaBekatim(),
            'jml_pelatih_bekatim'       => $this->ModelAdmin->JmlPelatihbekatim(),
            'jml_pembina_bekasilatan'   => $this->ModelAdmin->JmlPembinaBekasilatan(),
            'jml_pelatih_bekasilatan'   => $this->ModelAdmin->JmlPelatihBekasilatan(),
            'jml_pembina_bekarat'       => $this->ModelAdmin->JmlPembinaBekarat(),
            'jml_pelatih_bekarat'       => $this->ModelAdmin->JmlPelatihBekarat(),
            'jml_pembina_bekasut'       => $this->ModelAdmin->JmlPembinaBekasut(),
            'jml_pelatih_bekasut'       => $this->ModelAdmin->JmlPelatihBekasut(),
            'jml_pembina_medansat'      => $this->ModelAdmin->JmlPembinaMedansat(),
            'jml_pelatih_medansat'      => $this->ModelAdmin->JmlPelatihMedansat(),
            'jml_pembina_mustikajaya'   => $this->ModelAdmin->JmlPembinaMustikajaya(),
            'jml_pelatih_mustikajaya'   => $this->ModelAdmin->JmlPelatihMustikajaya(),
            'jml_pembina_rawalumbu'     => $this->ModelAdmin->JmlPembinaRawalumbu(),
            'jml_pelatih_rawalumbu'     => $this->ModelAdmin->JmlPelatihRawalumbu(),
            'jml_pembina_bantargebang'  => $this->ModelAdmin->JmlPembinaBantargebang(),
            'jml_pelatih_bantargebang'  => $this->ModelAdmin->JmlPelatihBantargebang(),
            'jml_pembina_jatisampurna'  => $this->ModelAdmin->JmlPembinaJatisampurna(),
            'jml_pelatih_jatisampurna'  => $this->ModelAdmin->JmlPelatihJatisampurna(),
            'jml_pembina_jatiasih'      => $this->ModelAdmin->JmlPembinaJatiasih(),
            'jml_pelatih_jatiasih'      => $this->ModelAdmin->JmlPelatihJatiasih(),
            'jml_pembina_pondokgede'    => $this->ModelAdmin->JmlPembinaPondokGede(),
            'jml_pelatih_pondokgede'    => $this->ModelAdmin->JmlPelatihPondokGede(),
            'jml_pembina_pondokmelati'  => $this->ModelAdmin->JmlPembinaPondokMelati(),
            'jml_pelatih_pondokmelati'  => $this->ModelAdmin->JmlPelatihPondokMelati(),
        ];
        
        return view('home/index', $data);
    }

}
