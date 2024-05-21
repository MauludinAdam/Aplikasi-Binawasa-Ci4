<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_bantargebang extends Model
{
    protected $table            = 'pembina_bantargebang';
    protected $primaryKey       = 'idpembina_bantargebang';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    // Hapus Data Admin
    public function deleteData($idpembina_bantargebang, $data)
    {
        return $this->db->table('pembina_bantargebang')
            ->where('idpembina_bantargebang', $idpembina_bantargebang)
            ->delete($data);
    }

    // Admin User
    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_bantargebang')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_bantargebang')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_bantargebang, $data)
    {
        return $this->db->table('pembina_bantargebang')
            ->where('idpembina_bantargebang', $idpembina_bantargebang)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_bantargebang, $data)
    {
        return $this->db->table('pembina_bantargebang')
            ->where('idpembina_bantargebang', $idpembina_bantargebang)
            ->delete($data);
    }
}