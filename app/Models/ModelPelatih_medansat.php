<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_medansat extends Model
{
    protected $table            = 'pelatih_medansatria';
    protected $primaryKey       = 'idpelatih_medansatria';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpd','thn_lulus_kpl', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_medansatria, $data)
    {
        return $this->db->table('pelatih_medansatria')
            ->where('idpelatih_medansatria', $idpelatih_medansatria)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_medansatria')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_medansatria')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_medansatria, $data)
    {
        return $this->db->table('pelatih_medansatria')
            ->where('idpelatih_medansatria', $idpelatih_medansatria)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_medansatria, $data)
    {
        return $this->db->table('pelatih_medansatria')
            ->where('idpelatih_medansatria', $idpelatih_medansatria)
            ->delete($data);
    }
}