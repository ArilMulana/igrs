<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArtikelModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('Whoami','Upload_img','encrypt'));
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

    $query = $this->db->get_where('ig_artikel', array('id_artikel' => $id));
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



    //artikel contributor
    public function artikel_saya(){
      $sesdat= $this->whoami->get_role_id();
      $this->db->select('*');
      $this->db->from('ig_artikel');
      $this->db->where('artikel_contributor',$sesdat['id']);
      $this->db->order_by('artikel_time','desc');
      $query = $this->db->get();
      return $query->result_array();
    }

    public function pagination_article($limit,$page){
      $sesdat= $this->whoami->get_role_id();
      $this->db->select('*');
      $this->db->from('ig_artikel');
      $this->db->where('artikel_contributor',$sesdat['id']);
      $this->db->limit($limit,$page);
      $this->db->order_by('artikel_time','desc');
      $query = $this->db->get('');
      return $query->result_array();
      //$query = $this->db->get();
    }


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
   
  //  public function get_komentar($id){
  //   $this->db->select('*');
  //   $this->db->from('ig_artikel_comment');
  //   $this->db->where('artikel_id',$id);
  //   $query = $this->db->get('');
  //   $data = $query->result_array();
  //   //print_r($data);
  //   return $query->result_array();
  // }

  public function jml_komen(){
    //$this->db->select('artikel_id, COUNT(artikel_id) as jml_komen');
    //$query = SELECT COUNT(artikel_id) FROM `ig_artikel_comment` WHERE artikel_id = 18;
    $query = $this->db->get('ig_artikel_comment');
    return $query->result_array();
  }

  public function get_artikel_popular($slug = FALSE){

    if($slug === FALSE){
      //SELECT *, COUNT(DISTINCT id_comment) as jumlah  FROM ig_artikel_comment JOIN ig_artikel ON ig_artikel_comment.artikel_id = ig_artikel.id_artikel GROUP BY artikel_id ORDER BY jumlah DESC
      //SELECT *, COUNT(id_artikel) as jumlah FROM ig_artikel LEFT JOIN ig_artikel_comment ON ig_artikel.id_artikel = ig_artikel_comment.artikel_id GROUP BY id_artikel ORDER BY jumlah DESC

      //$query = $this->db->get('ig_artikel');
      //return $query->result_array();
      // $this->db->select('*');
      // $this->db->from('blogs');
      // $this->db->join('comments', 'comments.id = blogs.id');

      $this->db->select('*, COUNT(id_artikel) as jumlah');
      $this->db->from('ig_artikel');
      $this->db->join('ig_artikel_comment', 'ig_artikel.id_artikel = ig_artikel_comment.artikel_id', 'left');
      $this->db->group_by('id_artikel');
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
  
  public function get_artikel_related($kategori, $id){

      //SELECT * FROM `ig_artikel` ORDER BY FIELD(artikel_kategori, "edukasi") DESC
      //$this->db->order_by('FIELD(artikel_kategori, edukasi)');
      //$this -> db -> order_by('FIELD ( products.country_id, 2, 0, 1 )');
      //$query = $this->db->('ig_artikel');
      $query = $this->db->query("SELECT * FROM ig_artikel WHERE id_artikel != $id ORDER BY FIELD(artikel_kategori, '$kategori') DESC, artikel_time DESC");
      return $query->result_array();

  }

  public function kategori($slug = FALSE){

    if($slug === FALSE){
      //SELECT *, COUNT(artikel_kategori) as jumlah  FROM ig_artikel GROUP BY artikel_kategori
      $this->db->select('*, COUNT(artikel_kategori) as jumlah');
      //$this->db->from('ig_artikel');
      $this->db->group_by('artikel_kategori');
      $query = $this->db->get('ig_artikel');
      return $query->result_array();
    }
    $query = $this->db->get_where('ig_artikel', array('slug' => $slug));
    return $query->row_array();
  }

  public function update_artikel_con($id,$data){
    $this->db->where('id_artikel',$id);
    return $this->db->update('ig_artikel',$data);
  }

  public function get_search_artikel($key){
      $this->db->where('isi',$key);
      $query = $this->db->get('ig_artikel');
      if($query->num_rows() > 0){
        return $query->result_array();
      }else{
        return false;
      }
  }
  public function search_keyword($key){
      $this->db->where('isi',$key);
      $get_artikel_search = $this->db->get('ig_artikel');
      $this->db->where('deskripsi',$key);
      $get_direktori_search = $this->db->get('ig_apps');
      //if($get_artikel_search)
  }

}
?>
