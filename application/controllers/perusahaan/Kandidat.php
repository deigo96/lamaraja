<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandidat extends CI_Controller {
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
			$id             = $this->session->userdata('id_perusahaan');
			$getData        = $this->M_Perusahaan->getAllData($id);
            $getKandidat    = $this->M_Perusahaan->getAllKandidat($id);

            $data['id_perusahaan']	= $this->session->userdata('id_perusahaan');
            $data['getKategori']    = $this->M_jabatan->getAllKategori();
            $data['getJabatan']     = $this->M_jabatan->getAllJabatan();
			$data['getData']        = $getData;
			$data['getKandidat']    = $getKandidat;
            $this->load->view('templates/header');
            $this->load->view('perusahaan/topbar_perusahaan', $data);
            $this->load->view('perusahaan/kandidat', $data);
            $this->load->view('templates/footer');
		}
		else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('perusahaan/login_perusahaan');
		}
	}

    public function profil_pelamar($idPelamar)
    {
        if(companyLog()){
            $id             = $this->session->userdata('id_perusahaan');
			$getData        = $this->M_Perusahaan->getAllData($id);
            $getKandidat    = $this->M_Perusahaan->getProfileKandidat($idPelamar, $id);

			$data['getData']        = $getData;
			$data['getKandidat']    = $getKandidat;
            $this->load->view('templates/header');
            $this->load->view('perusahaan/topbar_perusahaan', $data);
            $this->load->view('perusahaan/profile_kandidat', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->session->set_flashdata('error', 'Silahkan login');
            redirect('perusahaan/login_perusahaan');
		}
    }

    public function proses_lamaran($idLamaran)
    {
        if(companyLog()){
            $id             = $this->session->userdata('id_perusahaan');
            $data['status'] = $this->input->post('proses');
            $proses         = $this->M_Perusahaan->prosesLamaran($data, $idLamaran);
            if($proses)
                echo "true";
            else    
                echo "false";

        }
        else{
            echo "false";
        }
    }
}
