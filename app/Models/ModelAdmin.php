<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JumlahUser()
    {
        return $this->db->table('user')->countAll();
    }

    public function JmlPembinaBekatim()
    {
        return $this->db->table('pembina_bekasitimur')->countAll();
    }

    public function JmlPelatihbekatim()
    {
        return $this->db->table('pelatih_bekasitimur')->countAll();
    }

    public function JmlPembinaBekasilatan()
    {
        return $this->db->table('pembina_bekasiselatan')->countAll();
    }

    public function JmlPelatihBekasilatan()
    {
        return $this->db->table('pelatih_bekasiselatan')->countAll();
    }

    public function JmlPembinaBekarat()
    {
        return $this->db->table('pembina_bekasibarat')->countAll();
    }

    public function JmlPelatihBekarat()
    {
        return $this->db->table('pelatih_bekasibarat')->countAll();
    }

    public function JmlPembinaBekasut()
    {
        return $this->db->table('pembina_bekasiutara')->countAll();
    }

    public function JmlPelatihBekasut()
    {
        return $this->db->table('pelatih_bekasiutara')->countAll();
    }

    public function JmlPembinaMedansat()
    {
        return $this->db->table('pembina_medansatria')->countAll();
    }

    public function JmlPelatihMedansat()
    {
        return $this->db->table('pelatih_medansatria')->countAll();
    }

    public function JmlPembinaMustikajaya()
    {
        return $this->db->table('pembina_mustikajaya')->countAll();
    }

    public function JmlPelatihMustikajaya()
    {
        return $this->db->table('pelatih_mustikajaya')->countAll();
    }

    public function JmlPembinaRawalumbu()
    {
        return $this->db->table('pembina_rawalumbu')->countAll();
    }

    public function JmlPelatihRawalumbu()
    {
        return $this->db->table('pelatih_rawalumbu')->countAll();
    }

    public function JmlPembinaBantargebang()
    {
        return $this->db->table('pembina_bantargebang')->countAll();
    }

    public function JmlPelatihBantargebang()
    {
        return $this->db->table('pelatih_bantargebang')->countAll();
    }

    public function JmlPembinaJatisampurna()
    {
        return $this->db->table('pembina_jatisampurna')->countAll();
    }

    public function JmlPelatihJatisampurna()
    {
        return $this->db->table('pelatih_jatisampurna')->countAll();
    }

    public function JmlPembinaJatiasih()
    {
        return $this->db->table('pembina_jatiasih')->countAll();
    }

    public function JmlPelatihJatiasih()
    {
        return $this->db->table('pelatih_jatiasih')->countAll();
    }

    public function JmlPembinaPondokGede()
    {
        return $this->db->table('pembina_pondokgede')->countAll();
    }

    public function JmlPelatihPondokGede()
    {
        return $this->db->table('pelatih_pondokgede')->countAll();
    }

    public function JmlPembinaPondokMelati()
    {
        return $this->db->table('pembina_pondokmelati')->countAll();
    }

    public function JmlPelatihPondokMelati()
    {
        return $this->db->table('pelatih_pondokmelati')->countAll();
    }
}