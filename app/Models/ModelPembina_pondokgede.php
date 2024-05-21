<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelPembina_pondokgede extends Model
{
    protected $table                = 'pembina_pondokgede';
    protected $primaryKey           = 'idpembina_pondokgede';
    protected $allowedFields        = ['nta','no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deleteData($idpembina_pondokgede, $data)
    {
        return $this->db->table('pembina_pondokgede')
            ->where('idpembina_pondokgede', $idpembina_pondokgede)
            ->delete($data);
    }

    // ini form tambah data untuk user admin pondok gede
    public function insertData($data)
    {
       return $this->db->table('pembina_pondokgede')->insert($data);
    }

    public function detailData_pembina($slug)
    {
        return $this->db->table('pembina_pondokgede')
            ->where('slug', $slug)
            ->Get()->getRowArray();
    }

    public function editData($idpembina_pondokgede, $data)
    {
        return $this->db->table('pembina_pondokgede')
            ->where('idpembina_pondokgede', $idpembina_pondokgede)
            ->update($data);
    }

    public function deleteData_pembina($idpembina_pondokgede, $data)
    {
        return $this->db->table('pembina_pondokgede')
            ->where('idpembina_pondokgede', $idpembina_pondokgede)
            ->delete($data);
    }

}