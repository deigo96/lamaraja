<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_jabatan');
    }

	public function index()
	{
		$data['id_user']	= $this->session->userdata('id_user');
		$data['getKategori']= $this->M_jabatan->getAllKategori();
		$data['getJabatan'] = $this->M_jabatan->getAllJabatan();
		$data['wilayah']	= $this->M_user->countWilayah();
		$data['perusahaan']	= $this->M_user->countPerusahaan();
		$data['user']		= $this->M_user->countUser();
		$jabatan			= $this->M_user->getjabatan();
		$data['jabatan'] 	= array_chunk($jabatan, 4);
		if(userLog()){
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}
		else{
		}
		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/home', $data);
		$this->load->view('templates/footer');
		// $this->session->sess_destroy();
	}
}
