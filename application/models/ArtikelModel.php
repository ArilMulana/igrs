<?php /**
* 
*/
class ArtikelModel extends CI_Model
{
	var $artikel = 'ig_artikel';
	
	public function __construct()
	{
		parent::__construct();
	}

	function create_artikel($data)
    {
       $this->db->insert($this->artikel, $data);
       return TRUE;
    }
}