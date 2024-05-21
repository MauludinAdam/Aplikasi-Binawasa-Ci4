<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_bekasut extends Model
{
    protected $table                = 'pembina_bekasiutara';
    protected $primaryKey           = 'idpembina_bekasut';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_bekasut, $data)
    {
        return $this->db->table('pembina_bekasiutara')
            ->where('idpembina_bekasut', $idpembina_bekasut)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_bekasiutara')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_bekasiutara')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_bekasut, $data)
    {
        return $this->db->table('pembina_bekasiutara')
        ->where('idpembina_bekasut', $idpembina_bekasut)
        ->update($data);
    }

    public function deleteData_pembina($idpembina_bekasut, $data)
    {
        return $this->db->table('pembina_bekasiutara')
            ->where('idpembina_bekasut', $idpembina_bekasut)
            ->delete($data);
    }
}