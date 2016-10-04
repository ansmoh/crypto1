<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication extends CI_Model{

	public function __construct(){
		parent::__construct();
	}

	public function register($data)
	{
		$this->db->insert('tbl_user',$data['user']);
		return $this->db->insert_id();
	}

	public function email_check($email)
	{
		$q = $this->db->get_where('tbl_user', array('email'=>$email) );
		return $q->num_rows();
	}

	public function OTP_Token($token,$user_id)
	{
		$this->db->select(array('user_id', 'otp_token', 'otp_expiry', 'phone'));
		$this->db->from('tbl_user_details');
		$this->db->where(array('user_id' => $user_id, 'otp_token' => $token));
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function Email_Verify($token,$user_id)
	{
		$this->db->select(array('user_id','email_token', 'email_expiry'));
		$this->db->from('tbl_user');
		$this->db->where(array('user_id' => $user_id , 'email_token' => $token));
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function Email_Success($user_id)
	{		
		$email = array('email_isverified' => 1);    
		$this->db->where('user_id' , $user_id);
		$this->db->update('tbl_user', $email);
		return "success";
	}
	public function login_user($data)
	{	
        $this->db->select(array('user_id','email','username','user_role_id'));
		$this->db->from('tbl_user');
		$this->db->where(array('email' => $data['u.email'], 'password' => $data['u.password'],'email_isverified' => '1'));
		$this->db->limit(1);
		$query = $this->db->get();
		$check = $query->num_rows();
		if($check > 0)
		{	
			$result['check'] = 1;
			$result['user_data'] = $query->row_array();
		} 
		else {
			$result['check'] = 0;
		}		
		return $result;
	}
	
	public function login_username($data)
	{	
        $this->db->select(array('user_id','email','username','user_role_id'));
		$this->db->from('tbl_user');
		$this->db->where(array('username' => $data['u.username'], 'password' => $data['u.password'],'email_isverified' => '1'));
		$this->db->limit(1);
		$query = $this->db->get();
		$check = $query->num_rows();
		if($check > 0)
		{	
			$result['check'] = 1;
			$result['user_data'] = $query->row_array();
		} 
		else {
			$result['check'] = 0;
		}		
		return $result;
	}

	public function login_log($log) {
		$this->db->insert('tbl_login_log',$log);	
		return $this->db->insert_id();;		
	}

	public function last_login(){
		$current_user = $this->session->userdata('userid');
		$current_time = unix_to_human(time(), TRUE, 'us');
		$login = array('last_login_time' => $current_time);    
		$this->db->where('user_id', $current_user);
		$this->db->update('tbl_user', $login); 
	}
	
	public function unverified_users(){
		$current_user = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->from('tbl_user_details');
		$this->db->where(array('user_id' => $current_user));
		$this->db->limit(1);
		$query = $this->db->get();		
		return $query->row_array();
	}
	
	public function verified_documents(){
		$current_user = $this->session->userdata('userid');
		$this->db->select("*");
		$this->db->from('tbl_user_details');
		$this->db->where(array('user_id' => $current_user, 'document_isverified' => 1));
		$this->db->limit(1);
		$query = $this->db->get();
		
		return $query->row_array();
	}
	
	public function match_email($data)
	{	
        $this->db->select(array('user_id','email'));
		$this->db->from('tbl_user');
		$this->db->where(array('email' => $data['u.email']));
		$this->db->limit(1);
		$query = $this->db->get();
		$check = $query->num_rows();
		if($check > 0)
		{	
			$result['check'] = 1;
			$result['user_data'] = $query->row_array();
		} 
		else {
			$result['check'] = 0;
		}		
		return $result;
	}
	
	public function password_Verify($token,$user_id)
	{
		$this->db->select(array('user_id','password_token', 'password_expiry'));
		$this->db->from('tbl_user');
		$this->db->where(array('user_id' => $user_id , 'password_token' => $token));
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row_array();
	}
}

?>