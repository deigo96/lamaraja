<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends CI_Model {
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

    public function checkJabatan($nama)
    {
        $query = $this->db->query("SELECT jabatan.nama FROM jabatan WHERE nama = '$nama' ");
        return $query->num_rows();
    }

    public function tambahJabatan($data)
    {
        return $this->db->insert('jabatan', $data);
    }

    public function hapusJabatan($id)
    {
        $this->db->where('id_jabatan', $id);
        return $this->db->delete('jabatan');
    }

    public function getDetailJabatan($id)
    {
        return $this->db->get_where('jabatan', array('id_jabatan'=>$id))->row();
    }

    public function checkEditJabatan($nama, $id)
    {
        $query = $this->db->query("SELECT jabatan.nama FROM jabatan WHERE nama = '$nama' AND id_kategori = '$id' ");
        return $query->num_rows();
    }

    public function updateJabatan($id, $data)
    {
        $this->db->where('id_jabatan', $id);
        return $this->db->update('jabatan', $data);
    }

    public function getJabatanByIdKategori($id)
    {
        $this->db->select('*');
        $this->db->where('id_kategori', $id);
        return $this->db->get('jabatan')->result();
    }

    public function getPosisiByKat()
    {
        $query = $this->db->query("SELECT kategori.kategori_id, kategori.nama, COUNT(lowongan.id_kategori) as jumlah_posisi
                                    FROM kategori
                                    LEFT JOIN lowongan ON kategori.kategori_id = lowongan.id_kategori
                                        GROUP BY kategori.nama ORDER BY kategori.kategori_id ASC LIMIT 6");
        return $query->result();
    }
}
