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
        $this->form_validation->set_rules('email','Alamat Email','required|valid_email|is_unique[users.email]',[
            'is_unique' => "Email sudah digunakan"
        ]);
        $status = false;
        if ($this->form_validation->run() == FALSE) {
            // var_dump(form_error('email'));
        } 
        else {
            $passwordHash           = $this->input->post('password');
            $data['nama_user']      = $this->input->post('nama');
            $data['email']          = $this->input->post('email');
            $data['password']       = hash('md5', $passwordHash);
            $data['tanggal_daftar'] = date('Y-m-d H:i:s');

            $register = $this->M_register->register($data);
            if(!$register){
                echo json_encode($status);
            }
            $status = true;
        }
        echo json_encode($status);
    }

    public function checkEmail()
    {
        $email = $this->input->post('email');
        if($this->M_register->checkEmail($email) > 0){
            echo 'false';
        }else{
            echo 'true';
        }
    }
}
