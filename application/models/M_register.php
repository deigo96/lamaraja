<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_register extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

	public function register($data)
    {
        return $this->db->insert('users', $data);
    }

    public function checkEmail($email)
    {
        $query = $this->db->query("SELECT users.email FROM users WHERE email = '$email' ");
        return $query->num_rows();
    }
}
