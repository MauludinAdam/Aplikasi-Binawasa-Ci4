<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_jatisampurna extends Model
{
    protected $table            = 'pembina_jatisampurna';
    protected $primaryKey       = 'idpembina_jatisampurna';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_jatisampurna, $data)
    {
        return $this->db->table('pembina_jatisampurna')
            ->where('idpembina_jatisampurna', $idpembina_jatisampurna)
            ->delete($data);
    }

    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_jatisampurna')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_jatisampurna')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_jatisampurna, $data)
    {
        return $this->db->table('pembina_jatisampurna')
            ->where('idpembina_jatisampurna', $idpembina_jatisampurna)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_jatisampurna, $data)
    {
        return $this->db->table('pembina_jatisampurna')
            ->where('idpembina_jatisampurna', $idpembina_jatisampurna)
            ->delete($data);
    }
}