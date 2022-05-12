<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_jabatan');
    }

	public function semua_jabatan()
	{
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Semua Jabatan';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $data['getKategori']= $this->M_jabatan->getAllKategori();
            $data['getJabatan'] = $this->M_jabatan->getAllJabatan();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/jabatan/semua_jabatan');
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function tambah_jabatan()
	{
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Tambah Jabatan';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $data['getKategori']= $this->M_jabatan->getAllKategori();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/jabatan/tambah_jabatan', $data);
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function checkJabatan()
    {
        if(adminLog()){
            $nama       = $this->input->post('nama');

            $check = $this->M_jabatan->checkJabatan($nama);
            if($check > 0)
                echo "false";
            
        }
    }

    public function submit_jabatan()
    {
        if(adminLog()){
            $data['id_kategori']= $this->input->post('id_kategori');
            $data['nama']       = $this->input->post('nama');
            $data['id_admin']   = $this->session->userdata('id_admin');
            $data['tanggal']    = date('d-m-Y H:i');

            if(!empty($data['id_kategori']) && !empty($data['nama'])){
                $this->M_jabatan->tambahJabatan($data);
                echo "true";
            }else{
                echo "false";
            }
        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function hapus_jabatan($id)
    {
        if(adminLog()){
            $hapus= $this->M_jabatan->hapusJabatan($id);
            if($hapus)
                echo "true";
        }
    }

    public function edit_jabatan($id)
    {
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Tambah Jabatan';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $data['getKategori']= $this->M_jabatan->getAllKategori();
            $data['getJabatan'] = $this->M_jabatan->getDetailJabatan($id);
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/jabatan/edit_jabatan', $data);
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function checkEditJabatan()
    {
        if(adminLog()){
            $nama   = $this->input->post('nama');
            $id     = $this->input->post('id_kategori');

            $check = $this->M_jabatan->checkEditJabatan($nama, $id);
            if($check > 0)
                echo "false";
            else
                echo "true";
            
        }
    }

    public function updateJabatan($id)
    {
        if(adminLog()){
            $data['nama']       = $this->input->post('nama');
            $data['id_kategori']= $this->input->post('id_kategori');

            $update = $this->M_jabatan->updateJabatan($id, $data);
            if($update)
                echo "true";
            else
                echo "false";
        }
    }
}
