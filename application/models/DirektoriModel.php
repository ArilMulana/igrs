<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class DirektoriModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('Whoami','Upload_img','encrypt'));
        $this->load->model('UserModel');
        //$this->_init();
    }

    public function get_direktori($slug = FALSE){

      if($slug === FALSE){
        $query = $this->db->get('ig_game');
        return $query->result_array();
      }

      $query = $this->db->get_where('ig_game', array('slug' => $slug));
      return $query->row_array();

    }

    public function get_direktori_related($genre, $id){

      $query = $this->db->query("SELECT * FROM ig_game WHERE no_aplikasi != $id ORDER BY FIELD(genre, '$genre') DESC");
      return $query->result_array();

  }


}
?>
