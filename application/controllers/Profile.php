<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_user');
    }

	public function lihat_profile($id)
	{
		if(userLog()){
			$id         = $this->session->userdata('id_user');
			$userData   = $this->M_user->getUserData($id);
            $userProfile= $this->M_user->getProfile($id);

            $data['lamaranUser']    = $this->M_user->lamaranUser($id);
            $data['countLamaran']   = $this->M_user->countLamaran($id);
            $data['countDiterima']  = $this->M_user->countDiterima($id);
            $data['countDitolak']   = $this->M_user->countDitolak($id);
			$data['userData']       = $userData;
			$data['userProfile']    = $userProfile;
            $this->load->view('templates/header');
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/profile', $data);
            $this->load->view('templates/footer');
		}
		else{
            redirect('login');
		}
		// $this->session->sess_destroy();
	}

    public function update_profile($id)
    {
        if(userLog()){
            $data['nama']               = $this->input->post('nama');
            $data['id_user']            = $id;
            $data['email']              = $this->input->post('email');
            $data['tanggal_lahir']      = $this->input->post('tanggal_lahir');
            $data['agama']              = $this->input->post('agama');
            $data['pendidikan_terakhir']= $this->input->post('pendidikan_terakhir');
            $data['nama_institusi']     = $this->input->post('nama_institusi');
            $data['jurusan']            = $this->input->post('jurusan');
            $data['deskripsi']          = $this->input->post('deskripsi');
            $data['keahlian']           = $this->input->post('keahlian');
            $checkProfile   = $this->M_user->checkProfileUser($id);
            if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
                $path = realpath(APPPATH.'../assets/upload/profile/');
                $config['upload_path'] = $path;
                $config['max_size'] = 1000;
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    echo "error";
                }
                else{
                    $fileName = $this->upload->data();
                    $data['foto'] = $fileName['file_name'];
                    $data['tanggal_update'] = date('dmYHi');
                }
            }
            else if(!empty($checkProfile->foto)){
                $data['foto']   = $checkProfile->foto;
            }
            $this->load->library('upload');
            
            if(empty($this->upload->display_errors())){
                if(empty($checkProfile)){
                    $saveProfile = $this->M_user->saveProfile($data);
                    if($saveProfile){
                        echo 'true';
                    }else{
                        echo 'false';
                    }
                }else{
                    $updateProfile = $this->M_user->updateProfile($data);
                    if($updateProfile){
                        echo 'true';
                    }else{
                        echo 'false';
                    }
                }
            }

        }
    }

    public function checkPassword()
    {
        if(userLog()){
            $password = hash('md5', $this->input->post('passwordLama'));
            $id = $this->session->userdata('id_user');
            $checkPassword = $this->M_user->checkPassword($id, $password);
            if($checkPassword > 0){
                echo "true";
            }else{
                echo "false";
            }
        }
    }

    public function gantiPassword()
    {
        if(userLog()){
            $data['password'] = hash('md5', $this->input->post('passwordBaru'));
            if(!empty($data['password'])){
                $gantiPass = $this->M_user->gantiPass($data);
                if($gantiPass){
                    echo "true";
                }else{
                    echo "false";
                }
            }else{
                echo "false";
            }
        }
    }
}
