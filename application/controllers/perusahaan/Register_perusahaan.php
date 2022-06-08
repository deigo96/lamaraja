<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_perusahaan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Perusahaan');
    }

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('perusahaan/topbar_perusahaan');
		$this->load->view('perusahaan/register_perusahaan');
		$this->load->view('templates/footer');
	}

    public function auth()
    {
        $passwordHash           = $this->input->post('password');
        $data['nama_perusahaan']= $this->input->post('nama_perusahaan');
        $data['email_login']    = $this->input->post('email_login');
        $data['no_telp']        = $this->input->post('no_telp');
        $data['password']       = hash('md5', $passwordHash);
        $data['tanggal_daftar'] = date('d-m-Y H:i');

        $register = $this->M_Perusahaan->registerPerusahaan($data);
        if($register){
            echo "true";
        }
    }

    public function checkEmail()
    {
        $email = $this->input->post('email_login');
        if($this->M_Perusahaan->checkEmail($email) > 0){
            echo 'false';
        }else{
            echo 'true';
        }
    }

    public function checkNama()
    {
        $nama = $this->input->post('nama_perusahaan');
        if($this->M_Perusahaan->checkNama($nama) > 0){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}
