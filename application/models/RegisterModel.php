<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterModel extends CI_Model {

    function __construct()
    {
        $this->load->library('encrypt');
        parent::__construct();
    }

    private function exp_confirm(){
        $get_time = date('Y-m-d H:i:s');
        $time_regist = $get_time;
        $exp_conf = date('Y-m-d H:i:s',strtotime("+1 day",strtotime($time_regist)));   
        return $exp_conf;
    }

    private function check_email($email,$role){
        $this->db->where('email',$email);
        $this->db->where('konfirmasi','1');
        if($role == "7"){ // pengembang
            $this->db->limit(1);
            $query = $this->db->get('ig_pengembang');
            if($query->num_rows() == 1){
                return false;
            }else{
                return true;
            }
        }
        if($role == '6'){
            $this->db->limit(1);
            $query = $this->db->get('ig_contributor');
            if($query->num_rows() == 1){
                return false;
            }else{
                return true;
            }
        }
    }


    public function register(){
        //$now = date('Y-m-d H:i:s');
        $exp_conf = $this->exp_confirm();
        $choice_role = $this->input->post('role');

        if($choice_role != NULL){
            if($choice_role == "7"){ //pengembang
                $data = array(
                    'nama_pemilik'=>$this->input->post('name'),
                    'password'=>md5($this->input->post('password')),
                    'email'=>$this->input->post('email'),
                    'no_telp'=>$this->input->post('telepon'),
                    'role'=>$choice_role,
                    'waktu_exp_aktivasi'=>$exp_conf,
                    'konfirmasi'=>0,
                );
                    if($this->check_email($data['email'],$choice_role)){
                        $this->db->insert('ig_pengembang',$data);
                        $last_id = $this->db->insert_id();
                        return $last_id;
                    }else{
                        echo "<script>
                        alert('Email anda telah terdaftar, Silahkan Gunakan Email Lain ');
                      window.location.href='".base_url()."register';
                      </script>";
                    }
                    
               
            }
            if($choice_role == "6"){
                    $data = array(
                        'nama_contributor'=>$this->input->post('name'),
                        'password'=>md5($this->input->post('password')),
                        'email'=>$this->input->post('email'),
                        'no_telp'=>$this->input->post('telepon'),
                        'role'=>$choice_role,
                        'waktu_exp_aktivasi'=>$exp_conf,
                        'konfirmasi'=>0,
                    );
                    if($this->check_email($data['email'],$choice_role)){
                        $this->db->insert('ig_contributor',$data);
                        $last_id = $this->db->insert_id();
                        return $last_id; 
                    }else{
                        echo "<script>
                        alert('Email anda telah terdaftar, Silahkan Gunakan Email Lain ');
                      window.location.href='".base_url()."register';
                      </script>";
                    }
                    
            }
        }else{

        }
    }


    public function verif_acc($id){
        //echo $id;
        $now = date('Y-m-d H:i:s');
        $this->db->where('id_contributor',$id);
        $query = $this->db->get('ig_contributor');
        $data = $query->result_array();
        $exp_confirm_date = $data[0]['waktu_exp_aktivasi'];
        //$get_expdate = $this->exp_confirm($old_expdate);
        $status_confirm = $data[0]['konfirmasi'];
        //echo $get_expdate;
        if($now < $exp_confirm_date ){
            if($status_confirm !='1'){// belom konfirmasi email
                $data = array(
                    'konfirmasi'=>'1',
                    'waktu_exp_aktivasi'=>'0000-00-00 00:00:00',
                );
                //return $data;
                $this->db->where('id_contributor',$id);
                $this->db->update('ig_contributor',$data);
            }else{
                echo "<script>
                  alert('Anda Telah Melakukan Konfirmasi Email, Silahkan Login');
                  window.location.href='".base_url()."login';
                  </script>";
            }   
        }else{
            if($status_confirm !='1'){
                 echo "<script>
                  alert('Waktu Konfirmasi Akun Anda Telah Usai, Silahkan registrasi ulang');
                  window.location.href='".base_url()."register';
                  </script>";
              }else{
                 echo "<script>
                  alert('Anda Telah Melakukan Konfirmasi Email, Silahkan Login');
                  window.location.href='".base_url()."login';
                  </script>";
              }
           
        }
    }



}
?>