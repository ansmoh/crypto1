<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ViewPages extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->helper('path');
		$this->load->helper('url');
		$this->load->model('admin/manage_page');
		$this->load->model('frontend/authentication');
		$this->load->library('session');
	}

	public function index()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('admin'));
		}
		$data['pages'] = $this->manage_page->view_page_detail();
		$this->load->view('admin/all_pages', $data);
	}  

	public function editPage(){
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('admin'));
		}	
		$pageid = $this->input->get('page_id', TRUE); 
		$sessionData = array('page_id' => $pageid); 
		$this->session->set_userdata($sessionData);
		$data['editData'] = $this->manage_page->edit_data($pageid);
		$data['pages'] = $this->manage_page->page_name();
		$this->load->view('admin/editPage', $data);
	} 
	
	public function updatedata(){
		$title = $this->input->post('title');
		$pname = $this->input->post('pname');
		$name = $this->input->post('pagename');
		$pagenameid = $this->input->post('pagenameid');
		$content = $this->input->post('content');
		$pageid = $this->session->userdata('page_id'); 	
		$currenttim = time();                                                                                    
		$currenttime = unix_to_human($currenttim, TRUE, 'us');
		if($pname == ""){
			$data = array(  'page_title' => $title, 
							'page_content' => $content,
							'updated_on' => $currenttime,
							'page_name_id' => $pagenameid);   
			$this->db->where('page_id', $pageid);
			$pageupdate= $this->db->update('tbl_page', $data);
			if($pageupdate){
			
				redirect(base_url('admin/viewPages'));
			} else {
			
				redirect(base_url('admin/viewPages/editPage'));
			}
		} else {
			$data = array(  'page_title' => $title, 
							'page_content' => $content,
							'updated_on' => $currenttime);   
			$this->db->where('page_id', $pageid);
			$pageupdate= $this->db->update('tbl_page', $data);
			if($pageupdate){			
				redirect(base_url('admin/viewPages'));
			} else {			
				redirect(base_url('admin/viewPages/editPage'));
			}
		}
	} 
	
	public function deletePage(){
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('admin'));
		}	
		$data['pageid'] = $this->input->get('page_id', TRUE); 
		$this->load->view('admin/deletePage', $data);
	}
	
	public function deleteData(){
		$page_id = $this->input->post('pageid');	
		$data = array('page_id'=>$page_id);
		$response = $this->db->delete('tbl_page', $data);
		if($response){
			redirect(base_url('admin/viewPages'));
		} else {
			redirect(base_url('admin/viewPages/deletePage'));
		}
	}
}
?>