<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_bekatim extends Model
{
    protected $table            = 'pelatih_bekasitimur';
    protected $primaryKey       = 'idpelatih_bekatim';
    protected $alloweFields     = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpd','thn_lulus_kpl', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_bekatim, $data)
    {
        return $this->db->table('pelatih_bekasitimur')
            ->where('idpelatih_bekatim', $idpelatih_bekatim)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_bekasitimur')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_bekasitimur')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_bekatim, $data)
    {
        return $this->db->table('pelatih_bekasitimur')
            ->where('idpelatih_bekatim', $idpelatih_bekatim)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_bekatim, $data)
    {
        return $this->db->table('pelatih_bekasitimur')
            ->where('idpelatih_bekatim', $idpelatih_bekatim)
            ->delete($data);
    }
}