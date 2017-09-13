<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
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

	function isAdmin(){
		if($this->session->userdata('logged_in')){
			return $this->session->userdata('logged_in');
		}else{
			redirect('home');
		}
	}
	public function index(){
		//$this->isAdmin();
		$this->load->view('blank');
		$this->output->set_template('dashboard');

	}
}
?>