<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_bantargebang extends Model
{
    protected $table                = 'pelatih_bantargebang';
    protected $primaryKey           = 'idpelatih_bantargebang';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kmd','thn_lulus_kml', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_bantargebang, $data)
    {
        return $this->db->table('pelatih_bantargebang')
            ->where('idpelatih_bantargebang', $idpelatih_bantargebang)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_bantargebang')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_bantargebang')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_bantargebang, $data)
    {
        return $this->db->table('pelatih_bantargebang')
            ->where('idpelatih_bantargebang', $idpelatih_bantargebang)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_bantargebang, $data)
    {
        return $this->db->table('pelatih_bantargebang')
            ->where('idpelatih_bantargebang', $idpelatih_bantargebang)
            ->delete($data);
    }
}