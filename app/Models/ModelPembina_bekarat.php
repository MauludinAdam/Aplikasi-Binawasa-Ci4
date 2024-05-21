<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_bekarat extends Model
{
    protected $table                = 'pembina_bekasibarat';
    protected $primaryKey           = 'idpembina_bekasibarat';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_bekasibarat, $data)
    {
        return $this->db->table('pembina_bekasibarat')
            ->where('idpembina_bekasibarat', $idpembina_bekasibarat)
            ->delete($data);
    }


    public function insertData_pembina($data)
    {
        return $this->db->table('pembina_bekasibarat')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_bekasibarat')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pembina($idpembina_bekasibarat, $data)
    {
        return $this->db->table('pembina_bekasibarat')
            ->where('idpembina_bekasibarat', $idpembina_bekasibarat)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_bekasibarat, $data)
    {
        return $this->db->table('pembina_bekasibarat')
            ->where('idpembina_bekasibarat', $idpembina_bekasibarat)
            ->delete($data);
    }
}