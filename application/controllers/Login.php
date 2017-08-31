<?php
class Login extends CI_Controller {

		private $a_login = 2;
		function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
			$this->load->model('LoginModel');
			$this->_init();
		}

		function isLogged(){
			if($this->session->userdata('logged_in')){
				return true;
			}else{
				return false;
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

        function check_database($password)
        {
	        $email = $this->input->post('email');
			$result = $this->LoginModel->login($email,$password);
			if($result){
				$sess_array = array();
				foreach ($result as $row) {
					echo $row->role;
					if($row->role < "6" ){
						$sess_array = array(
							'no'=> $row->no,
							'nama'=>$row->nama,
							'no_pegawai'=>$row->no_pegawai,
							'email'=>$row->email,
							'password'=>$row->password,
							'status'=>$row->status,
							'role'=>$row->role,
							'keterangan' => $row->keterangan,
							'jabatan'=>$row->jabatan,
							'instansi'=>$row->instansi,
							'alamat'=>$row->alamat,
							'no_telp'=>$row->no_telp,
							'token'=>$row->token_forget_password,
							'foto'=>$row->foto,
							'informasi_umum'=>$row->informasi_umum
						);
					$this->session->set_userdata('logged_in',$sess_array);
					}else{
						$sess_array = array(
							'id'=> $row->id_pengembang,
							'no_daftar'=>$row->no_daftar,
							'kategori_pengembang'=>$row->kategori_pengembang,
							'nama_pemilik'=>$row->nama_pemilik,
							'tanggal_lahir'=>$row->tanggal_lahir,
							'nama_perusahaan'=>$row->nama_perusahaan,
							'nama_studio'=>$row->nama_studio,
							'logo' => $row->logo,
							'alamat_usaha'=>$row->alamat_usaha,
							'negara'=>$row->negara,
							'provinsi'=>$row->provinsi,
							'kota'=>$row->kota,
							'kode_pos'=>$row->kode_pos,
							'no_telp'=>$row->no_telp,
							'website'=>$row->website,
							'email'=>$row->email,
							'tahun_diri'=>$row->tahun_diri,
							'jml_pegawai'=>$row->jml_pegawai,
							'kontak_nama'=>$row->kontak_nama,
							'kontak_email'=>$row->kontak_email,
							'kotak_telp'=>$row->kotak_telp,
							'no_tdp'=>$row->no_tdp,
							'lampiran_tdp'=>$row->lampiran_tdp,
							'no_siup'=>$row->no_siup,
							'no_npwp'=>$row->no_npwp,
							'lampiran_npwp'=>$row->lampiran_npwp,
							'no_duns'=>$row->no_duns,
							'lampiran_duns'=>$row->lampiran_duns,
							'password'=>$row->password,
							'konfirmasi'=>$row->konfirmasi,
							'waktu_daftar'=>$row->waktu_daftar,
							'waktu_exp_aktivasi'=>$row->waktu_exp_aktivasi,
							'token_forget_password'=>$row->token_forget_password,
							'role'=>$row->role,
						);
					$this->session->set_userdata('logged_in',$sess_array);
					}
				return true;
				}
			}
			else{
				$this->form_validation->set_message('check_database','invalid username or password');
				return false;
			}
        }

        function logging()
		{
			$this->form_validation->set_rules('email', 'Username', 'trim|required');
	   		$this->form_validation->set_rules('pass', 'Password', 'trim|required|callback_check_database');
	    	$this->form_validation->set_error_delimiters('<p class="text text-danger">','</p>');
			if($this->form_validation->run() == false)
			{
				$this->output->set_template('home');
				$this->load->view('user/login');
			}else
			{
				redirect('home','refresh');
			}
		}

		function logout(){
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('home');
		}

		public function login(){
			if($this->isLogged()){
				redirect('home');
			}else{
				$data = array(
					'selected'=>$this->a_login,
					);
				$this->output->set_title('Login');
				$this->output->set_template('home');
				$this->load->view('user/login',$data);
			}
		}

}