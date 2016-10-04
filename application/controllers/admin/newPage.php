<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class newPage extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('path');
		$this->load->model('frontend/authentication');
		$this->load->model('admin/manage_page');
	}

	public function index()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('admin'));
		}		
        $data['pages'] = $this->manage_page->page_name();
		$this->load->view('admin/new_page',$data);
	}  

	public function addpage()
	{	
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('admin'));
		}	
        $title = $this->input->post('title');
		$name = $this->input->post('pagename');
		$pageid = $this->input->post('pageid');
		$content = $this->input->post('content');
		$currenttim = time();                                                                                    
		$currenttime = unix_to_human($currenttim, TRUE, 'us');
		$pid = $this->manage_page->page_name_check($pageid);
		if($pid > 0)
		{	
			$data = array('page_title' => $title, 
						'page_content' => $content,
						'page_author' => $this->session->userdata('username'),
						'updated_on' => $currenttime);   
			$this->db->where('page_name_id', $pageid);
			$pageupdate= $this->db->update('tbl_page', $data);
			if($pageupdate){
				redirect(base_url('admin/viewPages'));
			}
		} else {
			$data['page'] = array('page_title' => $title,
								'page_content' => $content,
								'page_author' => $this->session->userdata('username'),
								'page_name_id' => $pageid,
								'is_active' => 1,									  
								'created_on' => $currenttime,
								'updated_on' => $currenttime,
								'deleted_on' => $currenttime
							);
			$page = $this->manage_page->add_page($data);
			if($page)
			{	
				redirect(base_url('admin/viewPages'));
			}
		}
	}
}

?>