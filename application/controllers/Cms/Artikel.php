<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller {

  public function __construct(){
    parent::__construct();
     $this->load->model('LoginModel');
	    $this->load->model('ArtikelModel');
	    $this->load->model('UploadModel');
    $this->load->helper(array('url_helper', 'form', 'url'));
    $this->load->library(array('pagination','form_validation','Upload_img'));
    $this->_init();

    function excerpt($string){
    	$string = substr($string, 0, 100);
    	return $string. "...";
    }

    $sesdat = $this->session->userdata('logged_in');
    
    // if($sesdat['role'] == 5){
    // 	//die($sesdat['role']);
    // 	redirect(site_url('cms/artikel'));
    // }
    // else{
    // 	redirect(site_url('berita'));
    // }

  }

  private function _init()
	{
	setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
	date_default_timezone_set('Asia/Jakarta');
	 $this->load->css('assets/css/bootstrap.css');
    $this->load->js('assets/js/jquery-2.2.3.js');
    $this->load->css('assets/dist/css/skins/_all-skins.min.css');
    $this->load->js('assets/plugins/fastclick/fastclick.min.js');
    $this->load->js('assets/plugins/slimScroll/jquery.slimscroll.min.js');
    $this->load->js('assets/dist/js/demo.js');
	}

	public function index()
	{
		$this->load->js('assets/js/datatables.min.js');
		 $this->load->css('assets/css/datatables.min.css');
		//$this->load->js('assets/bootstrap/js/bootstrap.min.js');
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			'artikel'=>$this->ArtikelModel->get_artikel(),
			'get'=>$this->ArtikelModel->artikel_saya(),
		);
		//$data['artikel'] = $this->ArtikelModel->get_artikel();
		$this->output->set_template('dashboard');
		// $this->load->view('cms/header');	
		$this->load->view('cms/kelola_artikel', $data);
		//$this->load->view('cms/footer');
	}


  public function view($slug = NULL)
	{
		 $artikel = $this->ArtikelModel->get_artikel($slug);
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			'artikel_item'=>$artikel,
		);
		$this->load->js('assets/tinymce/tinymce.min.js');
	    $this->output->set_template('dashboard');
	   // $this->load->view('cms/header');
		$this->load->view('cms/lihat_artikel', $data);
		//$this->load->view('cms/footer');
	}

	public function create(){
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			'action'=>'cms/artikel/coba',
			//'artikel'=>$this->ArtikelModel->get_artikel(),
		);
		$this->load->js('assets/tinymce/tinymce.min.js');
			$this->output->set_template('dashboard');
			//$this->load->view('cms/header');
			$this->load->view('cms/tambah_artikel',$data);


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
		$data = array(
			'sesdat'=>$this->whoami->sesdat(),
			'artikel'=>$this->ArtikelModel->get_artikel_validasi(),
		);
		//$this->load->view('cms/header');
		$this->output->set_template('dashboard');	
		$this->load->view('cms/artikel_validasi', $data);
		//$this->load->view('cms/footer');
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
		$type = "Artikel"; // nama forlder
	//$this->load->library('upload');
    $this->output->set_title('Create Artikel');
    $this->output->set_template('home'); 
    $config = $this->upload_img->set_upload($type); 
     $this->upload->initialize($config);
     if($_FILES['cover']['name'])
        {
            if ($this->upload->do_upload('cover'))
            {
                $images = $this->upload->data();
                $data = $this->UploadModel->upload_artikel_img($images);
                $this->load->js('assets/tinymce/tinymce.min.js');
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				$this->form_validation->set_rules('isi', 'Isi', 'trim|required');
	   			if($this->form_validation->run() == false)
					{
						$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data  1!!</div></div>");
                		redirect('cms/artikel','refresh');
					}else
					{
						 $this->ArtikelModel->create_artikel($data);
               			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Save !!</div></div>");
               			 redirect('cms/artikel','refresh'); //jika berhasil maka akan ditampilkan view vupload
               		}
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data 2!!</div></div>");
                redirect('cms/artikel','refresh'); //jika gagal maka akan ditampilkan form upload
                //echo "<script>alert('gagal')</script>";
            }
        }
	}


}