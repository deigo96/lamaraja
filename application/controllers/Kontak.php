<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_jabatan');
		$this->load->model('M_kontak');
		$this->load->model('M_Perusahaan');
    }

	public function index()
	{
		$data['kontak']		= $this->M_kontak->getKontak();
        $topbar = 'templates/topbar';
		if(userLog()){
			$id = $this->session->userdata('id_user');
			$userData = $this->M_user->getUserData($id);

			$data['userData']	= $userData;
		}
		elseif(companyLog()){
            $id             = $this->session->userdata('id_perusahaan');
			$getData        = $this->M_Perusahaan->getAllData($id);
            $topbar         = 'perusahaan/topbar_perusahaan';
			$data['getData']= $getData;
		}
		$this->load->view('templates/header');
		$this->load->view($topbar, $data);
		$this->load->view('templates/kontak', $data);
		$this->load->view('templates/footer');
		// $this->session->sess_destroy();
	}

    function sendMail()
    {
        $nama   = $this->input->post('nama');
        $email  = $this->input->post('email');
        $subject= $this->input->post('subject');
        $pesan  = $this->input->post('pesan');
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
        $this->email->from($email); // change it to yours
        $this->email->to('deigosiahaan@gmail.com');// change it to yours
        $this->email->subject($nama.' - '.$subject);
        $this->email->message($pesan);
        if($this->email->send()) {
            $this->session->set_flashdata('success', "<script>
                                                        const Toast = Swal.mixin({
                                                            toast: true,
                                                            position: 'top-end',
                                                            showConfirmButton: false,
                                                            timer: 3000,
                                                            timerProgressBar: true,
                                                            didOpen: (toast) => {
                                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                                            }
                                                        })
                                                        
                                                        Toast.fire({
                                                            icon: 'success',
                                                            title: 'Email terkirim'
                                                        })
                                                    </script>");
            redirect('kontak');
        }
        else {
            show_error($this->email->print_debugger());
        }

    }
}
