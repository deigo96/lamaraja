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
            $data['jenis_kelamin']      = $this->input->post('jenis_kelamin');
            $data['tanggal_lahir']      = $this->input->post('tanggal_lahir');
            $data['agama']              = $this->input->post('agama');
            $data['pendidikan_terakhir']= $this->input->post('pendidikan_terakhir');
            $data['nama_institusi']     = $this->input->post('nama_institusi');
            $data['jurusan']            = $this->input->post('jurusan');
            $data['deskripsi']          = $this->input->post('deskripsi');
            $data['keahlian']           = $this->input->post('keahlian');
            $updateProfile = "false";

            $checkProfile   = $this->M_user->checkProfileUser($id);
            $jumlah_berkas = count($_FILES['file_upload']['name']);
            for($i = 0; $i < $jumlah_berkas;$i++)
            {
                $path = realpath(APPPATH.'../assets/upload/dokumen/');
                $config['upload_path']  = $path;
                $config['max_size']     = 2000;
                $config['allowed_types']= 'pdf';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if(!empty($_FILES['file_upload']['name'][$i])){
                    $_FILES['file']['name'] = $_FILES['file_upload']['name'][$i];
                    $_FILES['file']['type'] = $_FILES['file_upload']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['file_upload']['tmp_name'][$i];
                    $_FILES['file']['error'] = $_FILES['file_upload']['error'][$i];
                    $_FILES['file']['size'] = $_FILES['file_upload']['size'][$i];
                    if($this->upload->do_upload('file')){
                        $old = $this->input->post('oldDokumen');
                        $fileName = $this->upload->data();
                        if($i == 0)
                            $data['resume'] = $fileName['file_name'];
                        elseif($i ==1)
                            $data['ijazah'] = $fileName['file_name'];
                        elseif($i == 2)
                            $data['transkip_nilai'] = $fileName['file_name'];
                        if(empty($this->upload->display_errors())){
                            if(!empty($old[$i])){
                                $patholdFoto        = './assets/upload/dokumen/'.$old[$i];
                                unlink($patholdFoto);
                            }
                            $updateProfile = $this->M_user->updateProfile($data);
                        } else {
                            echo "false";
                        }
                    } else {
                        echo "false";
                    }
                }
            }
            if($updateProfile === true){
                echo 'true';
            }

            // if(isset($_FILES['transkip_nilai']['name']) && !empty($_FILES['transkip_nilai']['name'])){
            //     $path = realpath(APPPATH.'../assets/upload/transkip/');
            //     $config3['upload_path'] = $path;
            //     $config3['max_size'] = 2000;
            //     $config3['allowed_types'] = 'pdf';
            //     $this->load->library('upload', $config3);
            //     if(!$this->upload->do_upload('transkip_nilai')){
            //         echo "failed2";
            //     }
            //     else{
            //         $oldTranskip    = $this->input->post('oldTranskip');
            //         $fileName = $this->upload->data();
            //         $data['transkip_nilai'] = $fileName['file_name'];
            //         $data['tanggal_update'] = date('d-m-Y H:i');
            //     }
            // } else if(!empty($checkProfile->transkip_nilai)){
            //     $data['transkip_nilai']   = $checkProfile->transkip_nilai;
            // }

            // $this->load->library('upload');
            
            // if(empty($this->upload->display_errors())){
            //     if(empty($checkProfile)){
            //         $saveProfile = $this->M_user->saveProfile($data);
            //         if($saveProfile){
            //             echo 'true';
            //         }else{
            //             echo 'false';
            //         }
            //     }else{
            //         // var_dump($oldFoto);
            //         if($oldFoto != ""){
            //             $patholdFoto        = './assets/upload/profile/'.$oldFoto;
            //             unlink($patholdFoto);
            //         }
            //         if($oldResume != ""){
            //             $patholdResume      = './assets/upload/resume/'.$oldResume;
            //             unlink($patholdResume);
            //         }
            //         if($oldTranskip != ""){
            //             $patholdTranskip    = './assets/upload/transkip/'.$oldTranskip;
            //             unlink($patholdTranskip);
            //         }
            //         if($oldIjazah != ""){
            //             $patholdIjazah      = './assets/upload/ijazah/'.$oldIjazah;
            //             unlink($patholdIjazah);
            //         }   
            //         $updateProfile = $this->M_user->updateProfile($data);
            //         if($updateProfile){
            //             echo 'true';
            //         }else{
            //             echo 'false';
            //         }
            //     }
            // }

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
    
    public function notifikasiPelamar()
    {
        if(userLog()){
            $idUser     = $this->session->userdata('id_user');
            $notif      = $this->M_user->getNotif($idUser);
            echo json_encode($notif);
        }
    }

    public function removeNotifikasiPelamar()
    {
        if(userLog()){
            $data           = $this->input->post('status');
            $idUser         = $this->session->userdata('id_user');
            $removeNotif    = $this->M_user->removeNotif($idUser, $data);
            echo json_encode($removeNotif);
        }
    }

    public function UploadFoto($id)
    {
        $oldFoto = "";
        
        $checkProfile   = $this->M_user->checkProfileUser($id);
        if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
            $path = realpath(APPPATH.'../assets/upload/profile/');
            $config['upload_path'] = $path;
            $config['max_size'] = 2000;
            $config['allowed_types'] = 'gif|png|jpg|jpeg';
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('file')){
                echo "error";
            }
            else{
                $oldFoto    = $this->input->post('old_foto');
                $fileName = $this->upload->data();
                $data['foto'] = $fileName['file_name'];
                $data['tanggal_update'] = date('d-m-Y H:i');
            }
        } else if(!empty($checkProfile->foto)){
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
                // var_dump($oldFoto);
                if($oldFoto != ""){
                    $patholdFoto        = './assets/upload/profile/'.$oldFoto;
                    unlink($patholdFoto);
                } 
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
