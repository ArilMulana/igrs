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
        //SELECT *, COUNT(no_aplikasi) as aplikasi, AVG(nilai_bintang) as rata_rata FROM ig_game LEFT JOIN ig_game_bintang ON ig_game.no_aplikasi = ig_game_bintang.aplikasi_id GROUP BY no_aplikasi
        $this->db->select('*, COUNT(no_aplikasi) as jumlah, AVG(nilai_bintang) as rata_rata');
        $this->db->from('ig_game');
        $this->db->join('ig_game_bintang', 'ig_game.no_aplikasi = ig_game_bintang.aplikasi_id', 'left');
        $this->db->group_by('no_aplikasi');
        $query = $this->db->get('');
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
      // print_r($sesdat);
      // die();
      if($sesdat['role'] == 6){
        $data = array(
        'contri_id'=>$sesdat['id_contri'],  
        'aplikasi_id'=>$id,
        'nilai_bintang'=>$this->input->post('bintang'),
        );
        $this->db->insert('ig_game_bintang',$data);
      }
      elseif($sesdat['role'] == 7){
        $data = array(
        'pengembang_id'=>$sesdat['id_pengembang'],  
        'aplikasi_id'=>$id,
        'nilai_bintang'=>$this->input->post('bintang'),
        );
        $this->db->insert('ig_game_bintang',$data);
      }
    }

    public function cek_bintang($slug){
      $this->db->join('ig_game_bintang', 'ig_game.no_aplikasi = ig_game_bintang.aplikasi_id');
      $query = $this->db->get_where('ig_game', array('slug' => $slug));
      return $query->row_array();
    }

    public function get_direktori_popular($slug = FALSE){

      if($slug === FALSE){
        $this->db->select('*, COUNT(no_aplikasi) as jumlah, AVG(nilai_bintang) as rata_rata');
        $this->db->from('ig_game');
        $this->db->join('ig_game_bintang', 'ig_game.no_aplikasi = ig_game_bintang.aplikasi_id', 'left');
        $this->db->group_by('no_aplikasi');
        $this->db->order_by('rata_rata', 'DESC');
    
        $query = $this->db->get('');
        return $query->result_array();
      }

      $query = $this->db->get_where('no_aplikasi', array('slug' => $slug));
      return $query->row_array();
     }

}
?>
