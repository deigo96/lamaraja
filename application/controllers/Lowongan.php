<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lowongan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_jabatan');
		$this->load->model('M_wilayah');
	}

	public function index()
	{
		$data['id_user']	= $this->session->userdata('id_user');
		$data['allLowongan'] = $this->search();
		$data['getJabatan'] = $this->M_jabatan->getAllJabatan();
		$data['getKategori'] = $this->M_jabatan->getAllKategori();
		$data['wilayah']	= $this->M_wilayah->getAllProvinsi();
		// $search = $this->search();
		// var_dump($search);
		if (userLog()) {
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		} else {
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
		$data['getKategori'] = $this->M_jabatan->getAllKategori();
		$data['wilayah']	= $this->M_wilayah->getAllProvinsi();
		$data['lowongan']	= $this->M_user->getLowonganById($idLowongan);
		if (userLog()) {
			$id 		= $this->session->userdata('id_user');
			$userData 	= $this->M_user->getUserData($id);

			$data['checkUser']	= $this->M_user->checkUserProfile($id);
			$data['checkLamaran']	= $this->M_user->checkLamaran($id, $idLowongan);
			$data['userData']		= $userData;
		} else {
		}
		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/detail_lowongan', $data);
		$this->load->view('templates/footer');
	}

	public function applyJob($idLowongan)
	{
		if (userLog()) {
			$idUser 	= $this->session->userdata('id_user');
			if (!empty($idLowongan)) {
				$data = array(
					'id_user' => $idUser,
					'id_lowongan' => $idLowongan,
					'tanggal' => date('Y-m-d H:i:s')
				);
				$applied 	= $this->M_user->applied($data);
				if ($applied)
					echo "true";
			}
		} else {
			echo "failed";
		}
	}

	public function pencarian($jabatan = "", $lokasi = "", $tipe = "")
	{
		$jabatan = str_replace("%20", " ", $jabatan);
		$data['getKategori'] = $this->M_jabatan->getAllKategori();
		$data['wilayah']	= $this->M_wilayah->getAllProvinsi();
		$data['lowonganByJabatan'] = $this->M_user->getLowonganByJabatan($jabatan, $lokasi, $tipe);
		if (userLog()) {
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}
		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/lowongan', $data);
		$this->load->view('templates/footer');
	}

	// public function search_job()
	// {
	// 	$kategori 	= $this->input->post('kategori');
	// 	$lokasi 	= $this->input->post('lokasi');
	// 	$tipe 		= $this->input->post('tipe');
	// 	$data['getKategori'] = $this->M_jabatan->getAllKategori();
	//     $data['wilayah']	= $this->M_wilayah->getAllProvinsi();
	// 	$data['home'] 	= $this->M_user->getLowonganByJabatan($kategori, $lokasi, $tipe);
	// 	if(userLog()){
	// 		$id = $this->session->userdata('id_user');
	// 		$userData = $this->M_user->getUserData($id);

	// 		$data['userData']	= $userData;
	// 	}
	// 	$this->load->view('templates/header');
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('templates/lowongan', $data);
	// 	$this->load->view('templates/footer');
	// }

	public function search()
	{
		$kategori 	= $this->input->post('kategori');
		$lokasi 	= $this->input->post('lokasi');
		$tipe 		= $this->input->post('tipe');

		$search 	= $this->M_user->getSearchKategori($kategori, $lokasi, $tipe);
		return $search;

		// $data = array(
		// 	'kategori' 	=>$kategori,
		// 	'lokasi'	=>$lokasi,
		// 	'tipe'		=>$tipe
		// );
		// var_dump($data);
	}

	public function kategori($nama = "", $lokasi = "", $tipe = "")
	{
		if ($nama != "")
			$kategori = str_replace('%20', " ", $nama);
		else
			$kategori = $this->input->post('kategori');

		$lokasi = $this->input->post('lokasi');
		$tipe	= $this->input->post('tipe');
		// var_dump($lokasi, $kategori, $tipe);
		$data['lowongan'] 	= $this->M_user->getKategoriByNama($kategori, $lokasi, $tipe);
		$data['getKategori'] = $this->M_jabatan->getAllKategori();
		$data['wilayah']	= $this->M_wilayah->getAllProvinsi();

		if (userLog()) {
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}

		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/lowongan', $data);
		$this->load->view('templates/footer');
	}

	public function perusahaan($nama)
	{
		$perusahaan = str_replace('%20', " ", $nama);

		$data['perusahaan']	= $this->M_user->getLowonganByPerusahaan($perusahaan);
		$data['getKategori'] = $this->M_jabatan->getAllKategori();
		$data['wilayah']	= $this->M_wilayah->getAllProvinsi();
		if (userLog()) {
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}

		$this->load->view('templates/header');
		$this->load->view('templates/topbar', $data);
		$this->load->view('templates/lowongan', $data);
		$this->load->view('templates/footer');
	}
}
