<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class whoami {
		var $ci;

		function __construct()
		{
		$this->ci = & get_instance();
		$this->ci->load->helper('url', 'form');
	    $this->ci->load->library('form_validation','session');
		}

        public function isLogged()
        {
        	$sesdat = $this->ci->session->userdata('logged_in');
        	if($sesdat){
        		return $sesdat;
        	}else{
        		redirect('home');
        	}
        }
        // public function permission_action($role){
        // 	$sesdat = $this->ci->session->userdata('logged_in');
        // 	$spec_role = $sesdat[$role];
        // 	if($sesdat[$role] == "6"){

        // 	}
        // }
        
        public function decrypt_identity($id){
        	$sesdat = $this->ci->session->userdata('logged_in');
			$idold = $sesdat['id_contri'];
			$decrypt = md5($idold);
			//$who = $sesdat[$id] ;
			if($sesdat){
				if($id == $decrypt){
				return $sesdat;
				}else{
					show_404(); //url bukan punya dia
				}	
			}else{ //tidak login home
				show_404();
			}
        }
}