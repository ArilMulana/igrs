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
        $now = date('Y-m-d H:i:s');
        $exp_conf = date('Y-m-d H:i:s',strtotime("+1 day",strtotime($now)));
        $choice_role = $this->input->post('role');
        if($choice_role != NULL){
            if($choice_role == "7"){
                $data = array(
                    'nama_pemilik'=>$this->input->post('name'),
                    'password'=>md5($this->input->post('password')),
                    'email'=>$this->input->post('email'),
                    'no_telp'=>$this->input->post('telepon'),
                    'role'=>$choice_role,
                    'waktu_exp_aktivasi'=>$exp_conf,
                );
                $this->db->insert('ig_pengembang',$data);
                $last_id = $this->db->insert_id();
                return $last_id;
            }
            if($choice_role == "6"){
                    $data = array(
                        'nama_contributor'=>$this->input->post('name'),
                        'password'=>md5($this->input->post('password')),
                        'email'=>$this->input->post('email'),
                        'no_telp'=>$this->input->post('telepon'),
                        'role'=>$choice_role,
                        'waktu_exp_aktivasi'=>$exp_conf,
                    );
                    $this->db->insert('ig_contributor',$data);
                    $last_id = $this->db->insert_id();
                    return $last_id;
            }
        }else{

        }
    }


    public function verif_acc($id){
        //echo $id;
        $this->db->where('id_contributor',$id);
        $query = $this->db->get('ig_contributor');
        $data = $query->result_array();
        $old_expdate = $data[0]['waktu_exp_aktivasi'];
        if($old_expdate != '0000-00-00 00:00:00'){
            $data = array(
                'konfirmasi'=>'1',
                'waktu_exp_aktivasi'=>'0000-00-00',
            );
            $this->db->where('id_contributor',$id);
            $this->db->update('ig_contributor',$data);
        }
        //if($old_conf !)

    }



}
?>