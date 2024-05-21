<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_pondokmelati extends Model
{
    protected $table            = 'pembina_pondokmelati';
    protected $primaryKey       = 'idpembina_pondokmelati';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama','slug','jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_pondokmelati, $data)
    {
        return $this->db->table('pembina_pondokmelati')
            ->where('idpembina_pondokmelati', $idpembina_pondokmelati)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_pondokmelati')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_pondokmelati')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_pondokmelati, $data)
    {
        return $this->db->table('pembina_pondokmelati')
            ->where('idpembina_pondokmelati', $idpembina_pondokmelati)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_pondokmelati, $data)
    {
        return $this->db->table('pembina_pondokmelati')
            ->where('idpembina_pondokmelati', $idpembina_pondokmelati)
            ->delete($data);
    }
}
