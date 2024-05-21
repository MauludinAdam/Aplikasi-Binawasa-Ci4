<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_rawalumbu extends Model
{
    protected $table                = 'pelatih_rawalumbu';
    protected $primaryKey           = 'idpelatih_rawalumbu';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_rawalumbu, $data)
    {
        return $this->db->table('pelatih_rawalumbu')
            ->where('idpelatih_rawalumbu', $idpelatih_rawalumbu)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_rawalumbu')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_rawalumbu')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_rawalumbu, $data)
    {
        return $this->db->table('pelatih_rawalumbu')
            ->where('idpelatih_rawalumbu', $idpelatih_rawalumbu)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_rawalumbu, $data)
    {
        return $this->db->table('pelatih_rawalumbu')
            ->where('idpelatih_rawalumbu', $idpelatih_rawalumbu)
            ->delete($data);
    }

}