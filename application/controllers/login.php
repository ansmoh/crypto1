<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/authentication');
		$this->load->helper('email');
		$this->load->helper('block_io');
	}

	public function index()
	{
		$this->load->view('frontend/signin');
	}

	public function register()
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
		$this->form_validation->set_rules('confirmation', 'Password Confirmation', 'required|matches[password]|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('mob', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]|is_unique[tbl_user_details.phone]');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('frontend/signup');
		} 
		else 
		{
			$password = $this->input->post('password');
			$confirmation =	$this->input->post('confirmation');
			$email = $this->input->post('email');
			$phone = $this->input->post('mob');
			$otp = $this->input->post('otp');
			$expire = $this->input->post('otp_expire');

			/* random code */
			$length = 5;
			$chars = "1234567890";
			$final_rand = '';
			for($i=1;$i<$length; $i++)
			{
				$final_rand .= $chars[ rand(0,strlen($chars)-1)];
			}
			$otp = $final_rand;

			/* otp expiry */
			$now = time() + (60*5);                                                                                    ;
			$expire = unix_to_human($now, TRUE, 'us');

			/* Email Check */
			$user_check = $this->authentication->email_check($email);
			if($user_check > 0)
			{
				$this->data['e_msg'] = "Email already exist";
			}
			else if($password != $confirmation)
			{
				$this->data['e_msg'] = "password doesn't match";
			} 
			else 
			{
				/* Insert data */
				$data['detail'] = array('phone'=> ucwords(strtolower($this->input->post('mob'))));
				$data['user'] = array('email' => $this->input->post('email'),
									  'password' => md5($this->input->post('password')),
 									  'user_role_id' => 2,
									  'is_active' => 1,
									  'otp_token' => $otp,
									  'otp_expiry' => $expire,
								  	);

				$user_id = $this->authentication->register($data);	

				if($user_id)
				{
					$OtpToken = $data['user']['otp_token'];
					$TokenExpired = $data['user']['otp_expiry'];
					$userdata1 = array('userid' => $user_id, 'OTP' => $OtpToken, 'Expiry' => $TokenExpired);
					$this->session->set_userdata($userdata1);
					$session_user_id = $this->session->userdata('userid');
					redirect(base_url('auth/otp'));
				}
				
			}
		}
	}

	public function otp()
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
					redirect(base_url('auth/success'));
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

	public function success()
	{
		$this->load->view('frontend/success');
	}

	public function authentication()
	{
		$name =  $this->input->post('email_username');
		$check_email = valid_email($name);
		$blockIo = getBlockIoService();

		if($check_email){
			$data = array(	'u.email'=>  $this->input->post('email_username'),           
							'u.password'=>  md5($this->input->post('password')),
						);
			$result =  $this->authentication->login_user($data);

			if($result['check'] == 1)
			{
				$userdata = array('username'=> $result['user_data']['username'],'userid' => $result['user_data']['user_id'],'user_email' =>  $result['user_data']['email'], 'role' => $result['user_data']['user_role_id']);
				$this->session->set_userdata($userdata);
				$uid = $result['user_data']['user_id'];

				/* logged log */
				$c_uid = $this->input->post('uid');
				$logged = $this->input->post('logged_date');	
				$current_user_id = $this->session->userdata('userid');
				$c_uid = $current_user_id;                                                                                  
				$current_date = unix_to_human(time(), TRUE, 'us');
				$logged = $current_date;

				$log = array('user_id' => $c_uid,									 
							  'login_datetime' => $logged,
							);
				$this->authentication->login_log($log);

				/* last login */
				$this->authentication->last_login();
				$block_io_data = $blockIo->get_wallet_data($this->session->userdata('user_email'));
				$this->session->set_userdata($block_io_data);
				if($this->session->userdata('role') == 1){
					redirect(base_url('admin/dashboard'));
				} else {
					redirect(base_url('dashboard'));
				}
			} else {
				$data['error'] ="Email or Password is incorrect";
				$this->load->view('frontend/signin',$data);
			}
		} else {
			
			$data = array(	'u.username'=>  $this->input->post('email_username'),           
							'u.password'=>  md5($this->input->post('password')),
						);
			$result =  $this->authentication->login_username($data);

			if($result['check'] == 1) 
			{
				$userdata = array('username'=> $result['user_data']['username'],'userid' => $result['user_data']['user_id'],'user_email' =>  $result['user_data']['email'], 'role' => $result['user_data']['user_role_id']);
				$this->session->set_userdata($userdata);
				$uid = $result['user_data']['user_id'];

				/* logged log */
				$c_uid = $this->input->post('uid');
				$logged = $this->input->post('logged_date');	
				$current_user_id = $this->session->userdata('userid');
				$c_uid = $current_user_id;                                                                                  
				$current_date = unix_to_human(time(), TRUE, 'us');
				$logged = $current_date;

				$log = array('user_id' => $c_uid,									 
							  'login_datetime' => $logged,
							);
				$this->authentication->login_log($log);

				/* last login */
				$this->authentication->last_login();
				$block_io_data = $blockIo->get_wallet_data($this->session->userdata('user_email'));
				$this->session->set_userdata($block_io_data);
				if($this->session->userdata('role') == 1){
					redirect(base_url('admin/dashboard'));
				} else {				
					redirect(base_url('dashboard'));	
				}
			} else {
				$data['error'] ="Username or Password is incorrect";
				$this->load->view('frontend/signin',$data);
			}			
		}
	}
	
	public function forgetpassword()
	{
		$this->load->view('frontend/forgetpassword');
	}
	
	public function forget_password()
	{
		$data = array('u.email'=>  $this->input->post('email'));
		$result = $this->authentication->match_email($data);
		if($result['check'] == 1)
		{
			$userdata1 = array('userId' => $result['user_data']['user_id']);
			$this->session->set_userdata($userdata1);
			$uid = $this->session->userdata('userId');	
	
			$password_token = "";
			$password_expiry = "";
			
			//try{
				$len = 10;
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
				$random_code = '';
				//for($i=1;$i<$len; $i++)
				//{
				//	$random_code = $chars[rand(0,strlen($chars))];
				//}
				$random_code = substr(str_shuffle(str_repeat($chars, ceil($len/strlen($chars)) )),1,$len);
				$password_token = $random_code;
			//}catch(Exception $e){
				//echo "error";
			//}
	
			$current = time() + 3600;                                                                                    
			$password_expiry = unix_to_human($current, TRUE, 'us');	

			$userData = array('password_token' => $password_token, 'password_expiry' => $password_expiry);    
			$this->db->where('user_id', $uid);
			$res = $this->db->update('tbl_user', $userData); 
			if($res){
				$message = '<p>Dear Member,<br/><br/> </p><p> We have received a request to change your password. If you did not make this request yourself, ignore this email and contact your administrator.<br/></p>If you would like to reset your password, please follow the link below. This link will expire in 20 minutes.</p><br/><p><a href="' . base_url() . 'passwordverify?code='.$this->session->userdata('userId').'&token='.$password_token . '" target="_blank">'. base_url() . 'passwordverify?code='.$this->session->userdata('userId').'&token='.$password_token . '</a></p><br/><br/>
				Best regards,<br/><br/><p><a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a></p>';

				$email_response = send_generic_email(array(
														'to' => $this->input->post('email'),
														'subject' => "Forget password",
														'message' => $message));
				if($email_response)
				{
					redirect(base_url('login/passwordrecovery'));
				}
			} else {
				echo "not update";
			}		
		}
		else{
			$this->data['e_msg'] = "Email does not exist";
		} 
	}

	public function passwordrecovery()
	{
		$this->load->view('frontend/email_verification');
    }

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
	
	public function newpassword(){
		$password = $this->input->post('password');
		$uid = $this->session->userdata('userId');	
		$userData = array('password' => md5($this->input->post('password')));    
		$this->db->where('user_id', $uid);
		$result = $this->db->update('tbl_user', $userData); 
		if($result){
			$this->load->view('frontend/password_success');
			//$this->data['e_msg'] = "Password changed successfully. <a href='".base_url()."login'>Click here to login</a>";
		}
	}
	public function test()
	{
		//$block_io_data = get_wallet_data($this->session->userdata('user_email'));
		var_dump('zzz'.$this->session->userdata("block_io_ballance"));
		$this->session->set_userdata($block_io_data);
	}
}
?>
