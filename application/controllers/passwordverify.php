<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Passwordverify extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/authentication');	
	}

	public function index()
	{	
		//$this->load->view('frontend/passwordRecovery');
		$passtoken = $this->input->get('token', TRUE);
		$user_id = $this->input->get('code', TRUE);
		$data['Pass'] = $this->authentication->password_Verify($passtoken,$user_id);
		$size = count($data['Pass']);		
		if($size > 0) 
		{		
			$current_time = unix_to_human(time(), TRUE, 'us');
			if($current_time > $data['Pass']['password_expiry'])
			{
				$this->load->view('frontend/session_expired');
			}
			else 
            {
				$this->load->view('frontend/passwordRecovery');
			}
		}	
		
	}
}
?>