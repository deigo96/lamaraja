<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_jabatan');
        $this->load->model('M_Perusahaan');
    }

	public function index()
	{
        if(companyLog()){
            $data['id_perusahaan']	= $this->session->userdata('id_perusahaan');
            $data['getKategori']    = $this->M_jabatan->getAllKategori();
            $data['getJabatan']     = $this->M_jabatan->getAllJabatan();
			$id             = $this->session->userdata('id_perusahaan');
			$getData        = $this->M_Perusahaan->getAllData($id);
			$data['getData']= $getData;
            $this->load->view('templates/header');
            $this->load->view('perusahaan/topbar_perusahaan', $data);
            $this->load->view('templates/home', $data);
            $this->load->view('templates/footer', $data);
		}
		else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('perusahaan/login_perusahaan');
		}
	}
}
