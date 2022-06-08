<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lowongan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_jabatan');
		$this->load->model('M_wilayah');
    }

	public function index($kategori="", $lokasi="", $tipe="")
	{
		$data['id_user']	= $this->session->userdata('id_user');
        $data['allLowongan']= $this->M_user->getAllLowongan($kategori, $lokasi, $tipe);
		$data['getJabatan'] = $this->M_jabatan->getAllJabatan();
        $data['wilayah']	= $this->M_wilayah->getAllProvinsi();
		if(userLog()){
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}
		else{
		}
		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/lowongan', $data);
		$this->load->view('templates/footer');
		// $this->session->sess_destroy();
	}

	public function detail_lowongan($idLowongan)
	{
		$data['id_user']	= $this->session->userdata('id_user');
        // $data['allLowongan']= $this->M_user->getAllLowongan($kategori, $lokasi, $tipe);
		$data['getJabatan'] = $this->M_jabatan->getAllJabatan();
        $data['wilayah']	= $this->M_wilayah->getAllProvinsi();
		$data['lowongan']	= $this->M_user->getLowonganById($idLowongan);
		if(userLog()){
			$id 		= $this->session->userdata('id_user');
			$userData 	= $this->M_user->getUserData($id);

			$data['checkLamaran']	= $this->M_user->checkLamaran($id, $idLowongan);
			$data['userData']		= $userData;
		}
		else{
		}
		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/detail_lowongan', $data);
		$this->load->view('templates/footer');
	}

	public function applyJob($idLowongan)
	{
		if(userLog()){
			$idUser 	= $this->session->userdata('id_user');
			if(!empty($idLowongan)){
				$data = array(
					'id_user' => $idUser,
					'id_lowongan' => $idLowongan,
					'tanggal' => date('d-m-Y H:i')
				);
				$applied 	= $this->M_user->applied($data);
				if($applied)
					echo "true";
			}
		}
		else{
			echo "failed";
		}
	}
}
