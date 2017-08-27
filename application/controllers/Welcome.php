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
    $this->load->library('form_validation');
    // $this->load->model('NavigationModel');
    // $this->load->model('CategoryModel');
    // $this->load->model('PostModel');
    // $this->load->model('PageModel');
    // $this->load->model('LoginModel');
    // $this->load->model('RegisterModel');
	$this->_init();
	}

	private function _init()
	{
    $this->load->css('assets/css/bootstrap.min.css');
    $this->load->js('assets/js/jquery-2.2.3.js');
    $this->load->js('assets/js/bootstrap.min.js');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	function test()
	{
		$this->load->css('assets/css/bootstrap.min.css');
		$this->load->view('welcome_message');
	}
}
