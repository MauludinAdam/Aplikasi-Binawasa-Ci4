<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_bekasut extends Model
{
    protected $table            = 'pelatih_bekasiutara';
    protected $primaryKey       = 'idpelatih_bekasiutara';
    protected $allowedFields    = ['nta', 'no_gudep', 'nama', 'slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpd','thn_lulus_kpl', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_bekasiutara, $data)
    {
        return $this->db->table('pelatih_bekasiutara')
            ->where('idpelatih_bekasiutara', $idpelatih_bekasiutara)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_bekasiutara')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_bekasiutara')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_bekasiutara, $data)
    {
        return $this->db->table('pelatih_bekasiutara')
            ->where('idpelatih_bekasiutara', $idpelatih_bekasiutara)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_bekasiutara, $data)
    {
        return $this->db->table('pelatih_bekasiutara')
            ->where('idpelatih_bekasiutara', $idpelatih_bekasiutara)
            ->delete($data);
    }
}