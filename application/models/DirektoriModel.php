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

      //SELECT * FROM ig_game JOIN ig_pengembang ON ig_game.no_aplikasi = ig_pengembang.id_pengembang
      $this->db->join('ig_pengembang', 'ig_game.id_pengembang = ig_pengembang.id_pengembang');
      $query = $this->db->get_where('ig_game', array('slug' => $slug));
      return $query->row_array();

    }

    public function get_direktori_related($genre, $id){

      $query = $this->db->query("SELECT * FROM ig_game WHERE no_aplikasi != $id ORDER BY FIELD(genre, '$genre') DESC");
      return $query->result_array();

    }

    public function bintang(){
      $id = $this->input->post('no_aplikasi');
      $sesdat = $this->whoami->sesdat();
      if(!isset($sesdat)){
      $data = array(
        'nama'=>$this->input->post('nama'),
        'aplikasi_id'=>$id,
        'nilai_bintang'=>$this->input->post('bintang'),
        );
      }else{
        $data = array(
        'aplikasi_id'=>$id,
        'nilai_bintang'=>$this->input->post('bintang'),
        );
      }
      //$data['artikel_id']=$id;
      //$data['comment_post']=$this->input->post('comment');
      $this->db->insert('ig_game_bintang',$data);
    }

}
?>
