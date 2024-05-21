<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_bekasilatan extends Model
{
    protected $table                = 'pembina_bekasiselatan';
    protected $primaryKey           = 'idpembina_bekasilatan';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kml','thn_lulus_kmd', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_bekasilatan, $data)
    {
        return $this->db->table('pembina_bekasiselatan')
            ->where('idpembina_bekasilatan', $idpembina_bekasilatan)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_bekasiselatan')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_bekasiselatan')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_Pembina($idpembina_bekasilatan, $data)
    {
        return $this->db->table('pembina_bekasiselatan')
            ->where('idpembina_bekasilatan', $idpembina_bekasilatan)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_bekasilatan, $data)
    {
        return $this->db->table('pembina_bekasiselatan')
            ->where('idpembina_bekasilatan', $idpembina_bekasilatan)
            ->delete($data);
    }
}