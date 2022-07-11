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

    public function countUser()
    {
        $query = $this->db->query("SELECT COUNT(id_user) as count FROM users");
        return $query->row();
    }

    public function countPerusahaan()
    {
        $query = $this->db->query("SELECT COUNT(id_perusahaan) as count FROM perusahaan");
        return $query->row();
    }

    public function countLowongan()
    {
        $query = $this->db->query("SELECT COUNT(id_lowongan) as count FROM lowongan");
        return $query->row();
    }

    public function countJabatan()
    {
        $query = $this->db->query("SELECT COUNT(id_jabatan) as count FROM jabatan");
        return $query->row();
    }

    public function getUserBaru()
    {
        $query = $this->db->query("SELECT users.id_user, users.nama_user, profile_users.id_profile_user, profile_users.foto 
                                    FROM `users`
                                    LEFT JOIN profile_users ON users.id_user = profile_users.id_user
                                    ORDER BY tanggal_daftar DESC LIMIT 4");
        return $query->result();
    }

    public function getPerusahaanBaru()
    {
        $query = $this->db->query("SELECT perusahaan.id_perusahaan, perusahaan.nama_perusahaan, profile_perusahaan.id_profile_perusahaan 
                                    FROM `perusahaan`
                                    LEFT JOIN profile_perusahaan ON perusahaan.id_perusahaan = profile_perusahaan.id_perusahaan
                                    ORDER BY tanggal_daftar DESC LIMIT 4");
        return $query->result();
    }

    public function getLowonganBaru()
    {
        $query = $this->db->query("SELECT lowongan.id_lowongan, jabatan.nama, perusahaan.nama_perusahaan, lowongan.tanggal_post 
                                    FROM `lowongan`
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    ORDER BY id_lowongan DESC LIMIT 4");
        return $query->result();
    }

    public function getUserData()
    {
        $query = $this->db->query("SELECT users.id_user, users.nama_user, users.email, users.tanggal_daftar, profile_users.tanggal_lahir, profile_users.foto, profile_users.id_profile_user
                                    FROM users
                                    LEFT JOIN profile_users ON users.id_user = profile_users.id_user
                                    ORDER BY users.id_user DESC");
        return $query->result();
    }

    public function getPerusahaanData()
    {
        $query = $this->db->query("SELECT perusahaan.id_perusahaan, perusahaan.nama_perusahaan, perusahaan.email_login, perusahaan.tanggal_daftar, profile_perusahaan.telepon_perusahaan, profile_perusahaan.foto_perusahaan, profile_perusahaan.id_profile_perusahaan
                                    FROM perusahaan
                                    LEFT JOIN profile_perusahaan ON perusahaan.id_perusahaan = profile_perusahaan.id_perusahaan
                                    ORDER BY perusahaan.id_perusahaan DESC");
        return $query->result();
    }
}
