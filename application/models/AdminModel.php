<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }
	function login($username,$password)
    {
		$this->db->where("username",$username);
        $this->db->where("password",$password);
        $query=$this->db->get("account");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'id_account' 		=> $rows->id_account,
                    	'user_name' 	=> $rows->username,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;
		}
		return false;
    }

	function adminlogin($username,$password)
    {
		$this->db->where("username",$username);
        $this->db->where("password",$password);

        $query=$this->db->get("usr_admin");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'id_account' 		=> $rows->id,
                    	'is_admin' 	=> $rows->username,
	                    'adminlogged_in' 	=> TRUE
                   );
			}
            	$this->session->set_userdata($newdata);
                return true;
		}
		return false;
    }

	function cekUsername($username) {
		$this->db->select('username');
		$query = $this->db->get_where('account', array('username' => $username));
		if($query->num_rows()>0) {
			return true;
		} else {
			return false;
		}
	}

}
?>
