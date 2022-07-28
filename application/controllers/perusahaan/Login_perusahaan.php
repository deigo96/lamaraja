<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_perusahaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Perusahaan');
	}

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('perusahaan/topbar_perusahaan');
		$this->load->view('perusahaan/login_perusahaan');
		$this->load->view('templates/footer');
	}

	public function auth()
	{
		$passwordHash		= $this->input->post('password');
		$data['email_login'] = $this->input->post('email');
		$data['password']	= hash('md5', $passwordHash);
		if (!empty($data['email_login']) && !empty($data['password'])) {
			$dataLogin 	= $this->M_Perusahaan->checkLogin($data);
			if (count($dataLogin) == 1) {
				if ($dataLogin[0]->password == $data['password']) {
					$data = array(
						'id_perusahaan'     => $dataLogin[0]->id_perusahaan,
						'nama_perusahaan'   => $dataLogin[0]->nama_perusahaan,
						'email_login'       => $dataLogin[0]->email_login,
						'tanggal_daftar'    => $dataLogin[0]->tanggal_daftar,
						'no_telp'           => $dataLogin[0]->no_telp
					);
					$this->session->set_userdata($data);
					if ($this->session->userdata('id_perusahaan')) {
						$nama = $this->session->userdata('nama_perusahaan');
						redirect('perusahaan/tambah_lowongan');
					}
				}
			} else {
				$this->session->set_flashdata('error', 'Email atau password salah');
				redirect('perusahaan/login_perusahaan');
			}
		} else {
			$this->session->set_flashdata('error', 'Email atau password salah');
			redirect('perusahaan/login_perusahaan');
		}
	}

	public function logOut()
	{
		if (companyLog()) {
			$this->session->sess_destroy();
			echo 'true';
		}
	}
}
