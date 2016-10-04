<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Emailverify extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/authentication');	
	}

	public function index()
	{	
		$emailtoken = $this->input->get('token', TRUE);
		$user_id = $this->input->get('code', TRUE);
		$data['EMAIL'] = $this->authentication->Email_Verify($emailtoken,$user_id);
		$size = count($data['EMAIL']);		
		if($size > 0) 
		{		
			$current_time = unix_to_human(time(), TRUE, 'us');
			if($current_time > $data['EMAIL']['email_expiry'])
			{
				$this->load->view('frontend/session_expired');
			}
			else 
            {
				$data = $this->authentication->Email_Success($user_id);
				if($data == "success")
				{
					$this->load->view('frontend/success');
				}
				else
				{
					$this->load->view('frontend/session_expired');
				}
			}
		}		 	
		
	}
}
?>