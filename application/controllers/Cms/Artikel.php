<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('ArtikelModel');
    $this->load->helper(array('url_helper', 'form', 'url'));
    $this->load->library(array('pagination','form_validation', 'session'));

    function excerpt($string){
    	$string = substr($string, 0, 100);
    	return $string. "...";
    }

  }

  private function _init()
	{
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

	// public function index()
	// {
	// 	$this->output->set_template('dashboard');
	// 	$data['artikel'] = $this->ArtikelModel->get_artikel();
	// 	$this->load->view('cms/header');	
	// 	$this->load->view('cms/kelola_artikel', $data);
	// 	$this->load->view('cms/footer');
	// }

	public function index(){
		//$this->isAdmin();
		$this->load->view('blank');
		$this->output->set_template('dashboard');

	}


  	public function view($slug = NULL)
	{
	    $artikel = $this->ArtikelModel->get_artikel($slug);
	    $data['artikel_item'] = $artikel;
	    $this->load->view('cms/header');
		$this->load->view('cms/lihat_artikel', $data);
		$this->load->view('cms/footer');
	}

	public function create(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('artikel_status', 'status', 'required', array('required'=>'%s Harus diisi'));

		if($this->form_validation->run() === FALSE){
			$this->load->view('cms/header');
			$this->load->view('cms/tambah_artikel');
			$this->load->view('cms/footer');
		}
		else{
			$this->ArtikelModel->set_artikel();
      		redirect('cms/artikel');
		}

	}

	public function update($id){

		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('judul', 'Judul', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('isi', 'Isi', 'required', array('required'=>'%s Harus diisi'));
		$this->form_validation->set_rules('artikel_status', 'status', 'required', array('required'=>'%s Harus diisi'));

		if($this->form_validation->run() === FALSE){
			$data['artikel_item'] = $this->ArtikelModel->get_artikel_id($id);
			$this->load->view('cms/header');
      		$this->load->view('cms/edit_artikel', $data);
      		$this->load->view('cms/footer');
		}
		else{
			$this->ArtikelModel->update_artikel($id);
			redirect('cms/artikel');
		}

	}

	public function delete($id){
		$this->ArtikelModel->delete_artikel($id);
		redirect('cms/artikel');
	}

	public function validasi()
	{
		$data['artikel'] = $this->ArtikelModel->get_artikel_validasi();
		$this->load->view('cms/header');	
		$this->load->view('cms/artikel_validasi', $data);
		$this->load->view('cms/footer');
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

	public function coba(){
		$this->load->js('assets/js/bootstrap.min.js');
		$this->output->set_template('dashboard');
	}

}