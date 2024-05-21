<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_jatiasih extends Model
{
    protected $table = 'pembina_jatiasih';
    protected $primaryKey = 'idpembina_jatiasih';
    protected $allowedFields = ['nta', 'no_gudep', 'nama','slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_jatiasih, $data)
    {
        return $this->db->table('pembina_jatiasih')
        ->where('idpembina_jatiasih', $idpembina_jatiasih)
        ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_jatiasih')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_jatiasih')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_jatiasih, $data)
    {
        return $this->db->table('pembina_jatiasih')
            ->where('idpembina_jatiasih', $idpembina_jatiasih)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_jatiasih, $data)
    {
        return $this->db->table('pembina_jatiasih')
            ->where('idpembina_jatiasih', $idpembina_jatiasih)
            ->delete($data);
    }
}