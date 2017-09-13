<?php 
class Kategori extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    $this->load->library('whoami');
	    $this->load->model('LoginModel');
	    $this->load->model('ArtikelModel');
	    $this->load->model('UploadModel');
	    $this->_init();

	}

	private function _init()
	{
    setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
     $this->load->css('assets/css/bootstrap.min.css');
    $this->load->js('assets/js/jquery-2.2.3.js');
    $this->load->css('assets/dist/css/skins/_all-skins.min.css');
    $this->load->js('assets/plugins/fastclick/fastclick.min.js');
    $this->load->js('assets/plugins/slimScroll/jquery.slimscroll.min.js');
    $this->load->js('assets/dist/js/demo.js');
	}

	public function index(){
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			);
		$this->output->set_template('dashboard');
		$this->load->view('blank',$data);
	}
}
?>