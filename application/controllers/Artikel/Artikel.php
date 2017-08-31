<?php
/**
* 
*/
class Artikel extends CI_Controller
{
	private $artikel = 1;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    $this->load->model('LoginModel');
	    $this->load->model('ArtikelModel');
	    $this->_init();
	}

	private function _init()
	{
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
     $this->load->css('assets/libraries/bootstrap/bootstrap.min.css');
	 $this->load->css('assets/libraries/style.css');
	 $this->load->css('assets/libraries/owl-carousel/owl.theme.css');
	 $this->load->css('assets/libraries/flexslider/flexslider.css');
	 $this->load->css('assets/libraries/fonts/font-awesome.min.css');
	 $this->load->css('assets/css/components.css');
	    // $this->load->js('assets/libraries/jquery.animateNumber.min.js');
	 $this->load->js('assets/libraries/flexslider/jquery.flexslider-min.js');
	    //$this->load->js('assets/dist/js/app.min.js');
	 $this->load->js('assets/js/functions.js');
	 $this->load->js('assets/js');
	}

	function isLogged(){
		if($this->session->userdata('logged_in')){
			return true;
		}else{
			return false;
		}
	}


	function index (){
		$this->output->set_title('Artikel');
	}

	function buatartikel(){
		$this->load->js('assets/tinymce/tinymce.min.js');
		$this->output->set_title('Artikel Baru');
		if($this->isLogged()){
			$data = array(
				'selected'=>$this->artikel,
				);
			$this->load->view('createartikel',$data);
			$this->output->set_template('home');

		}else{
			redirect('home');
		}	
	}

	function feedartikel(){
		// $this->load->js('assets/libraries/jquery.min.js'); // kgk keload
		$this->load->js('assets/tinymce/tinymce.min.js');
		// $this->form_validation->set_rules('cover', 'Cover Artikel', 'trim|required');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
	   	$this->form_validation->set_rules('refer', 'Referensi', 'trim|required');
	   	if($this->form_validation->run() == false)
			{
				$this->output->set_template('home');
				$this->load->view('createartikel');
			}else
			{
				$this->ArtikelModel->create_artikel();
				redirect('home','refresh');
			}

	}
}