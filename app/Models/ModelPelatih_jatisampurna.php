<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_jatisampurna extends Model
{
    protected $table            = 'pelatih_jatisampurna';
    protected $primaryKey       = 'idpelatih_jatisampurna';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama','slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_jatisampurna, $data)
    {
        return $this->db->table('pelatih_jatisampurna')
            ->where('idpelatih_jatisampurna', $idpelatih_jatisampurna)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_jatisampurna')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_jatisampurna')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_jatisampurna, $data)
    {
        return $this->db->table('pelatih_jatisampurna')
            ->where('idpelatih_jatisampurna', $idpelatih_jatisampurna)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_jatisampurna, $data)
    {
        return $this->db->table('pelatih_jatisampurna')
            ->where('idpelatih_jatisampurna', $idpelatih_jatisampurna)
            ->delete($data);
    }
}