<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kontak extends CI_Model {
    public function getKontak()
    {
        $this->db->select('*');
        return $this->db->get('lamaraja')->row();
    }
}