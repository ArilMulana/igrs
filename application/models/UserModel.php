<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    function __construct()
    {
        $this->load->library('encrypt');
        parent::__construct();
    }


    //name_role

    public function spc_role($id){
        $this->db->where('id',$id);
        $query = $this->db->get('ig_role');
        return $query->result_array();
    }

    public function edit_profil ($data){

        $this->db->where('id_contributor',$this->session->userdata('logged_in')['id_contri']);
        $this->db->update('ig_contributor',$data);
    }

    public function register(){
        $choice_role = $this->input->post('role');
        if($choice_role == "6"){
            $data = array(
                'nama_contributor'=>$this->input->post('name'),
                'password'=>md5($this->input->post('password')),
                'email'=>$this->input->post('email'),
                'no_telp'=>$this->input->post('telepon'),
                'role'=>$choice_role,
            );
            $this->db->insert('ig_contributor',$data);
        }else{

        }
    }



}
?>