<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_jatiasih extends Model
{
    protected $table = "pelatih_jatiasih";
    protected $primaryKey = "idpelatih_jatiasih";
    protected $allowedFields = ['nta', 'no_gudep', 'nama','slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];


    public function deletePelatih($idpelatih_jatiasih, $data)
    {
        return $this->db->table('pelatih_jatiasih')
            ->where('idpelatih_jatiasih', $idpelatih_jatiasih)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_jatiasih')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_jatiasih')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_jatiasih, $data)
    {
        return $this->db->table('pelatih_jatiasih')
            ->where('idpelatih_jatiasih', $idpelatih_jatiasih)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_jatiasih, $data)
    {
        return $this->db->table('pelatih_jatiasih')
            ->where('idpelatih_jatiasih', $idpelatih_jatiasih)
            ->delete($data);
    }
}