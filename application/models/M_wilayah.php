<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_wilayah extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllProvinsi()
    {
        return $this->db->get('provinces')->result();
    }

    public function getAllKabupaten($idProvinsi)
    {
        $this->db->select('*');
        $this->db->where('province_id', $idProvinsi);
        return $this->db->get('regencies')->result();
    }

    public function getAllKecamatan($idKabupaten)
    {
        $this->db->select('*');
        $this->db->where('regency_id', $idKabupaten);
        return $this->db->get('districts')->result();
    }

    public function getAllDesa($idKecamatan)
    {
        $this->db->select('*');
        $this->db->where('district_id', $idKecamatan);
        return $this->db->get('villages')->result();
    }

    public function getKabupatenById($id)
    {
        return $this->db->get_where('regencies', array('id'=>$id))->row();
    }

    public function getKecamatanById($id)
    {
        return $this->db->get_where('districts', array('id'=>$id))->row();
    }

}


