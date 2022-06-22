<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tambah_lowongan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_jabatan');
		$this->load->model('M_wilayah');
        $this->load->model('M_Perusahaan');
    }

	public function index()
	{
        if(companyLog()){
			$id             = $this->session->userdata('id_perusahaan');
            $data['id_perusahaan']	= $this->session->userdata('id_perusahaan');
            $data['getKategori']    = $this->M_jabatan->getAllKategori();
            $data['getJabatan']     = $this->M_jabatan->getAllJabatan();
			$data['getProvinsi']    = $this->M_wilayah->getAllProvinsi();
            $data['kontak']         = $this->M_Perusahaan->getProfilePerusahaan($id);
			$data['getData']        = $this->M_Perusahaan->getAllData($id);
            $this->load->view('templates/header');
            $this->load->view('perusahaan/topbar_perusahaan', $data);
            $this->load->view('perusahaan/tambah_lowongan', $data);
            $this->load->view('templates/footer');
		}
		else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('perusahaan/login_perusahaan');
		}
	}

    public function get_jabatan($id)
    {
        if(companyLog()){
            $data    = $this->M_jabatan->getJabatanByIdKategori($id);
            echo json_encode($data);
        }
    }

    public function get_kabupaten($id)
    {
        if(companyLog()){
            $data = $this->M_wilayah->getAllKabupaten($id);
            echo json_encode($data);
        }
    }

    public function post()
    {
        if(companyLog()){
            $id         = $this->session->userdata('id_perusahaan');
            $kualifikasi= $this->input->post('kualifikasi');
            $deskripsi  = $this->input->post('deskripsi');

            $data['id_perusahaan']  = $id;
            $data['id_kategori']    = $this->input->post('kategori');
            $data['id_jabatan']     = $this->input->post('jabatan');
            $data['tipePekerjaan']  = $this->input->post('tipePekerjaan');
            $data['id_provinsi']    = $this->input->post('provinsi');
            $data['id_kabupaten']   = $this->input->post('kabupaten');
            $data['pendidikan']     = $this->input->post('pendidikan');
            $data['jurusan']        = $this->input->post('jurusan');
            $data['tanggal_post']   = date('d-m-Y H:i');
            if(!empty($kualifikasi))
                $data['kualifikasi']= implode('#', $kualifikasi);
            else
                $data['kualifikasi']= $this->input->post('kualifikasi');
            if(!empty($deskripsi))
                $data['deskripsi']  = implode('#', $deskripsi);
            else
                $data['deskripsi']  = $this->input->post('deskripsi');
            
            $post = $this->M_Perusahaan->tambahLowongan($data);
            if($post)
                echo "true";
        }
    }
}
