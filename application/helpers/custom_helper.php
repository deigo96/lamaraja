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

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    function max_karakter($x, $length)
    {
        if(strlen($x)<=$length){
            echo $x;
        }
        else{
            $y=substr($x,0,$length) . '...';
            echo $y;
        }
    }