<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

	public function getUserData($id)
    {
        return $this->db->get_where('users', array('id_user'=>$id))->row();
    }

    public function getProfile($id)
    {
        return $this->db->get_where('profile_users', array('id_user'=>$id))->row();
    }

    public function checkProfileUser($id)
    {
        return $this->db->get_where('profile_users', array('id_user'=>$id))->row();
    }

    public function saveProfile($data)
    {
        return $this->db->insert('profile_users', $data);
    }

    public function updateProfile($data)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('id_user', $id);
        return $this->db->update('profile_users', $data);
    }

    public function checkPassword($id, $pass)
    {
        $query = $this->db->query("SELECT users.id_user FROM users WHERE users.id_user = '$id' AND users.password ='$pass' ");
        return $query->num_rows();
    }

    public function gantiPass($data)
    {
        $id = $this->session->userdata('id_user');
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

    public function countPerusahaan()
    {
        return $this->db->get('perusahaan')->num_rows();
    }

    public function countWilayah()
    {
        $this->db->group_by('id_provinsi');
        return $this->db->get('lowongan')->num_rows();
    }
    
    public function countUser()
    {
        return $this->db->get('users')->num_rows();
    }

    public function getjabatan()
    {
        $query = $this->db->query('SELECT jabatan.nama, COUNT(lowongan.id_jabatan) as jumlah
                                    FROM jabatan 
                                    LEFT JOIN lowongan ON jabatan.id_jabatan = lowongan.id_jabatan 
                                        GROUP BY jabatan.nama ORDER BY jumlah DESC LIMIT 16');
        return $query->result();
    }

    public function getAllLowongan($kategori, $lokasi, $tipe)
    {
        $checkKategori = "";
        if($kategori == "" && $lokasi == "" && $tipe == "" )
            $checkKategori = "lowongan.id_kategori  IS NOT NULL";
        else    
            $checkKategori = "
                                (lowongan.id_kategori IS NULL OR lowongan.id_kategori = '$kategori')
                                OR(lowongan.id_kabupaten IS NULL OR lowongan.id_kabupaten = '$lokasi')
                                OR(lowongan.tipePekerjaan IS NULL OR lowongan.tipePekerjaan = '$tipe')
                            ";
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    WHERE $checkKategori
                                    ORDER BY nama_jabatan ASC");
        return $query->result();
    }

    public function getLowonganById($id)
    {
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id 
                                    WHERE lowongan.id_lowongan = '$id'");
        return $query->row();
    }

    public function applied($data)
    {
        return $this->db->insert('proses_lowongan', $data);
    }

    public function checkLamaran($id, $idLowongan)
    {
        $this->db->select('*');
        $this->db->where(array('id_user' =>$id, 'id_lowongan'=>$idLowongan));
        return $this->db->get('proses_lowongan')->num_rows();
    }
}
