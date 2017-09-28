<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArtikelModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('whoami','upload_img','encrypt'));
        $this->load->model('UserModel');
        //$this->_init();
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

  public function set_artikel(){
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
    }

    //artikel contributor

    public function my_artikel($id,$role){
      $this->db->select('artikel_id,cover,judul,isi,artikel_admin,artikel_contributor,artikel_status,comment_time,count(artikel_id) as total_comment');
      $this->db->from('ig_artikel_comment');
      $this->db->join('ig_artikel','id_artikel = artikel_id');
      if($role < "6"){
         $this->db->join('ig_userigrs','no = artikel_admin');
         $this->db->group_by('artikel_id');
        $this->db->where('artikel_admin',$id);
        //echo "<script>alert('admin')</script>";
      }else if($role = "6"){
        $this->db->join('ig_contributor','id_contributor = artikel_contributor');
        $this->db->group_by('artikel_id');
        $this->db->where('artikel_contributor',$id);
        //$query = $this->db->get('');
        //echo "<script>alert('contributor')</script>";
      }else{
        show_404();
      }
      $query = $this->db->get('');
      $data = $query->result_array();
      //print_r($data);
      return $query->result_array();
    }

    public function data_artikel($id_artikel,$sesdat){
      //$sesdat = $this->whoami->id_me($this->whoami->sesdat());
      //print_r($sesdat);
      if($sesdat['my_role'] != '7'){
        if($sesdat['my_role'] <'6' | $sesdat['my_role'] == '6'){
          $this->db->where('id_artikel',$id_artikel);
          if($sesdat['my_role'] <'6'){ //admin
             $this->db->where('artikel_admin',$sesdat['id']);
          }else{ //contributor
            $this->db->where('artikel_contributor',$sesdat['id']);
          }
          $query = $this->db->get('ig_artikel');
          $data = $query->row_array();
          if(isset($data)){
            //print_r($data);
            return $data;
          }else{
            show_404();
          }
        }
      }
    }
   

    
}
?>
