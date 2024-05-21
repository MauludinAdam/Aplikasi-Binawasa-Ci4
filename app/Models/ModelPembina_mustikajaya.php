<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_mustikajaya extends Model
{
    protected $table            = 'pembina_mustikajaya';
    protected $primaryKey       = 'idpembina_mustikajaya';
    protected $allowdFields     = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_mustikajaya, $data)
    {
        return $this->db->table('pembina_mustikajaya')
            ->where('idpembina_mustikajaya', $idpembina_mustikajaya)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_mustikajaya')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_mustikajaya')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_mustikajaya, $data)
    {
        return $this->db->table('pembina_mustikajaya')
            ->where('idpembina_mustikajaya', $idpembina_mustikajaya)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_mustikajaya, $data)
    {
        return $this->db->table('pembina_mustikajaya')
            ->where('idpembina_mustikajaya', $idpembina_mustikajaya)
            ->delete($data);
    }
}