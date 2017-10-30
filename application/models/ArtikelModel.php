<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArtikelModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('whoami');
    }
	function create_artikel($data)
    {
        //entah kenapa $this->input->postnya kgk ngambil yg dari view tolong benerin dong yog
       return $this->db->insert('ig_artikel', $data);
     
    }

    public function get_artikel($slug = FALSE){

    if($slug === FALSE){
      $query = $this->db->get('ig_artikel');
      return $query->result_array();
    }

    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();

    }

  public function get_artikel_id($id = FALSE){

    $query = $this->db->get_where('ig_artikel', array('id' => $id));
    return $query->row_array();

  }

  public function set_artikel($data){
    $this->load->helper('url');

    $slug = url_title($this->input->post('judul'), 'dash', TRUE);

    $data = array(
      'judul' => $this->input->post('judul'),
      'isi' => $this->input->post('isi'),
      'artikel_status' => $this->input->post('artikel_status'),
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
      'artikel_status' => $this->input->post('artikel_status'),
      'slug' => $slug
    );

    $this->db->where('id', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function delete_artikel($id){
    return $this->db->delete('ig_artikel', array('id' => $id));
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

    $this->db->where('id', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function pinpost_artikel($id){
    $this->load->helper('form');

    $data = array(
      'artikel_status' => 2,
    );

    $this->db->where('id', $id);
    return $this->db->update('ig_artikel', $data);
  }

  public function unpin_artikel($id){
    $this->load->helper('form');

    $data = array(
      'artikel_status' => 1,
    );

    $this->db->where('id', $id);
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
    // $query = $this->db->get_where('ig_artikel_comment', array('artikel_id' => $id));
    // return $query->row_array();
    // $this->db->where('artikel_id',$id);
    // $query = $this->db->get('ig_artikel_comment');
    // return $query->result_array();
    }

}
?>
