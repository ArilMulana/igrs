<?php
/**
* 
*/
class Artikel extends CI_Controller
{
	private $role = '6';
	//parent
	private $artikel = '1';
	//child
	private $m_profil = '1';
	private $m_ubah_pass = '2';
	private $m_artikel = '3'; 
	private $m_comment = '4';
	private $folder = 'contributor';
	//var $sesdat;
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    $this->load->library(array('Upload_img','Whoami','pagination'));
	    $this->load->model('LoginModel');
	    $this->load->model('ArtikelModel');
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
					'get'=>$this->ArtikelModel->artikel_saya(),
					
					);
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
			'action'=>'contributor/artikel/update_artikel'.'/'.$id_artikel,
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
                		redirect('artikel/buatartikel','refresh');
					}else
					{
						 $this->ArtikelModel->create_artikel($data);
               			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Save !!</div></div>");
               			 redirect('artikel/buatartikel','refresh'); //jika berhasil maka akan ditampilkan view vupload
               		}
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data 2!!</div></div>");
                redirect('artikel/buatartikel','refresh'); //jika gagal maka akan ditampilkan form upload
                //echo "<script>alert('gagal')</script>";
            }
        }
		
	}

	public function update_artikel($id){
		$type= "Artikel";
		$this->output->set_title('Update Artikel');
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
							$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Ubah Data!!</div></div>");
	                		redirect('my_artikel/edit'.'/'.$id,'refresh');
						}else
						{
							 $this->ArtikelModel->update_artikel_con($id,$data);
	               			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Ubah !!</div></div>");
	               			 redirect('my_artikel/edit/'.$id,'refresh'); //jika berhasil maka akan ditampilkan view vupload
	               		}
	            }else{
	                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
	                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Ubah Data!!</div></div>");
	                redirect('my_artikel/edit/'.$id,'refresh'); //jika gagal maka akan ditampilkan form upload
	                //echo "<script>alert('gagal')</script>";
	            }
	        }
	}

	public function list_artikel(){
		//$data = $this->whoami->get_role_id();

		$this->whoami->isLogged();
		// $id = $userid['id'];
		// $this->whoI($id);
		//$this->whoAmI($user);
		// if($user !=''){
		// 	if($user == url_title(strtolower($this->session->userdata('logged_in')['name'])))
		// 	{
				//$name = $this->session->userdata('logged_in')['nama_contributor'];
				$count = count($this->ArtikelModel->artikel_saya());
		        $config = array();
				$config["base_url"] =base_url('my_artikel/list/');
				$config["total_rows"] = $count;
				$config["per_page"] = 5;
				$config['use_page_numbers'] = TRUE;
				$config['num_links'] = $count;
				$config['display_pages'] = FALSE;
				$config['cur_tag_open'] = '&nbsp;<a class="current">';
				$config['cur_tag_close'] = '</a>';
				// $config['next_tag_open']='<a>';
				// $config['next_tag_close']='</a>';
				//For PREVIOUS PAGE Setup
				$config['prev_link'] = 'prev';
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				//For NEXT PAGE Setup
				$config['next_link'] = 'Next';
				$config['next_tag_open'] = '<li>';
				$config['next_tag_close'] = '</li>';
				// $config['prev_link'] = 'Previous 1111111111111111';
				// $config['next_link'] = 'Next';
				$this->pagination->initialize($config);

			  if($this->uri->segment(3) != 1 && $this->uri->segment(3)){
		          $page = ($this->uri->segment(3)*5 - 5) ;
		          //echo $page;
		        } else {
		          $page = 0;
		        }

				$data['get']= $this->ArtikelModel->pagination_article($config['per_page'],$page);
		    	$str_links = $this->pagination->create_links();
		        $data['links'] = explode('&nbsp;',$str_links);
		        $data['selected']= array('parent'=>'','child'=>$this->m_artikel);
				//explode('&nbsp;',$str_links);
				//$data['update']= $this->UserModel->updateNotif($id);
				$data['sesdat']= $this->whoami->isLogged();
				$this->load->js('assets/js/bootstrap.min.js');
				$this->output->set_title('Artikel');
				$this->output->set_template('profil');
				$this->load->view($this->folder.'/'.'my_artikel',$data);
			// }else{
			// 	show_404();
			// }
	
		// }else{
		// 	show_404();
		// }
	}
}