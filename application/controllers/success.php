<?php defined('BASEPATH') OR exit('No direct script access allowed');class Success extends MY_Controller {
	public function __construct()
	{		parent::__construct();		$this->load->model('frontend/authentication');	
	}
	public function index()
	{			$this->load->view('frontend/success');
	}}
?>