<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
 
class upload_img {
	var $ci;

	function __construct()
		{
		$this->ci = & get_instance();
		$this->ci->load->helper('url', 'form');
	    $this->ci->load->library('form_validation','session');
		}

	public function set_upload($type){
	 $nmfile = $type_.time(); //nama file saya beri nama langsung dan diikuti fungsi time
     $config['upload_path'] = './assets/images/'; //path folder
     $config['allowed_types'] = 'jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
     $config['max_size'] = '620'; //maksimum besar file 2M
     $config['max_width']  = '3000'; //lebar maksimum 3000 px
     $config['max_height']  = '1500'; //tinggi maksimu 1500 px
     $config['file_name'] = $nmfile; //nama yang terupload nantinya
     return $config;
     // $this->upload->initialize($config);
	}
}
?>