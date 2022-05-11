<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
    }

	public function index()
	{
		$data['id_user']	= $this->session->userdata('id_user');
		if(userLog()){
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}
		else{
		}
		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/home');
		$this->load->view('templates/footer');
		// $this->session->sess_destroy();
	}
}
