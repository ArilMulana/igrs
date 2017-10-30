<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('Whoami');
		$this->_init();
	}

	function _init(){
		$this->load->css('assets/css/bootstrap.min.css');
    	$this->load->js('assets/js/jquery-2.2.3.js');
    	$this->load->css('assets/dist/css/skins/_all-skins.min.css');
    	$this->load->js('assets/plugins/fastclick/fastclick.min.js');
    	$this->load->js('assets/plugins/slimScroll/jquery.slimscroll.min.js');
    	$this->load->js('assets/dist/js/demo.js');
	}

	public function index(){
		$this->whoami->isLogged();
		$data['selected']= "";
		$ses['sesdat'] = $this->Whoami->sesdat();
		$role = $ses['sesdat'];
		$this->output->set_template('dashboard');
		if($role['role'] > "6"){
			$data = array(
				//'sesdat'=>$this->whoami->sesdat(),
				'nama_pemilik'=>"nama_pemilik",
				);
			echo "<script>alert('hy pegembang')</script>";
			$this->load->view('blank',$data);
		}else{
			$data = array(
				'sesdat'=>$ses['sesdat'],
				'nama'=>"nama",
				);
			echo "<script>alert('hy cms')</script>";
			$this->load->view('blank',$data);
		}
		//$this->isAdmin();
		
		

	}
}
?>