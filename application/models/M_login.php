<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

	public function checkLogin($data)
    {
        return $this->db->get_where('users', $data)->result();
    }
}
