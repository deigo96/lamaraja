<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_login');
    }

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/topbar');
		$this->load->view('templates/login');
		$this->load->view('templates/footer');
	}

	public function auth()
	{
		$passwordHash		= $this->input->post('password');
		$data['email']		= $this->input->post('email');
		$data['password']	= hash('md5', $passwordHash);

		if(!empty($data['email']) && !empty($data['password'])){
			$dataLogin 	= $this->M_login->checkLogin($data);
			if(count($dataLogin) == 1){
				if($dataLogin[0]->password == $data['password']){
					if($dataLogin[0]->tipe_user == 1){
						$data = array(
							'id_user' =>$dataLogin[0]->id_user,
							'nama_user' =>$dataLogin[0]->nama_user,
							'email' =>$dataLogin[0]->email,
							'tanggal_daftar' =>$dataLogin[0]->tanggal_daftar,
							'tipe_user' =>$dataLogin[0]->tipe_user
						);
						$this->session->set_userdata($data);
						if($this->session->userdata('id_user')){
							redirect('Home');
						}
					}
					// else{
					// 	$data = array(
					// 		'adminLog' =>$dataLogin[0]->id_login,
					// 		'nama' =>$dataLogin[0]->nama,
					// 		'email' =>$dataLogin[0]->email,
					// 		'status' =>$dataLogin[0]->status,
					// 		'type_id' =>$dataLogin[0]->type_id
					// 	);
					// 	$this->session->set_userdata($data);
					// 	if($this->session->userdata('adminLog')){
					// 		redirect('admin', $data);
					// 	}
					// }
				}
			}
			else{
				$this->session->set_flashdata('error', 'Email atau password salah');
				redirect('Login');
			}

		}
		else{
			$this->session->set_flashdata('error', 'Email atau password salah');
			redirect('Login');
		}

	}

	public function logOut(){
		if(userLog()){
			$this->session->sess_destroy();
			echo 'true';
		}
	}
}
