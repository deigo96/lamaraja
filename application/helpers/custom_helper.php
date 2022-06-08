<?php
    function userLog(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('id_user')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function adminLog(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('id_admin')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function companyLog(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('id_perusahaan')){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    function getAdminId(){
        $CI = get_instance();
        $CI->load->library('session');

        if($CI->session->userdata('adminLog')){
            return $CI->session->userdata('adminLog');
        }
        else{
            return FALSE;
        }
    }