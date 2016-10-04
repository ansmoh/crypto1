<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Manage_page extends CI_Model{

	public function __construct(){
		parent::__construct(); 
		$this->load->helper('url');
	}
	
	public function page_name(){
		$query = $this->db->get('tbl_page_name');
		return $query->result();
	}
	
	public function add_page($data){
		$this->db->insert('tbl_page',$data['page']);
		return $this->db->insert_id();	
	}
	
	public function page_content(){
		$url = current_url();
		$this->db->select(array('p.page_content'));
		$this->db->from('tbl_page p');
		$this->db->join('tbl_page_name pg', 'pg.page_name_id = p.page_name_id', 'left');
		$this->db->where('pg.page_url', $url);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function page_url(){
		$url = current_url();
		$this->db->select(array('pg.page_url' ));
		$this->db->from('tbl_page p');
		$this->db->join('tbl_page_name pg', 'pg.page_name_id = p.page_name_id', 'left');
		$this->db->where('pg.page_url', $url);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
	
	public function page_name_check($pid)
	{
		$q = $this->db->get_where('tbl_page', array('page_name_id'=>$pid) );
		return $q->num_rows();
	}
	
	public function view_page_detail()
	{
		$query = $this->db->get('tbl_page');
		return $query->result();
	}
	
	public function fetch_users(){		
		$query = $this->db->get('tbl_user'); 
		return $query->result();
	}
	
	public function edit_data($pageid){
		$this->db->select(array('p.*', 'pg.*' ));
		$this->db->from('tbl_page p');
		$this->db->join('tbl_page_name pg', 'pg.page_name_id = p.page_name_id', 'left');
		$this->db->where('p.page_id', $pageid);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result(); 
	}
}
?>