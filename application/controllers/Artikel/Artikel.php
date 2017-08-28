<?php
/**
* 
*/
class Artikel extends CI_Controller
{
	private $artikel = 1;
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
	    $this->load->library('form_validation','session');
	    
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

	function news(){
	$this->load->library('upload');
    // $sesdat = $this->isLogged();
    $this->output->set_title('Buat Artikel');
    $this->output->set_template('home'); 
     $nmfile = "artikel_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
     $config['upload_path'] = './assets/images/'; //path folder
     $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
     $config['max_size'] = '300'; //maksimum besar file 2M
     $config['max_width']  = '1300'; //lebar maksimum 1300 px
     $config['max_height']  = '800'; //tinggi maksimu 800 px
     $config['file_name'] = $nmfile; //nama yang terupload nantinya

    $this->upload->initialize($config);
     if($_FILES['cover']['name'])
        {
            if ($this->upload->do_upload('cover'))
            {
                $images = $this->upload->data();
                if($sesdat['role'] < 6){
                	$data = array(
                		'cover'=>$images['file_name'].$images['file_type'],
	                    'judul'=>$this->input->post('judul'),
	                    'slug'=>url_title(strtolower($this->input->post('judul'))),
	                    'isi'=>$this->input->post('isi'),
	                    'referensi_1'=>$this->input->post('url'),
	                    'artikel_by'=>$sesdat['no'],	
                    	'artikel_status'=> '2', //1 = active, 2 = non, 3 = verifikasi
                		);
                	}else{
                	$data= array(
                		'cover'=>$images['file_name'].$images['file_type'],
	                    'judul'=>$this->input->post('judul'),
	                    'slug'=>url_title(strtolower($this->input->post('judul'))),
	                    'isi'=>$this->input->post('isi'),
	                    'referensi_1'=>$this->input->post('url'),
	                    'artikel_by'=>$sesdat['id'],	
                    	'artikel_status'=> '2', //1 = active, 2 = non, 3 = verifikasi
                    	);
                	}
                // $this->mupload->get_insert($data); //akses model untuk menyimpan ke database
                // //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->ArtikelModel->create_artikel($data);
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Data Berhasil Di Save !!</div></div>");
                redirect('administrator/createhotnews','refresh'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal Save Data !!</div></div>");
                redirect('administrator/createhotnews'); //jika gagal maka akan ditampilkan form upload
            }
        }
    


      // echo "<script>
      // alert('Selamat Anda Menambahkan Jurusan');
      // window.location.href='".base_url()."administrator/partsis';
      // </script>";
  }


	function buatartikel(){
		$this->load->js('assets/tinymce/tinymce.min.js');
		$data = array(
			'sesdat'=>$this->isLogged(),
			'action'=>'',
			);
		$this->output->set_title('Artikel Baru');
		if($this->isLogged()){
			$this->load->view('createartikel',$data);
			$this->output->set_template('home');

		}else{
			redirect('home');
		}
	}
}