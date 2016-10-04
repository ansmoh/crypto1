<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Buybitcoin extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function check_isverified()	
	{		
	$cid = $this->session->userdata('userid');		
	$this->db->select('document_isverified'); 		
	$q = $this->db->get_where('tbl_user_details' ,array('user_id'=> $cid));		
	$result = $q->num_rows();
		if($result == 1) {			
			echo $result;			
			echo "====1===";		
		} else {			
			echo "=======0===";			
			echo $result;		
		}
	}
	
	public function bitcoins()	
	{		
		$cid = $this->session->userdata('userid');		
		$this->db->select('bitcoins'); 		
		$this->db->from('tbl_user_bitcoins');
		$this->db->where(array('user_id' => $cid));
		$this->db->limit(1);
		$query = $this->db->get();
		
		return $query->row_array();	
	}
}
?>