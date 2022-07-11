<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_admin');
		$this->load->model('M_kategori');
    }

	public function semua_kategori()
	{
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Dashboard';
            $data['getKategori']= $this->M_kategori->getAllKategori();
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/kategori/semua_kategori', $data);
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function tambah_kategori()
	{
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Dashboard';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/kategori/tambah_kategori');
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function checkKategori()
    {
        if(adminLog()){
            $nama       = $this->input->post('namaKategori');

            $check = $this->M_kategori->checkKategori($nama);
            if($check > 0)
                echo "false";
            else
                echo "true";
        }
    }

    public function submit_kategori()
    {
        if(adminLog()){
            $data['nama']       = $this->input->post('namaKategori');
            $data['id_admin']   = $this->session->userdata('id_admin');
            $data['tanggal']    = date('Y-m-d H:i:s');

            // var_dump( $data['tanggal'] );

            if(!empty($data['id_admin']) && !empty($data['nama'])){
                $this->M_kategori->tambahKategori($data);
                // var_dump($data);
                echo "true";
            }else{
                echo "false";
            }
        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function edit_kategori($id)
    {
        if(adminLog()){
            $idAdmin            = $this->session->userdata('id_admin');

            $data['page_title'] = 'Tambah Kategori';
            $data['getAdmin']   = $this->M_admin->getAdminData($idAdmin);
            $data['getKategori']= $this->M_kategori->getKategoriById($id);
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar');
            $this->load->view('admin/topbar');
            $this->load->view('admin/kategori/edit_kategori', $data);
            $this->load->view('admin/footer');

        }else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('admin/login_admin');
        }
    }

    public function checkEditKategori()
    {
        if(adminLog()){
            $nama   = $this->input->post('nama');

            $check = $this->M_kategori->checkEditKategori($nama);
            // var_dump($nama );
            if($check > 0)
                echo "false";
            else
                echo "true";
            
        }
    }

    public function updateKategori($id)
    {
        if(adminLog()){
            $data['nama']       = $this->input->post('nama');

            $update = $this->M_kategori->updateKategori($id, $data);
            if($update)
                echo "true";
            else
                echo "false";
        }
    }

    public function hapus_kategori($id)
    {
        if(adminLog()){
            $hapus= $this->M_kategori->hapus_kategori($id);
            if($hapus)
                echo "true";
        }
    }
}
