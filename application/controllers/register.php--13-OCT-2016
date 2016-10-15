<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/authentication');	
	}

	public function index()
	{	
		
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules(
	        'email', 'Email','required|valid_email|is_unique[tbl_user.email]',
	        array(
					'required' => 'You have not provided %s.',
					'is_unique' => '%s already exists.'
	        )
		);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[12]');
			
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/signup');
		} 
		else 
		{
			$this->load->view('frontend/signup');
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$email_token = "";
			$expire_email = "";
			
			try{
				$len = 10;
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$random_code = '';
				$random_code = substr(str_shuffle(str_repeat($chars, ceil($len/strlen($chars)) )),1,$len);
				$email_token = $random_code;
			}catch(Exception $e){
				echo "error";
			}

			// email expiry
			$current = time() + 3600;                                                                                    
			$expire_email = unix_to_human($current, TRUE, 'us');

			// Current time 
			$currenttime = time();                                                                                    
			$currenttime = unix_to_human($currenttime, TRUE, 'us');
		
			// Email Check
			$user_check = $this->authentication->email_check($email);
			if($user_check > 0)
			{
				$this->data['e_msg'] = "Email already exist";
			}
			else 
			{
				// Insert data 
				$data['user'] = array('email' => $this->input->post('email'),
									  'password' => md5($this->input->post('password')),
									  'username' => $this->input->post('username'),
 									  'user_role_id' => 2,
									  'is_active' => 1,									  
									  'email_isverified' => 1,									  
									  'email_token' => $email_token,
									  'email_expiry' => $expire_email,
									  'created_on' => $currenttime,
									  'updated_on' => $currenttime,
									  'deleted_on' => $currenttime
								  	);

				$user_id = $this->authentication->register($data);			  		

				if($user_id)
				{					
           		    $message = '<p>Dear Member,<br/><br/>Welcome and thank you for joining ezBtc. As you&#39;ve noticed we are still working on the site, if you&#39;d like to buy or sell bitcoin, please contact us by phone, email or live chat. Manual verification is temporarily in process. </p><p> To verify your Email ID: <a href="' . base_url() . 'emailverify?code='.$user_id.'&token='.$email_token . '" target="_blank">Click Here</a></p><br/><br/><br/><p><a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a></p>';

					$email_response = send_generic_email(array(
                            								'to' => $email,
                            								'subject' => "Email Verification",
                            								'message' => $message));
					$msg = '<p>Hello Admin,<br/><br/> A new user has been registered.<br/><br/>Email ID: '. $email .'<br/><br/>Username: '. $username .'</p><br/><br/><p><a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a>';

					$email_resp = send_generic_email(array(
                            								'to' => "ezacctverify@gmail.com",
                            								'subject' => "New Contact",
															'message' => $msg));
					if($email_response && $email_resp)
					{
						redirect(base_url('register/emailverify'));
				    }
					else
					{
						echo "Please try again";
			        }		
				}
				
			}
		}
		
	}

    public function emailverify()
	{
		$this->load->view('frontend/email_verification');
    }

	public function smsverification()
	{
		$otp = $this->input->post('otp');
		$data['OTP'] = $this->authentication->OTP_Token($otp);

		$size = count($data['OTP']);
		$this->form_validation->set_rules('otp', 'OTP', 'required|regex_match[/^[0-9]{4}$/]');
		$user_id = $this->session->userdata('userid');
		if ($this->form_validation->run() == TRUE) {
			if($size > 0) 
			{		
				$current_time = unix_to_human(time(), TRUE, 'us');
				if($current_time > $data['OTP']['otp_expiry'])
				{
					echo  "Your time has expired";
					$this->session->set_flashdata('time_expiry','Your time has expired');
					$exp = $this->session->flashdata('time_expiry');
					if(isset($exp)) {
						echo $exp;
					} else {
						echo 'not session';
					}
				} else {
					redirect(base_url('success'));
				}
			} else {
				$this->session->set_flashdata('wrong_otp','You enter wrong OTP');
				$exp = $this->session->flashdata('wrong_otp');
				if(isset($exp)) {
					echo $exp;
				} else {
					echo 'not session';
				}
				echo 'You enter wrong OTP';
			}
		} else {
			echo validation_errors();
		}	
		$this->load->view('frontend/otp');
	}

	public function regenerate_otp_token()
	{
		$regnerateToken	= $this->authentication->regenrate_otp();
		echo $regnerateToken;
	}
}
?>