<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_medansat extends Model
{
    protected $table            = 'pembina_medansatria';
    protected $primaryKey       = 'idpembina_medansatria';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama','slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deletePembina($idpembina_medansatria, $data)
    {
        return $this->db->table('pembina_medansatria')
            ->where('idpembina_medansatria', $idpembina_medansatria)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_medansatria')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_medansatria')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_medansatria, $data)
    {
        return $this->db->table('pembina_medansatria')
            ->where('idpembina_medansatria', $idpembina_medansatria)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_medansatria, $data)
    {
        return $this->db->table('pembina_medansatria')
            ->where('idpembina_medansatria', $idpembina_medansatria)
            ->delete($data);
    }
}