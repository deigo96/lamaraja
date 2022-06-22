<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_perusahaan extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_Perusahaan');
		$this->load->model('M_wilayah');
    }

    // public function _remap($method)
    // {
    //     if($method == "index"){
    //         $this->$method();
    //     }
    //     else{
    //         echo $method;
    //     }
    // }

	public function index($nama_perusahaan)
	{
        if(companyLog()){
			$id         = $this->session->userdata('id_perusahaan');
            $getProfile = $this->M_Perusahaan->getProfilePerusahaan($id);
            $idprov     = !empty($getProfile) ? $getProfile->id_provinsi : "";
            $idkab      = !empty($getProfile) ? $getProfile->id_kabupaten : "";
            $idkec      = !empty($getProfile) ? $getProfile->id_kecamatan : "";

            $data['getKab']         = $this->M_wilayah->getKabupatenById($idkab);
            $data['getKec']         = $this->M_wilayah->getKecamatanById($idkec);
            $data['getData']        = $this->M_Perusahaan->getAllData($id);
            $data['getKandidat']    = $this->M_Perusahaan->getAllKandidat($id);	
            $data['getProfile']     = $getProfile;		// $userData   = $this->M_user->getUserData($id);
			$data['getProvinsi']    = $this->M_wilayah->getAllProvinsi();
			$data['getKabupaten']   = $this->M_wilayah->getAllKabupaten($idprov);
			$data['getKecamatan']   = $this->M_wilayah->getAllKecamatan($idkab);
            $data['getLowongan']    = $this->M_Perusahaan->getLowonganById($id);

            $this->load->view('templates/header');
            $this->load->view('perusahaan/topbar_perusahaan', $data);
            $this->load->view('perusahaan/profile_perusahaan', $data);
            $this->load->view('templates/footer');
        }
		else{
            echo "false";
		}
		// $this->session->sess_destroy();
	}

    public function get_kabupaten($id)
    {
        if(companyLog()){
            $data = $this->M_wilayah->getAllKabupaten($id);
            echo json_encode($data);
            // return $data;
        }
    }

    public function get_kecamatan($id)
    {
        if(companyLog()){
            $data = $this->M_wilayah->getAllKecamatan($id);
            echo json_encode($data);
            // return $data;
        }
    }

    public function update_profile_perusahaan()
    {
        if(companyLog()){
            $id                         = $this->session->userdata('id_perusahaan');
            $data['nama_perusahaan']    = $this->input->post('nama_perusahaan');
            $data['id_perusahaan']      = $id;
            $data['email_perusahaan']   = $this->input->post('email_perusahaan');
            $data['telepon_perusahaan'] = $this->input->post('telepon_perusahaan');
            $data['id_provinsi']        = $this->input->post('provinsiPerusahaan');
            $data['id_kabupaten']       = $this->input->post('kabupatenPerusahaan');
            $data['id_kecamatan']       = $this->input->post('kecamatanPerusahaan');
            $data['alamat_lengkap']     = $this->input->post('alamat_lengkap');
            $data['kontak_email']       = $this->input->post('kontak_email');
            $data['tentang_perusahaan'] = $this->input->post('tentang_perusahaan');

            $checkProfile   = $this->M_Perusahaan->checkProfilePerusahaan($id);
            if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])){
                $path = realpath(APPPATH.'../assets/upload/perusahaan/');
                $config['upload_path'] = $path;
                $config['max_size'] = 2000;
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('file')){
                    echo "error";
                }
                else{
                    $fileName = $this->upload->data();
                    $data['foto_perusahaan'] = $fileName['file_name'];
                    $data['tanggal_update'] = date('d-m-Y H:i');
                }
            }
            else if(!empty($checkProfile->foto)){
                $data['foto_perusahaan']   = $checkProfile->foto_perusahaan;
            }
            $this->load->library('upload');
            
            if(empty($this->upload->display_errors())){
                if(empty($checkProfile)){
                    $saveProfile = $this->M_Perusahaan->saveProfile($data);
                    $update      = $this->M_Perusahaan->updatePerusahaan($id);
                    if($saveProfile){
                        echo 'true';
                    }else{
                        echo 'false';
                    }
                }else{
                    $updateProfile = $this->M_Perusahaan->updateProfile($data);
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
        if(companyLog()){
            $password = hash('md5', $this->input->post('passwordLama'));
            $id = $this->session->userdata('id_perusahaan');
            $checkPassword = $this->M_Perusahaan->checkPassword($id, $password);
            if($checkPassword > 0){
                echo "true";
            }else{
                echo "false";
            }
        }
    }

    public function gantiPassword()
    {
        if(companyLog()){
            $data['password'] = hash('md5', $this->input->post('passwordBaru'));
            if(!empty($data['password'])){
                $gantiPass = $this->M_Perusahaan->gantiPass($data);
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

    public function notifikasiPerusahaan()
    {
        echo "berhasil";
    }

    public function hapus_lowongan($idLowongan)
    {
        if(companyLog()){
            $idPerusahaan   = $this->session->userdata('id_perusahaan');
            $hapusLowongan  = $this->M_Perusahaan->hapusLowongan($idLowongan);
            if($hapusLowongan)
                echo "true";
            else
                echo "false";
        }
    }
}
