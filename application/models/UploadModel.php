<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UploadModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation','session');
        $this->load->library('upload');
        $this->load->library('whoami');
        $this->_init();
    }

    private function _init(){

    }

    function upload_data(){
        $role != "7";
        $images = $this->upload->data();
        $data = array(
                    'cover'=>$images['file_name'],
                    'judul'=>$this->input->post('judul'),
                    'slug'=>url_title(strtolower($this->input->post('judul'))),
                    'isi'=>$this->input->post('isi'),
                    'artikel_status'=>0, //no publish
        );
        //if() beloman

    }

}
?>
