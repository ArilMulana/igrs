<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Whoami {
	var $ci;

	function __construct()
	{
	$this->ci = & get_instance();
	$this->ci->load->helper('url', 'form');
        $this->ci->load->library('form_validation','session');
	}

	public function sesdat(){
		return $this->ci->session->userdata('logged_in');
	}
        
        public function isLogged()
        {
        	$sesdat =  $this->sesdat();
        	if($sesdat){
        		return $sesdat;
        	}else{
        		redirect('home');
        	}
        }
        private function id_me($sesdat){
        	//$sesdat = $this->sesdat();
        	$role = $sesdat['role'];
        	switch ($sesdat) {
        		case $role < '6': // admin
        			# code...
        			$data = array(
        				'id'=>$sesdat['no'],
        				'my_role'=>$sesdat['role'],
        				);
        			return $data;
        			//return $sesdat['no'];
        			break;
        		case $role == '7': // pengembang
        			$data = array(
        				'id'=>$sesdat['id'],
        				'my_role'=>$sesdat['role'],
        				);
        			return $data;
        			// return $sesdat['id'];
        			break;
        		default:
        			$data = array(
        				'id'=>$sesdat['id_contri'],
        				'my_role'=>$sesdat['role'],
        				);
        			return $data;
        			//return $sesdat['id_contri'];// contri
        			break;
        	}
        }

        public function get_role_id(){
        	$sesdat = $this->isLogged();
        	return $this->id_me($sesdat);
        }

        public function decrypt_identity($id){
        	$sesdat = $this->isLogged();
        	$id_role = $this->id_me($sesdat);
        	//$idold = $sesdat['id_contri'];
        	$decrypt = md5($id_role['id']);
			if($sesdat){
				if($id == $decrypt){
                                $data = array(
                                        'id_real'=>$id_role['id'],
                                        'sesdat'=>$sesdat,
                                        'role'=>$id_role['my_role'],

                                );
                                
				return $data;
				}else{
					show_404(); //url bukan punya dia
				}	
			}else{ //tidak login home
				show_404();
			}
        }

        
}