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

    public function getAllLowongan()
    {
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten,profile_perusahaan.foto_perusahaan,COUNT(proses_lowongan.id_lowongan) AS jumlah_pelamar
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN profile_perusahaan ON lowongan.id_perusahaan = profile_perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    LEFT JOIN proses_lowongan ON lowongan.id_lowongan = proses_lowongan.id_lowongan
                                    GROUP BY lowongan.id_lowongan ORDER BY id_lowongan ASC");
        return $query->result();
    }
}
