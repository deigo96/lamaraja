<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_admin');
    }

	public function index()
	{
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Dashboard';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/content');
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function logOut(){
		if(adminLog()){
			$this->session->sess_destroy();
			echo 'true';
		}
	}
}
