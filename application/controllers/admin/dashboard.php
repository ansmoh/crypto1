<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('path');
		$this->load->model('frontend/buybitcoin');
		$this->load->model('frontend/authentication');
	}

	public function index()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('admin'));
		}
		$this->load->view('admin/dashboard');
	}            
}

?>