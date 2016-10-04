<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('path');
	}

	public function index()
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['msg'];
		
		if($name != "" && $email != "" && $subject != ""){
			$config = Array(
					  'protocol' => 'mail',
					  'smtp_host' => '',
					  'smtp_port' => 25,
					  'smtp_user' => '', 
					  'smtp_pass' => '', 
					  'mailtype' => 'html',
					  'charset' => 'iso-8859-1',
					  'wordwrap' => TRUE
					);
			
			$contact_message = '<p><b>Name:</b> '. $name .'<br/></p>
			<p><b>Query:</b> '. $message .'<br/></p>';
																	
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from($email, 'smilesworld14');
			$this->email->to('ezacctverify@gmail.com');
			$this->email->subject($subject);
			$this->email->message($contact_message);
														
			if($this->email->send()) {
				$data['ms'] = 'Thanks for contacting us!';		
			} 
			$this->load->view('home',$data);
		}	
	}
	

}

?>