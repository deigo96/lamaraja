<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_register');
    }

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/topbar');
		$this->load->view('templates/register');
		$this->load->view('templates/footer');
	}

    public function auth()
    {
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama','Nama Lengkap', 'required');
        $this->form_validation->set_rules('email','Alamat Email','required|valid_email|is_unique[users.email]');
        $status = "";
        if ($this->form_validation->run() == FALSE) {
            echo json_encode($status);
        } 
        else {
        // To who are you wanting with input value such to insert as 
            $data['nama_user']      = $this->input->post('nama');
            $data['email']          = $this->input->post('email');
            $data['password']       = $this->input->post('password');
            $data['tanggal_daftar'] = date('dmYHi');
        // Then pass $data  to Modal to insert bla bla!!
            // $register = $this->M_register->register($data);
            // if(!$register){
            //     echo json_encode($status);
            // }
            echo json_encode("Sukses");
        }
    }
}
