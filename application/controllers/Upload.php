<?php
/**
* 
*/
class Upload extends CI_Controller
{
	
	private $folder = 'contributor';
	//var $sesdat;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    $this->load->library(array('Upload_img','Whoami'));
	    $this->load->model('LoginModel');
	    $this->load->model('UserModel');
	    $this->load->model('UploadModel');
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

	// function isLogged(){
	// 	if($this->session->userdata('logged_in')){
	// 		return true;
	// 	}else{
	// 		return false;
	// 	}
	// }

	public function my_artikel(){
		$data = $this->whoami->get_role_id();
		if($data['my_role'] == '6'){
				$data = array(
				'selected'=>array('parent'=>'','child'=>$this->m_artikel),
				'get_artikel'=>$this->ArtikelModel->my_artikel($data['id'],$data['my_role']),
				);
		//$this->whoami->decrypt_identity($id);
			$this->output->set_title('Artikel Saya');
			$this->output->set_template('profil');
			$this->load->view($this->folder.'/'.'my_artikel',$data);
			}else{
				show_404();
			}
	} 

	function buatartikel(){
		$this->load->js('assets/tinymce/tinymce.min.js');
		$this->output->set_title('Artikel Baru');
		if($this->whoami->isLogged()){
			$data = array(
				'selected'=>array('parent'=>$this->artikel,'child'=>'',),
				'action'=>"contributor/artikel/upload",
				);
			$this->load->view('contributor/createartikel',$data);
			$this->output->set_template('home');

		}else{
			redirect('home');
		}	
	}

	function edit_artikel($id_artikel){
		$sesdat = $this->whoami->isLogged();
		$identity = $this->whoami->get_role_id($sesdat);
		$data = array(
			'action'=>'',
			'id_user'=>'',
			'id_artikel'=>'',
			'selected'=>array('parent'=>'','child'=>''),
			//'artikel_slug'=>$slug,
			'get'=>$this->ArtikelModel->data_artikel($id_artikel,$identity),
		);
		$this->load->js('assets/tinymce/tinymce.min.js');
		$this->output->set_title('Edit Artikel | '.$data['get']['slug']	);
		$this->output->set_template('home');
		$this->load->view($this->folder.'/createartikel',$data);
	}

	private function resizeImage($befImage){
		$config['image_library'] = 'gb2';
		$config['source_image']= $befImage;
		$config['create_thumb'] = true;
		$config['maintain_ratio'] = true;
		$config['width'] = '170';
		$config['height'] = '153';

		$this->image_lib->resize($config);
	}

	public function upload(){
	
	$type = "Artikel";
	//$this->load->library('upload');
    $this->output->set_title('Create Artikel');
    $this->output->set_template('home'); 
    $config = $this->upload_img->set_upload($type); 
     $this->upload->initialize($config);
     if($_FILES['cover']['name'])
        {
            if ($this->upload->do_upload('cover'))
            {
            	$get = $this->UploadModel->upload_data();
           //      $images = $this->upload->data();
           //      $data = array(
           //          'cover'=>$images['file_name'],
        			// 'judul'=>$this->input->post('judul'),
			        // 'slug'=>url_title(strtolower($this->input->post('judul'))),
			        // 'isi'=>$this->input->post('isi'),
			        // 'kategori_artikel'=>$this->input->post('cat'),
			        // 'artikel_status'=>0, //no publish
           //        );
           //        if($this->session->userdata('logged_in')['role'] == "6"){
           //        	$data['artikel_contributor'] = $this->session->userdata('logged_in')['id_contri'];
           //        }else{
           //        	$data['artikel_admin'] = $this->session->userdata('logged_in')['id'];
           //        }
                $this->load->js('assets/tinymce/tinymce.min.js');
				$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
				$this->form_validation->set_rules('isi', 'Isi', 'trim|required');
	   			if($this->form_validation->run() == false)
					{
						$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data !!</div></div>");
                		redirect('artikel/buatartikel','refresh');
					}else
					{
						 $this->ArtikelModel->create_artikel($get);
               			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Save !!</div></div>");
               			 redirect('artikel/buatartikel','refresh'); //jika berhasil maka akan ditampilkan view vupload
               		}
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data !!</div></div>");
                redirect('artikel/buatartikel','refresh'); //jika gagal maka akan ditampilkan form upload
                //echo "<script>alert('gagal')</script>";
            }
        }
		
	}
}