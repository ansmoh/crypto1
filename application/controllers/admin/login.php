<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('frontend/authentication');
		$this->load->helper('email');
	}

	public function index()
	{
		$this->load->view('admin/signin');
	}

	public function authentication()
	{
		$name =  $this->input->post('email_username');
		$check_email = valid_email($name);
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

				if($this->session->userdata('role') == 1){
					redirect(base_url('admin/dashboard'));
				} else {
					$data['error'] ="Email or password is incorrect";
					$this->load->view('admin/signin',$data);
				}
			} else {
				$data['error'] ="Email or password is incorrect";
				$this->load->view('admin/signin',$data);
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
				if($this->session->userdata('role') == 1){
					redirect(base_url('admin/dashboard'));
				} else {
					$data['error'] ="Username or password is incorrect";
					$this->load->view('admin/signin',$data);
				}
				
			} else {
				$data['error'] ="Username or password is incorrect";
				$this->load->view('admin/signin',$data);
			}			
		}	 	
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('admin');
	}
}
?>
