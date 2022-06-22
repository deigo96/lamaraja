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

    public function countPerusahaan()
    {
        return $this->db->get('perusahaan')->num_rows();
    }

    public function countWilayah()
    {
        $this->db->group_by('id_provinsi');
        return $this->db->get('lowongan')->num_rows();
    }
    
    public function countUser()
    {
        return $this->db->get('users')->num_rows();
    }

    public function getjabatan()
    {
        $query = $this->db->query('SELECT jabatan.nama,lowongan.id_jabatan, COUNT(lowongan.id_jabatan) as jumlah
                                    FROM jabatan 
                                    LEFT JOIN lowongan ON jabatan.id_jabatan = lowongan.id_jabatan 
                                        GROUP BY jabatan.nama ORDER BY jumlah DESC LIMIT 16');
        return $query->result();
    }

    public function getAllLowongan($kategori, $lokasi, $tipe)
    {
        $checkKategori = "";
        if($kategori == "" && $lokasi == "" && $tipe == "" )
            $checkKategori = "kategori.nama  IS NOT NULL";
        else    
            $checkKategori = "
                                (kategori.nama IS NULL OR kategori.nama = '$kategori')
                                OR(regencies.name IS NULL OR regencies.name = '$lokasi')
                                OR(lowongan.tipePekerjaan IS NULL OR lowongan.tipePekerjaan = '$tipe')
                            ";
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten,profile_perusahaan.foto_perusahaan
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN profile_perusahaan ON lowongan.id_perusahaan = profile_perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    WHERE $checkKategori
                                    ORDER BY nama_jabatan ASC");
        return $query->result();
    }

    public function getLowonganByJabatan($jabatan, $lokasi, $tipe)
    {
        $checkJabatan = "";
        if($jabatan == "" && $lokasi == "" && $tipe == "" )
            $checkJabatan = "jabatan.nama  IS NOT NULL";
        else    
            $checkJabatan = "
                                (jabatan.nama IS NULL OR jabatan.nama = '$jabatan')
                                OR(regencies.name IS NULL OR regencies.name = '$lokasi')
                                OR(lowongan.tipePekerjaan IS NULL OR lowongan.tipePekerjaan = '$tipe')
                            ";
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    WHERE $checkJabatan
                                    ORDER BY nama_jabatan ASC");
        return $query->result();
    }

    public function getSearchKategori($kategori, $lokasi, $tipe)
    {
        $checkKategori = "";
        if($kategori == "" && $lokasi == "" && $tipe == "" )
            $checkKategori = "kategori.kategori_id  IS NOT NULL";
        else    
            $checkKategori = "
                                (kategori.kategori_id IS NULL OR kategori.kategori_id = '$kategori')
                                OR(provinces.id IS NULL OR provinces.id = '$lokasi')
                                OR(lowongan.tipePekerjaan IS NULL OR lowongan.tipePekerjaan = '$tipe')
                            ";
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    WHERE $checkKategori
                                    ORDER BY nama_jabatan ASC");
        return $query->result();
    }

    public function getLowonganById($id)
    {
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten, profile_perusahaan.foto_perusahaan
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN profile_perusahaan ON lowongan.id_perusahaan = profile_perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id 
                                    WHERE lowongan.id_lowongan = '$id'");
        return $query->row();
    }

    public function applied($data)
    {
        return $this->db->insert('proses_lowongan', $data);
    }

    public function checkLamaran($id, $idLowongan)
    {
        $this->db->select('*');
        $this->db->where(array('id_user' =>$id, 'id_lowongan'=>$idLowongan));
        return $this->db->get('proses_lowongan')->num_rows();
    }

    public function getRekruter()
    {
        $query = $this->db->query("SELECT profile_perusahaan.*, count(lowongan.id_perusahaan) as jumlah_posisi
                                    FROM profile_perusahaan
                                    LEFT JOIN lowongan ON profile_perusahaan.id_perusahaan = lowongan.id_perusahaan
                                        ORDER BY id_perusahaan DESC
                                    ");
        return $query->result();
    }

    public function getKategoriByNama($kategori, $lokasi, $tipe)
    {
        $checkKategori = "";
        if($kategori == "" && $lokasi == "" && $tipe == "" )
            $checkKategori = "kategori.nama  IS NOT NULL";
        else    
            $checkKategori = "
                                (kategori.nama IS NULL OR kategori.nama = '$kategori')
                                OR(provinces.name IS NULL OR provinces.name = '$lokasi')
                                OR(lowongan.tipePekerjaan IS NULL OR lowongan.tipePekerjaan = '$tipe')
                            ";
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    WHERE $checkKategori
                                    ORDER BY nama_jabatan ASC");
        return $query->result();
    }

    public function getLowonganByPerusahaan($nama)
    {
        $query = $this->db->query("SELECT lowongan.*, perusahaan.nama_perusahaan, kategori.nama as nama_kategori, jabatan.nama as nama_jabatan, provinces.name as nama_provinsi, regencies.name as nama_kabupaten
                                    FROM lowongan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                    LEFT JOIN kategori ON lowongan.id_kategori = kategori.kategori_id
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN provinces ON lowongan.id_provinsi = provinces.id
                                    LEFT JOIN regencies ON lowongan.id_kabupaten = regencies.id
                                    WHERE perusahaan.nama_perusahaan='$nama'
                                    ORDER BY nama_jabatan ASC");
        return $query->result();
    }

    public function lamaranUser($id)
    {
        $query = $this->db->query("SELECT proses_lowongan.*,jabatan.nama, perusahaan.nama_perusahaan
                                    FROM proses_lowongan
                                    LEFT JOIN lowongan ON proses_lowongan.id_lowongan = lowongan.id_lowongan
                                    LEFT JOIN jabatan ON lowongan.id_jabatan = jabatan.id_jabatan
                                    LEFT JOIN perusahaan ON lowongan.id_perusahaan = perusahaan.id_perusahaan
                                        WHERE proses_lowongan.id_user = '$id'
                                        ORDER BY proses_lowongan.id_proses_lowongan ASC");
        return $query->result();
    }

    public function countLamaran($id)
    {
        $query = $this->db->query("SELECT COUNT(id_user) AS lamaran FROM `proses_lowongan` WHERE id_user = '$id'");
        return $query->row();
    }

    public function countDiterima($id)
    {
        $query = $this->db->query("SELECT COUNT(status) AS diterima FROM `proses_lowongan` WHERE id_user = '$id' AND status = '1'");
        return $query->row();
    }

    public function countDitolak($id)
    {
        $query = $this->db->query("SELECT COUNT(status) AS ditolak FROM `proses_lowongan` WHERE id_user = '$id' AND status = '2'");
        return $query->row();
    }
}
