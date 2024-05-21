<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_mustikajaya extends Model
{
    protected $table            = 'pelatih_mustikajaya';
    protected $primaryKey       = 'idpelatih_mustikajaya';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama', 'slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpd','thn_lulus_kpl', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_mustikajaya, $data)
    {
        return $this->db->table('pelatih_mustikajaya')
            ->where('idpelatih_mustikajaya', $idpelatih_mustikajaya)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_mustikajaya')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_mustikajaya')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }
    
    public function ubahData_pelatih($idpelatih_mustikajaya, $data)
    {
        return $this->db->table('pelatih_mustikajaya')
            ->where('idpelatih_mustikajaya', $idpelatih_mustikajaya)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_mustikajaya, $data)
    {
        return $this->db->table('pelatih_mustikajaya')
            ->where('idpelatih_mustikajaya', $idpelatih_mustikajaya)
            ->delete($data);
    }
}