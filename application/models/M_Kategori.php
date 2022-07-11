<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllKategori()
    {
        return $this->db->get('kategori')->result();
    }

    public function getAllJabatan()
    {
        $query = $this->db->query("SELECT jabatan.*, kategori.nama as nama_kategori FROM jabatan LEFT JOIN kategori ON jabatan.id_kategori = kategori.kategori_id");
        return $query->result();
    }

    public function checkKategori($nama)
    {
        $query = $this->db->query("SELECT kategori.nama FROM kategori WHERE nama = '$nama' ");
        return $query->num_rows();
    }

    public function tambahKategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function hapus_kategori($id)
    {
        $this->db->where('kategori_id', $id);
        return $this->db->delete('kategori');
    }

    public function getKategoriById($id)
    {
        return $this->db->get_where('kategori', array('kategori_id'=>$id))->row();
    }

    public function checkEditKategori($nama)
    {
        $query = $this->db->query("SELECT kategori.nama FROM kategori WHERE nama = '$nama' ");
        return $query->num_rows();
    }

    public function updateKategori($id, $data)
    {
        $this->db->where('kategori_id', $id);
        return $this->db->update('kategori', $data);
    }

}
