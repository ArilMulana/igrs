<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class SearchModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('Whoami','Upload_img','encrypt'));
        $this->load->model('UserModel');
        //$this->_init();
    }

    public function check_artikel($key,$limit){

   		$this->db->like('judul',$key,'both');
   		$this->db->or_like('isi',$key,'both');
   		//$this->db->where('artikel_time <=','NOW');
   		$this->db->order_by('artikel_time','desc');
   		$this->db->limit($limit);
   		$query = $this->db->get('ig_artikel');
   		$artikel = $query->result_array();
   		//print_r($artikel);
   		return $query->result_array();
    }

    public function check_apps($key,$limit){
    	$this->db->like('nama_produk',$key,'both');
   		$this->db->or_like('deskripsi',$key,'both');
   		$this->db->or_like('genre',$key,'both');
   		$this->db->order_by('tgl_publish','desc');
   		$this->db->limit($limit);
   		$query = $this->db->get('ig_game');
   		$game = $query->result_array();
   		//print_r($game);
   		return $query->result_array();
    }

    public function general_search($key){
    
    	$limit_data= 9; 
    	$jml_artikel = count($this->check_artikel($key,$limit_data)); // max 9
    	$jml_game = count($this->check_apps($key,$limit_data));
    	

    	if($jml_game + $jml_artikel == 9){
    		if($jml_game > $jml_artikel){ 
    			$sisa = $jml_game - $jml_artikel; 
    			$data = array(
    				'game'=>$this->check_apps($key,$jml_game),
    				'artikel'=>$this->check_artikel($key,$sisa),
    			);
    			

    			return $data;
    			
    		}else if($jml_game < $jml_artikel){

    			$sisa = $jml_artikel - $jml_game;
    			$data = array(
    				'game'=>$this->check_apps($key,$sisa),
    				'artikel'=>$this->check_artikel($key,$jml_artikel),
    			);
    			return $data;
    		}	
    	}
    	if($jml_game + $jml_artikel < 9){
    			$data = array(
    				'game'=>$this->check_apps($key,$jml_game),
    				'artikel'=>$this->check_artikel($key,$jml_artikel),
    			);
    			
    			return $data;
    	}

    	if($jml_game + $jml_artikel > 9){
    		$data = array(
    				'game'=>$this->check_apps($key,5),
    				'artikel'=>$this->check_artikel($key,4),
    		);
    		return $data;
    	}
    	
    }


}
?>  