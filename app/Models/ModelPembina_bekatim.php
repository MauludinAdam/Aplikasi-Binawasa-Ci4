<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_bekatim extends Model
{
    protected $table                = 'pembina_bekasitimur';
    protected $primaryKey           = 'idpembina_bekatim';
    protected $allowedFields        =  ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];


    public function deleteData($idpembina_bekatim, $data)
    {
        return $this->db->table('pembina_bekasitimur')
            ->where('idpembina_bekatim', $idpembina_bekatim)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_bekasitimur')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_bekasitimur')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_bekatim, $data)
    {
        return $this->db->table('pembina_bekasitimur')
            ->where('idpembina_bekatim', $idpembina_bekatim)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_bekatim, $data)
    {
        return $this->db->table('pembina_bekasitimur')
            ->where('idpembina_bekatim', $idpembina_bekatim)
            ->delete($data);
    }
}