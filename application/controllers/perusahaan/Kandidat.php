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
            $data['tanggal_proses']= date('d-m-Y H:i');
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

    function sendMail()
    {
        $email  = $this->input->post('email');
        $subject= $this->input->post('subject');
        $pesan  = $this->input->post('pesan');
        // $to     = $this->input->post('emailPelamar');
        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'deigosiahaan@gmail.com', // change it to yours
            'smtp_pass' => 'pqsmrzxwvoavmzto', // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            // 'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from('deigojonathan@gmail.com'); // change it to yours
        $this->email->to($email);// change it to yours
        $this->email->subject($subject);
        $this->email->message($pesan);
        if($this->email->send()) {
            echo "true";
        }
        else {
            show_error($this->email->print_debugger());
        }

    }
}
