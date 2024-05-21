<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelatih_bekasilatan extends Model
{
    protected $table                = 'pelatih_bekasiselatan';
    protected $primaryKey           = 'idpelatih_bekasiselatan';
    protected $allowedFields        = ['nta', 'no_gudep', 'nama','slug', 'jenkel', 'tempat_lhr', 'tgl_lhr','email','no_telp','pangkalan','kualifikasi', 'golongan','thn_lulus_kpd','thn_lulus_kpl', 'alamat', 'ijazah','foto'];

    public function deletePelatih($idpelatih_bekasiselatan, $data)
    {
        return $this->db->table('pelatih_bekasiselatan')
            ->where('idpelatih_bekasiselatan', $idpelatih_bekasiselatan)
            ->delete($data);
    }

    public function insertData_pelatih($data)
    {
        return $this->db->table('pelatih_bekasiselatan')->insert($data);
    }

    public function detailData_pelatih($slug)
    {
        return $this->db->table('pelatih_bekasiselatan')
            ->where('slug', $slug)
            ->Get()
            ->getRowArray();
    }

    public function ubahData_pelatih($idpelatih_bekasiselatan, $data)
    {
        return $this->db->table('pelatih_bekasiselatan')
            ->where('idpelatih_bekasiselatan', $idpelatih_bekasiselatan)
            ->update($data);
    }

    public function deleteData_pelatih($idpelatih_bekasiselatan, $data)
    {
        return $this->db->table('pelatih_bekasiselatan')
            ->where('idpelatih_bekasiselatan', $idpelatih_bekasiselatan)
            ->delete($data);
    }
}