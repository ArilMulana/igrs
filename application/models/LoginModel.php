<?php
/**
 * Description of User_igrs
 *
 * @author UNJ_Ilkom2014
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {


    function __construct()
    {
        parent::__construct();
    }

    function login($email,$pass){
        
        $acc_stat = "1"; //user yg telah terverifikasi
      
        $this->db->join('ig_role','id = role');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $this->db->limit(1);
        $admin = $this->db->get('ig_userigrs'); //admin
        $this->db->join('ig_role','id = role');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $this->db->where('konfirmasi',$acc_stat);
        $this->db->limit(1);
        $pengembang = $this->db->get('ig_pengembang'); //develop
        $this->db->join('ig_role','id = role');
        $this->db->where('email',$email);
        $this->db->where('password',md5($pass));
        $this->db->where('konfirmasi',$acc_stat);
        $this->db->limit(1);
        $contributor = $this->db->get('ig_contributor'); //contributor
        if($admin -> num_rows() == 1){
            return $admin->result();
        }else if($pengembang ->num_rows() == 1){
            return $pengembang->result();
        }else if($contributor ->num_rows() == 1){
            return $contributor->result();
        }else{
            return false;
        }
    }
}
?>