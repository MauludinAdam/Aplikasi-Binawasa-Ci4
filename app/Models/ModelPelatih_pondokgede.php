<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_pondokgede extends Model
{
    protected $table            = 'pelatih_pondokgede';
    protected $primaryKey       = 'idpelatih_pondokgede';
    protected $allowedFields    = ['nta','no_gudep', 'nama','slug','jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpl','thn_lulus_kpd', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_pondokgede, $data)
    {
        return $this->db->table('pelatih_pondokgede')
            ->where('idpelatih_pondokgede', $idpelatih_pondokgede)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_pondokgede')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_pondokgede')
            ->where('slug', $slug)
            ->Get()->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_pondokgede, $data)
       {
        return $this->db->table('pelatih_pondokgede')
        ->where('idpelatih_pondokgede', $idpelatih_pondokgede)
        ->update($data);
       }

       public function deleteData_pelatih($idpelatih_pondokgede, $data)
       {
        return $this->db->table('pelatih_pondokgede')
            ->where('idpelatih_pondokgede', $idpelatih_pondokgede)
            ->delete($data);
       }
}