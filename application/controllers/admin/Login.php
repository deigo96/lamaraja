<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_admin');
    }

	public function index()
	{
        $data['page_title'] = 'Login';
        $this->load->view('admin/header',$data);
        $this->load->view('admin/login_admin');
        // $this->load->view('admin/footer');
    }

    public function check_login()
    {
        $password           = $this->input->post('password');
        $data['email']      = $this->input->post('email');
        $data['password']   = hash('md5', $password);

        if(!empty($data['email']) && !empty($data['password'])){
            $checkAdmin     = $this->M_admin->checkAdmin($data);
            if(count($checkAdmin) == 1){
                $adminSession = array(
                    'id_admin'  => $checkAdmin->id_admin,
                    'nama'      => $checkAdmin->nama,
                    'email'     => $checkAdmin->email,
                    'foto'      => $checkAdmin->foto
                );
                $this->session->set_userdata($adminSession);
                if($this->session->userdata('id_admin')){
                    redirect('admin/dashboard');
                }else{
                    $this->session->set_flashdata('error', 'Gagal Login');
                    redirect('admin/login_admin');
                }
            }else{
                $this->session->set_flashdata('error', 'Email atau password salah');
                redirect('admin/login_admin');
            }
        }else{
            $this->session->set_flashdata('error', 'Email atau password harus diisi');
            redirect('admin/login_admin');
        }
    }
}
