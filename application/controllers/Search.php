<?php
/**
* 
*/
class Search extends CI_Controller
{
	
 //private $folder = 'contributor';
	//var $sesdat;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	   // $this->load->library(array('Upload_img','Whoami'));
	    $this->load->model(array('LoginModel','UserModel','SearchModel'));
	    //$this->load->model();
	   // $this->load->model('UploadModel');
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

	public function index(){
		$key = $this->input->post('search');
			if($key !=''){
				redirect('search/all_category/'.$key);
			}
	}

	public function all_category($key=''){
		$this->load->js('assets/js/jquery-2.2.3.js');
		if($key){
			$data = array(
				'action'=>'',
				'selected'=>array('parent'=>'','child'=>''),
				// 'artikel'=>$this->SearchModel->check_artikel($key,0),
				// 'game'=>$this->SearchModel->check_apps($key,0),
				'get'=>$this->SearchModel->general_search($key),
			);
			$this->output->set_template('home');
			$this->load->view('blank',$data);
		}
	}

	
	// function isLogged(){
	// 	if($this->session->userdata('logged_in')){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

}