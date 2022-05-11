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
}
