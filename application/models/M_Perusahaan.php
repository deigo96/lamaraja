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

}


