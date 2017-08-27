<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  	function __construct()
	{
	parent::__construct();
	$this->load->helper('url', 'form');
    $this->load->library('form_validation','session');
    $this->load->model('LoginModel');
	$this->_init();
	}

	private function _init()
	{
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
     $this->load->css('assets/libraries/bootstrap/bootstrap.min.css');
	 $this->load->css('assets/libraries/style.css');
	    // $this->load->css('assets/libraries/owl-carousel/owl.theme.css');
	 $this->load->css('assets/libraries/flexslider/flexslider.css');
	 $this->load->css('assets/libraries/fonts/font-awesome.min.css');
	 $this->load->css('assets/css/components.css');
	    // $this->load->js('assets/libraries/jquery.animateNumber.min.js');
	 $this->load->js('assets/libraries/jquery.min.js');
	 $this->load->js('assets/libraries/flexslider/jquery.flexslider-min.js');
	    //$this->load->js('assets/dist/js/app.min.js');
	 $this->load->js('assets/js/functions.js');
	 $this->load->js('assets/js');
	}

	  
 	//check status
	// private function WhoI(){
	// 	if($this->session->userdata('logged_in')['role'] != NULL){

	// 		redirect('home');
	// 	}else{
	// 		redirect('home');
	// 	}
	// }

	function isLogged(){
		if($this->session->userdata('logged_in')){
			return true;
		}else{
			return false;
		}
	}


	public function index()
	{
		$this->load->css('assets/libraries/owl-carousel/owl.carousel.css');
		$this->load->css('assets/libraries/owl-carousel/owl.theme.css');
		$this->load->css('assets/css/media.css');
		$this->load->js('assets/libraries/owl-carousel/owl.carousel.min.js');
		$this->load->js('assets/libraries/expanding-search/modernizr.custom.js');
		$this->load->js('assets/libraries/expanding-search/classie.js');
		$this->load->js('assets/libraries/expanding-search/uisearch.js');
		$this->load->js('assets/libraries/jssor.js');
		$this->load->js('assets/libraries/jssor.slider.min.js');
		$this->load->js('assets/libraries/jquery.marquee.js');
		$this->output->set_template('home');		
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('logged_in')['role'] != NULL){
				echo "<script> alert('hy admin');</script>";
			}else{
				echo "<script> alert('hy pengembang');</script>";
			}
		}else{
			echo "<script> alert('hy guest');</script>";
		}
		
		// $this->load->view('home');
	}

	public function login(){
		if($this->isLogged()){
			redirect('home');
		}else{
			$this->output->set_template('home');
			$this->load->view('user/login');
		}
	}


}