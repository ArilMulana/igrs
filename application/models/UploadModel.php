<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UploadModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','session');
        $this->load->library('Upload_img');
        $this->load->library('Whoami');
        $this->_init();
    }

    private function _init(){

    }

    function upload_artikel_img($images){
        $data = array(
                    'cover'=>$images['file_name'],
                    'judul'=>$this->input->post('judul'),
                    'slug'=>url_title(strtolower($this->input->post('judul'))),
                    'isi'=>$this->input->post('isi'),
                    'artikel_kategori'=>$this->input->post('cat'),
                    'artikel_status'=>0, //no publish
        );
         if($this->session->userdata('logged_in')['role'] == "6"){
            $data['artikel_contributor'] = $this->session->userdata('logged_in')['id_contri'];
          }else{
            $data['artikel_admin'] = $this->session->userdata('logged_in')['id'];
          }

        return $data;
    }

    function update_artikel_img($images){
        $data = array(
            'cover'=>$images['file_name'],
            'judul'=>$this->input->post('judul'),
            'slug'=>url_title(strtolower($this->input->post('judul'))),
            'isi'=>$this->input->post('isi'),
            'kategori_artikel'=>$this->input->post('cat'),
        );
        if($this->session->userdata('logged_in')['role'] == "6"){
            $data['artikel_contributor'] = $this->session->userdata('logged_in')['id_contri'];
          }else{
            $data['artikel_admin'] = $this->session->userdata('logged_in')['id'];
          }

        return $data;

    }

    // function upload_profil_img(){

    // }

}
?>
