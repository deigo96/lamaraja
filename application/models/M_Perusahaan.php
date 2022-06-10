<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Perusahaan extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllData($id)
    {
        $this->db->select('*');
        $this->db->where('id_perusahaan', $id);
        return $this->db->get('perusahaan')->row();
    }

    public function getProfilePerusahaan($id)
    {
        $this->db->select('*');
        $this->db->where('id_perusahaan', $id);
        return $this->db->get('profile_perusahaan')->row();
    }

    public function checkProfilePerusahaan($id)
    {
        return $this->db->get_where('profile_perusahaan', array('id_perusahaan'=>$id))->row();
    }

    public function saveProfile($data)
    {
        return $this->db->insert('profile_perusahaan', $data);
    }

    public function updateProfile($data)
    {
        $id = $this->session->userdata('id_perusahaan');
        $this->db->where('id_perusahaan', $id);
        return $this->db->update('profile_perusahaan', $data);
    }

    public function updatePerusahaan($id)
    {
        $data['status'] = 1;
        $this->db->where('id_perusahaan', $id);
        return $this->db->update('perusahaan', $data);
    }

    public function checkPassword($id, $password)
    {
        $query = $this->db->query("SELECT perusahaan.id_perusahaan FROM perusahaan WHERE perusahaan.id_perusahaan = '$id' AND perusahaan.password ='$password' ");
        return $query->num_rows();
    }

    public function gantiPass($data)
    {
        $id = $this->session->userdata('id_perusahaan');
        $this->db->where('id_perusahaan', $id);
        return $this->db->update('perusahaan', $data);
    }

	public function checkLogin($data)
    {
        return $this->db->get_where('perusahaan', $data)->result();
    }

    public function checkEmail($email)
    {
        $this->db->select('email_login');
        $this->db->where('email_login', $email);
        return $this->db->get('perusahaan')->num_rows();
    }

    public function checkNama($nama)
    {
        $this->db->select('nama_perusahaan');
        $this->db->where('nama_perusahaan', $nama);
        return $this->db->get('perusahaan')->num_rows();
    }

    public function registerPerusahaan($data)
    {
        return $this->db->insert('perusahaan', $data);
    }

    public function tambahLowongan($data)
    {
        return $this->db->insert('lowongan', $data);
    }

    public function getAllKandidat($idPerusahaan)
    {
        $query = $this->db->query("SELECT proses_lowongan.*,profile_users.nama as nama_pelamar, profile_users.nama_institusi,profile_users.jurusan,profile_users.deskripsi as deskripsi_pelamar,profile_users.foto, lowongan.*, jabatan.nama as nama_jabatan
                                    FROM `proses_lowongan`
                                    LEFT JOIN lowongan ON proses_lowongan.id_lowongan = lowongan.id_lowongan
                                    LEFT JOIN users ON proses_lowongan.id_user = users.id_user
                                    LEFT JOIN profile_users on profile_users.id_user = users.id_user
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    WHERE lowongan.id_perusahaan = '$idPerusahaan' AND proses_lowongan.status = '0'");
        return $query->result();
    }

    public function getProfileKandidat($idPelamar, $idPerusahaan)
    {
        $query = $this->db->query("SELECT proses_lowongan.*,proses_lowongan.status as status_lamaran,users.email as email_pelamar,profile_users.*,profile_users.deskripsi as deskripsi_pelamar, lowongan.*, jabatan.nama as nama_jabatan
                                    FROM `proses_lowongan`
                                    LEFT JOIN lowongan ON proses_lowongan.id_lowongan = lowongan.id_lowongan
                                    LEFT JOIN users ON proses_lowongan.id_user = users.id_user
                                    LEFT JOIN profile_users on profile_users.id_user = users.id_user
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    WHERE lowongan.id_perusahaan = '$idPerusahaan' AND proses_lowongan.id_proses_lowongan = '$idPelamar'");
        return $query->row();
    }

    public function prosesLamaran($data, $idLamaran)
    {
        $this->db->where('id_proses_lowongan', $idLamaran);
        return $this->db->update('proses_lowongan', $data);
    }

}


