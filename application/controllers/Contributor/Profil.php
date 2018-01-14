<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Profil extends CI_Controller{
	private $role = '6';
	private $m_profil = '1';
	private $m_ubah_pass = '2';
	private $m_artikel = '3'; 
	private $m_comment = '4';
	//folder
	private $folder = 'contributor';
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    $this->load->library(array('Whoami'));
	    $this->load->library('encryption');
	    //$this->load->driver('cache',array('adapter'=>'apc','backup'=>'file'));
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

	public function get_profil($id){
		$this->load->css('assets/test/jquery.datetimepicker.css');
		$sess = $this->whoami->decrypt_identity($id);
		if($id){
			$data =array(
			//'id_user'=>$sess['id_real'],
			'action'=>'contributor/profil/updateprofil',
			'selected'=>array('parent'=>'','child'=>$this->m_profil),
			'sesdat'=>$this->whoami->sesdat(),
			//'role'=>$this->whoami->role_me($get_profil),
			);
		$this->output->set_title('My Profil');
		$this->output->set_template('profil');
			if($sess['role'] == "6"){
				$this->load->view($this->folder.'/edit_profil',$data);	
			}else{ // if( <= 5 // admin redirect profil admin ) / if(==7 developper redirect profil developper)
				$this->load->view('blank1',$data);
			}		
		}else{
			show_404();
		}
	}

	public function updateprofil(){
		//redirect('home');
		$type = "my_foto";
	//$this->load->library('upload');
    $this->output->set_title('Update Profil');
    $this->output->set_template('profil'); 
    $config = $this->upload_img->set_upload($type); 
     $this->upload->initialize($config);
     if($_FILES['img_profil']['name'])
        {
            if ($this->upload->do_upload('img_profil'))
            {
                $images = $this->upload->data();
                $data = array(
                    'foto_profil'=>$images['file_name'],
        			'tgl_lahir'=>$this->input->post('date'),
			        'alamat'=>$this->input->post('address'),
                  );
                $this->load->js('assets/tinymce/tinymce.min.js');
				$this->form_validation->set_rules('date', 'Tanggal Lahir', 'trim|required');
				$this->form_validation->set_rules('address', 'Alamat', 'trim|required');
	   			if($this->form_validation->run() == false)
					{
						$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data sessiom !!</div></div>");
                		redirect('profil/'.md5($this->session->userdata('logged_in')['id_contri']),'refresh');
					}else
					{
						 $this->UserModel->edit_profil($data);
						 //$this->session->unset_userdata($this->session->userdata('logged_in')['id_contri']);
               			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Save !!</div></div>");
               			 redirect('profil/'.md5($this->session->userdata('logged_in')['id_contri']),'refresh'); //jika berhasil maka akan ditampilkan view vupload
               		}
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data do upload ga kebaca!!</div></div>");
                redirect('profil/'.md5($this->session->userdata('logged_in')['id_contri']),'refresh'); //jika gagal maka akan ditampilkan form upload
                //echo "<script>alert('gagal')</script>";
            }
        }
		
	}
	}

?>