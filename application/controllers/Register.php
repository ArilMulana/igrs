<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

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
    $this->load->library(array('form_validation','session','Whoami','Recaptcha','encryption','Encryption_Lib'));
    $this->load->library('email');
    $this->load->model(array('RegisterModel'));
	$this->_init();
	}

	// private function encrypt_id($id){
	// 	return $this->encryption->encrypt($id);
	// }

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


	function isLogged(){
		if($this->session->userdata('logged_in')){
			return true;
		}else{
			return false;
		}
	}


	public function index()
	{
		$this->output->set_title('Register');
		$this->load->js('assets/js/jquery-2.2.3.min.js');
		if($this->isLogged()){
			redirect('home');
		}else{
			$data = array(
				'action'=>"register/regis_user",
				'selected'=>array('parent'=>'','child'=>'',),
				'captcha'=>$this->recaptcha->getWidget(),
				'script_captcha'=>$this->recaptcha->getScriptTag(),
			);
			$this->output->set_template('home');
			$this->load->view('register',$data);
		}
	}
	
	public function regis_user(){
		$this->output->set_template('home');
		$data = array(
			'action'=>'',
			'selected'=>array('parent'=>'','child'=>''),
			'captcha'=>$this->recaptcha->getWidget(),
			'script_captcha'=>$this->recaptcha->getScriptTag(),
		);
		$this->form_validation->set_rules('name','Nama Lengkap','required|min_length[4]',array('required'=>'Nama Lengkap Harus Diisi'));
		$this->form_validation->set_rules('password','Password','required|min_length[5]',array('required'=>'Masukkan Kata Sandi Anda'));
		$this->form_validation->set_rules('re-password','Password Confirmation','required|matches[password]',array('required'=>'Masukkan Ulang Kata Sandi Anda'));
		$this->form_validation->set_rules('email','Email','required|valid_email',array('required'=>'Masukkan Alamat Email dengan Benar'));
		if($this->form_validation->run() == FALSE){
			$this->load->view('register',$data);
		}else{
			$get_lastid = $this->RegisterModel->register();
			//$this->UserModel->verif_acc($get_lastid);
			//echo $data[0]['konfirmasi'];
			$this->send_verif($get_lastid);	
		}
	}

	public function send_verif($get_lastid){
		//kirim link ke email
		$destination=$this->input->post('email');
		$encrypt_id = $this->encryption_lib->encode($get_lastid);
		// echo $this->encrypt->decode($encrypt_id);
		// echo $get_lastid;
	    $config['protocol'] = "smtp";
	    $config['smtp_host'] = "ssl://smtp.gmail.com";
	    $config['smtp_port'] = "465";
	    $config['smtp_user'] = "igrsunj@gmail.com";
	    $config['smtp_pass'] = "namasayaaril";
	    $config['charset'] = "utf-8";
    	$config['mailtype'] = "html";
    	$config['newline'] = "\r\n";
	  
	    $this->email->initialize($config);
	    $this->email->clear(true);
	    $this->email->from('igrsunj@gmail.com', 'IGRS UNJ');
	    $this->email->subject('Verifikasi Akun Indonesia Game Rating System');
	    $this->email->message('<p style="font-weight:bold;">Waktu Verifikasi hanya 1x24 jam </p> silahkan kamu melakukan registrasiClick <a href="'.LOCAL_URL.'verifikasi/'.$encrypt_id.'">Link ini </a> untuk melakukan verifikasi account');
	    $this->email->to($destination);
	    if($this->email->send()){
	     echo "<script>
	      alert('Silahkan Lakukan Verifikasi ID pada Email Anda');
	      window.location.href='".base_url()."register';
	      </script>";
	    }else{
	      show_error($this->email->print_debugger());
	    }
	    // $this->email->attach($b);

	}
	public function verif_account($id){
		$decrypt_id = $this->encryption_lib->decode($id);
		//echo $decrypt_id;
		$this->RegisterModel->verif_acc($decrypt_id);
		echo "<script>
	      alert('Selamat account anda telah aktif');
	      window.location.href='".base_url()."login';
	      </script>";
	}

	

	//profil contributor


}
