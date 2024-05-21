<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_pondokmelati extends Model
{
    protected $table            = 'pelatih_pondokmelati';
    protected $primaryKey       = 'idpelatih_pondokmelati';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama','slug','jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpl','thn_lulus_kpd', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_pondokmelati, $data)
    {
        return $this->db->table('pelatih_pondokmelati')
            ->where('idpelatih_pondokmelati', $idpelatih_pondokmelati)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_pondokmelati')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_pondokmelati')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_pondokmelati, $data)
    {
        return $this->db->table('pelatih_pondokmelati')
            ->where('idpelatih_pondokmelati', $idpelatih_pondokmelati)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_pondokmelati, $data)
    {
        return $this->db->table('pelatih_pondokmelati')
            ->where('idpelatih_pondokmelati', $idpelatih_pondokmelati)
            ->delete($data);
    }
}