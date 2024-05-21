<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_rawalumbu extends Model
{
    protected $table                = 'pembina_rawalumbu';
    protected $primaryKey           = 'idpembina_rawalumbu';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_rawalumbu, $data)
    {
        return $this->db->table('pembina_rawalumbu')
            ->where('idpembina_rawalumbu', $idpembina_rawalumbu)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_rawalumbu')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_rawalumbu')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_rawalumbu, $data)
    {
        return $this->db->table('pembina_rawalumbu')
            ->where('idpembina_rawalumbu', $idpembina_rawalumbu)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_rawalumbu, $data)
    {
        return $this->db->table('pembina_rawalumbu')
            ->where('idpembina_rawalumbu', $idpembina_rawalumbu)
            ->delete($data);
    }

}