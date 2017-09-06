<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('ArtikelModel');
    $this->load->helper(array('url_helper', 'form', 'url'));
    $this->load->library(array('pagination','form_validation'));

    function excerpt($string){
    	$string = substr($string, 0, 100);
    	return $string. "...";
    }
  }

  private function _init()
	{
	setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
	$this->load->css('assets/libraries/bootstrap/bootstrap.min.css');
	$this->load->css('assets/libraries/style.css');
	// $this->load->css('assets/libraries/owl-carousel/owl.theme.css');
	$this->load->css('assets/libraries/fonts/font-awesome.min.css');
	$this->load->css('assets/css/components.css');
	// $this->load->js('assets/libraries/jquery.animateNumber.min.js');
	$this->load->js('assets/libraries/jquery.min.js');
	//$this->load->js('assets/dist/js/app.min.js');
	$this->load->js('assets/js/functions.js');
	}

	public function index()
	{
		$data['artikel'] = $this->ArtikelModel->get_artikel();
		$this->load->view('cms/header');	
		$this->load->view('cms/kelola_artikel', $data);
		$this->load->view('cms/footer');
	}

  public function view($slug = NULL)
	{
	    $artikel = $this->artikelModel->get_artikel($slug);
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

}