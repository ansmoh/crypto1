<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/buybitcoin');	
	}

	public function index()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$this->load->view('frontend/dashboard');
	}
	
	public function transaction()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$this->load->view('frontend/transaction');
	}
	
	
	public function account_deactivate()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$this->load->view('frontend/account_deactivate');
	}
	
	public function payment_method()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$this->load->view('frontend/payment_method');
	}


	public function document_isverified()
	{
		$this->buybitcoin->check_isverified();
	}


}

?>