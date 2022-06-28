<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_jabatan');
		$this->load->model('M_user');
    }

	public function Lowongan()
	{
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Laporan';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $data['getKategori']= $this->M_jabatan->getAllKategori();
            $data['getJabatan'] = $this->M_jabatan->getAllJabatan();
            $data['getLowongan']= $this->M_admin->getAllLowongan();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/laporan/lowongan', $data);
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }
}
