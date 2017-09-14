<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller{
	function __construct(){
		parent:: __construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library('whoami');
		$this->_init();
	}


	function excerpt($string){
    	$string = substr($string, 0, 100);
    	return $string. "...";
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
		$ses['sesdat'] = $this->whoami->sesdat();
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

	public function test(){
		//nih yog
		$data['artikel'] = $this->ArtikelModel->get_artikel();
		$this->load->css('assets/css/datatables.min.css');
		$this->load->js('assets/js/datatables.min.js');
		$this->output->set_template('dashboard');
		$this->load->view('blank',$data);
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->js('assets/tinymce/tinymce.min.js');
		//$this->load->css('')
		
		$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array('required'=>'%s Harus diisi'));
	
		if($this->form_validation->run() === FALSE){
			$this->load->view('cms/tambah_artikel');
			$this->output->set_template('dashboard');
		}
		else{
			$this->ArtikelModel->set_artikel();
      		redirect('cms/artikel');
		}

	}

	public function update($id){

		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->js('assets/tinymce/tinymce.min.js');

		$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array('required'=>'%s Harus diisi'));

		if($this->form_validation->run() === FALSE){
			$data['artikel_item'] = $this->ArtikelModel->get_artikel_id($id);
      		$this->load->view('cms/edit_artikel', $data);
      		$this->output->set_template('dashboard');
		}
		else{
			$this->ArtikelModel->update_artikel($id);
			redirect('cms/artikel');
		}
		//$this->isAdmin();
		
		

	}


	public function delete($id){
		$this->ArtikelModel->delete_artikel($id);
		redirect('cms/artikel');
	}

	public function validasi()
	{
		$data['artikel'] = $this->ArtikelModel->get_artikel_validasi();
		$this->load->css('assets/css/datatables.min.css');
		$this->load->js('assets/js/datatables.min.js');
		$this->load->view('cms/artikel_validasi', $data);
		$this->output->set_template('dashboard');
	}

	public function konfirmasi($id){
		$this->ArtikelModel->konfirmasi_artikel($id);
		redirect('cms/artikel-belum-konfirmasi');
	}

	public function pinpost($id){
		$this->ArtikelModel->pinpost_artikel($id);
		redirect('cms/artikel');
	}

	public function unpin($id){
		$this->ArtikelModel->unpin_artikel($id);
		redirect('cms/artikel');
	}

}
}
?>