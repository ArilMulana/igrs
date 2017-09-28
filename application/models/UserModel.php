<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }


    //name_role

    public function spc_role($id){
        $this->db->where('id',$id);
        $query = $this->db->get('ig_role');
        return $query->result_array();
    }



}
?>