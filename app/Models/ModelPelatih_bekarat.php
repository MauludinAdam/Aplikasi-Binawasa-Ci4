<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_bekarat extends Model
{
    protected $table                = 'pelatih_bekasibarat';
    protected $primaryKey           = 'idpelatih_bekarat';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpd','thn_lulus_kpl', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_bekarat, $data)
    {
        return $this->db->table('pelatih_bekasibarat')
            ->where('idpelatih_bekarat', $idpelatih_bekarat)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_bekasibarat')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_bekasibarat')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_bekarat, $data)
    {
        return $this->db->table('pelatih_bekasibarat')
            ->where('idpelatih_bekarat', $idpelatih_bekarat)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_bekarat, $data)
    {
        return $this->db->table('pelatih_bekasibarat')
            ->where('idpelatih_bekarat', $idpelatih_bekarat)
            ->delete($data);
    }
}