<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

	public function checkAdmin($data)
    {
        return $this->db->get_where('admin', $data)->row();
    }

    public function getAdminData($id)
    {
        $this->db->select('nama, email, foto');
        $this->db->where('id_admin', $id);
        return $this->db->get('admin')->row();
    }
}
