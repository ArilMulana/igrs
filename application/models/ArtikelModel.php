<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ArtikelModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	function create_artikel()
    {
        //entah kenapa $this->input->postnya kgk ngambil yg dari view tolong benerin dong yog
       $data = array(
        'cover'=>'',
        'judul'=>$this->input->post('judul'),
        'slug'=>url_title(strtolower($this->input->post('judul'))),
        'isi'=>$this->input->post('isi'),
        'referensi_1'=>$this->input->post('refer'),
        'artikel_by'=>$this->session->userdata('logged_in')['id'],
        'artikel_status'=>1,
        );
       $this->db->insert('ig_artikel',$data);
    }


}
?>
