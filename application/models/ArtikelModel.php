<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArtikelModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	function create_artikel($data)
    {
        //entah kenapa $this->input->postnya kgk ngambil yg dari view tolong benerin dong yog
       return $this->db->insert('ig_artikel', $data);
     
    }

    public function get_artikel($slug = FALSE){

    if($slug === FALSE){
      $query = $this->db->get_where('ig_artikel', array('artikel_status !=' => 0));
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

    }

  public function get_artikel_id($id = FALSE){

    $query = $this->db->get_where('ig_artikel', array('id_artikel' => $id));
    return $query->row_array();

  }

  public function set_artikel($data){
    $this->load->helper('url');

    $slug = url_title($this->input->post('judul'), 'dash', TRUE);

    $data = array(
      'judul' => $this->input->post('judul'),
      'isi' => $this->input->post('isi'),
      'artikel_status' => 1,
      'slug' => $slug
    );

    return $this->db->insert('ig_artikel', $data);
  }

  public function update_artikel($id){
    $this->load->helper(array('url', 'form'));

    $slug = url_title($this->input->post('judul'), 'dash', TRUE);

    $data = array(
      'judul' => $this->input->post('judul'),
      'isi' => $this->input->post('isi'),
      'slug' => $slug
    );

    $this->db->where('id_artikel', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function delete_artikel($id){
    return $this->db->delete('ig_artikel', array('id_artikel' => $id));
  }

  public function get_artikel_validasi($slug = FALSE){

    if($slug === FALSE){
      $query = $this->db->get_where('ig_artikel', array('artikel_status' => 0));
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

  }

  public function get_artikel_publish($slug = FALSE){

    if($slug === FALSE){
      $query = $this->db->get_where('ig_artikel', array('artikel_status' => 1));
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

  }

  public function get_artikel_latest($slug = FALSE){

    if($slug === FALSE){
      $this->db->order_by('artikel_time', 'DESC');
      $query = $this->db->get('ig_artikel');
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

  }

  public function get_artikel_pinpost($slug = FALSE){

    if($slug === FALSE){
      $query = $this->db->get_where('ig_artikel', array('artikel_status' => 2));
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

  }

  public function konfirmasi_artikel($id){
    $this->load->helper('form');

    $data = array(
      'artikel_status' => 1,
    );

    $this->db->where('id_artikel', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function pinpost_artikel($id){
    $this->load->helper('form');

    $data = array(
      'artikel_status' => 2,
    );

    $this->db->where('id_artikel', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function unpin_artikel($id){
    $this->load->helper('form');

    $data = array(
      'artikel_status' => 1,
    );

    $this->db->where('id_artikel', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function insert_comment(){
    $id = $this->input->post('id_artikel');
    $sesdat = $this->whoami->sesdat();
    if(!isset($sesdat)){
    $data = array(
      'email'=>$this->input->post('email'),
      'nama'=>$this->input->post('nama'),
      'artikel_id'=>$id,
      'comment_post'=>$this->input->post('komentar'),
      );
    }else{
      $data = array(
      'artikel_id'=>$id,
      'comment_post'=>$this->input->post('komentar'),
      );
    }
    //$data['artikel_id']=$id;
    //$data['comment_post']=$this->input->post('comment');
    $this->db->insert('ig_artikel_comment',$data);
  }

  public function get_komentar($id){
    $this->db->select('*');
    $this->db->from('ig_artikel_comment');
    $this->db->where('artikel_id',$id);
    $query = $this->db->get('');
    $data = $query->result_array();
    //print_r($data);
    return $query->result_array();
  }

  public function jml_komen(){
    //$this->db->select('artikel_id, COUNT(artikel_id) as jml_komen');
    //$query = SELECT COUNT(artikel_id) FROM `ig_artikel_comment` WHERE artikel_id = 18;
    $query = $this->db->get('ig_artikel_comment');
    return $query->result_array();
  }

  public function get_artikel_popular($slug = FALSE){

    if($slug === FALSE){
      //SELECT *, COUNT(DISTINCT id_comment) as jumlah  FROM ig_artikel_comment JOIN ig_artikel ON ig_artikel_comment.artikel_id = ig_artikel.id_artikel GROUP BY artikel_id ORDER BY jumlah DESC
      //$query = $this->db->get('ig_artikel');
      //return $query->result_array();
      // $this->db->select('*');
      // $this->db->from('blogs');
      // $this->db->join('comments', 'comments.id = blogs.id');
      $this->db->select('*, COUNT(DISTINCT id_comment) as jumlah');
      $this->db->from('ig_artikel_comment');
      $this->db->join('ig_artikel', 'ig_artikel_comment.artikel_id = ig_artikel.id_artikel');
      $this->db->group_by('artikel_id');
      $this->db->order_by('jumlah', 'DESC');
      //$query = $this->db->get('ig_artikel_comment');
      //$query = $this->db->get('ig_artikel');
      //$this->db->join('ig_artikel', 'ig_artikel_comment');
      //$query = $this->db->get(array('ig_artikel', 'ig_artikel_comment'));
      $query = $this->db->get('');
      return $query->result_array();

      // $this->db->select('*');
      // $this->db->distinct('artikel_id');
      // $this->db->from('ig_artikel_comment');
      // $this->db->join('judul', 'judul.Business_Id = business_mapping.Business_Id');
      // $this->db->join('category_master', 'category_master.Category_Id = business_mapping.Category_Id');
      // $query = $this->db->get();
      // return $query->result();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

  }

}
?>
