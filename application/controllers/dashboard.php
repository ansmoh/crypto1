<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('path');
		$this->load->helper('url');
		$this->load->model('frontend/buybitcoin');
		$this->load->model('frontend/authentication');
		$this->load->model('admin/manage_page');
	}

	public function index()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
		$data['page_url'] = $this->manage_page->page_url();
		$data['content'] = $this->manage_page->page_content();
		$this->load->view('frontend/dashboard',$data);
	}
	
	public function btc_investor ()
	{
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
		$data['page_url'] = $this->manage_page->page_url();
		$data['content'] = $this->manage_page->page_content();
		$this->load->view('frontend/btc_invester', $data);
	}
	
	public function transaction()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['output'] = $result;
		$data['size1'] = count($result);
		$data['page_url'] = $this->manage_page->page_url();
		$data['content'] = $this->manage_page->page_content();
		$this->load->view('frontend/transaction',$data);
	}
	
	
	public function account_deactivate()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
		$this->load->view('frontend/account_deactivate',$data);
	}
	
	public function payment_method()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
		$data['page_url'] = $this->manage_page->page_url();
		$data['content'] = $this->manage_page->page_content();
		$this->load->view('frontend/payment_method',$data);
	}


	public function document_isverified()
	{	
		$this->buybitcoin->check_isverified();
	}
	
	public function buy_bitcoin()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$buybit = $this->input->post('buybitcoin');
		$price = $this->input->post('ask4');
		$total = $this->input->post('total1');
		$payment = $this->input->post('payment_method');
		
		if($buybit != "" && $price != "" && $total != "" && $payment != ""){
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
			
			$adminmessge2 = '<p>Hello Admin,<br/><br/>A registered user has sent a request to buy bitcoins.<br/><br/></p>
			<p><b>Bitcoin Qty:</b> '. $buybit .'<br/></p>
			<p><b>Current Price:</b> '. $price .'<br/></p>
			<p><b>Total Price:</b> '. $total .'<br/></p>
			<p><b>Payment Method:</b> '. $payment .'<br/></p>
			<p><b>Email:</b> '. $this->session->userdata('user_email') .'<br/></p>
			<a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a>';
																	
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('admin@ezbtc.ca', 'no-reply');
			$this->email->to('ezacctverify@gmail.com');
			$this->email->cc('ingeniouscoder45@gmail.com');
			$this->email->subject('Buy Query');
			$this->email->message($adminmessge2);
														
			if($this->email->send()) {
				$data['ms'] = 'An ezBtc agent will contact you shortly. We strive to fill all orders within one hour. For immediate assistance press live chat.';		
			} 
		}	
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
		$this->load->view('frontend/buy_bitcoin',$data);
	}
	
	public function send_bitcoin()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}		
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
		$data['page_url'] = $this->manage_page->page_url();
		$data['content'] = $this->manage_page->page_content();
		$this->load->view('frontend/send_bitcoin',$data);
	}
	
	public function sell_bitcoin()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$sellbitcoin = $this->input->post('sellbitcoin');
		$price = $this->input->post('bid4');
		$total = $this->input->post('total4');
		$payment = $this->input->post('payment_method');

		if($sellbitcoin != "" && $price != "" &&  $total != ""){
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
			
			$adminmessge1 = '<p>Hello Admin,<br/><br/> A registered user has sent a request to sell bitcoins.<br/><br/></p>
			<p><b>Bitcoin Qty:</b> '. $sellbitcoin .'<br/></p>
			<p><b>Current Price:</b> '. $price .'<br/></p>
			<p><b>Total Price:</b> '. $total .'<br/></p>
			<p><b>Payment Method:</b> '. $payment .'<br/></p>
			<p><b>Email:</b> '. $this->session->userdata('user_email') .'<br/></p>
			<a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a>';
									
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->from('admin@ezbtc.ca', 'no-reply');
			$this->email->to('ezacctverify@gmail.com');
			$this->email->cc('ingeniouscoder45@gmail.com');
			$this->email->subject('Sell Query');
			$this->email->message($adminmessge1);
														
			if($this->email->send()) {
				$data['ms1'] = 'An ezBtc agent will contact you shortly. We strive to fill all orders within one hour. For immediate assistance press live chat.';		
			} 
		}
		$bitcoin = $this->buybitcoin->bitcoins();
		$data['bitSize'] = count($bitcoin);
		$data['bit'] = $bitcoin;
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents(); 
		$data['size1'] = count($result);
		$this->load->view('frontend/sell_bitcoin',$data);
	}
	
	public function account_activate($message = '')
	{
                 
		if(!$this->session->userdata('userid'))
		{
				redirect(base_url('login'));
		}
                
		if(isset($_POST['submit'])) {
			$config = array(
			'upload_path' => "./assets/images/media/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			); 
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file1'))
			{
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
			}
			if($this->upload->do_upload('file2'))
			{
				$imageDetailArray2 = $this->upload->data();
				$image2 =  $imageDetailArray2['file_name'];
			}
			if($this->upload->do_upload('file3'))
			{
				$imageDetailArray3 = $this->upload->data();
				$image3 =  $imageDetailArray3['file_name'];
			}	
			if($this->upload->do_upload('file4'))
			{
				$imageDetailArray4 = $this->upload->data();
				$image4 =  $imageDetailArray4['file_name'];
			}
			/* generate otp */
				
			$otp = rand(1111,9999);
			/*
			$url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
				[
				  'api_key' =>  '08480a4d',
				  'api_secret' => '53e41908a5fa16f9',
				  'to' => $_POST['phonenumber'],
				  'from' => '14373704013',
				  'text' => 'Your one time password for EZBTC is '.$otp
				]
			);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);*/
								
			/* otp expiry */
			$now = time() + (60*5);                                                                 
			
			$expire = unix_to_human($now, TRUE, 'us');
			
			/* insert data */
			$data = array('user_id' => $this->session->userdata('userid'), 
						'first_name' => $_POST['f_name'], 
						'last_name' => $_POST['l_name'],
						'phone' => $_POST['phonenumber'],
						'address' => $_POST['address'],
						'otp_token' => $otp,
						'otp_expiry' => $expire,
						'country_id' => $_POST['country'],
						'state_id' => $_POST['state'],
						'city' => $_POST['city'],
						'zip_code' => $_POST['zipcode'],
						'video_verification_type' => $_POST['videoverification'],
						'identity_one' => $image,
						'identity_two' => $image2,
						'payment_proof' => $image3,
						'address_proof' => $image4,
						'date_of_call' => $_POST['date'],
						'time_of_call' => $_POST['time']);
			$result = $this->db->insert('tbl_user_details', $data);
			if($result){
				$usermessage = '<p>Dear Member,<br/><br/>Thank you for submitting your documents, they are pending for approval. Approval will be finalized during the video call.</p><br/><br/><br/><p><a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a></p>';
				$email_response = send_generic_email(array(
														'to' => $this->session->userdata('user_email'),
														'subject' => "Email Verification",
														'message' => $usermessage));
						
				
				if($email_response) {
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
					$adminmessge = '<p>Hello Admin,<br/><br/> A new user has submitted his/her documents for approval.<br/><br/></p>
					<p>First Name: '. $_POST['f_name'] .'<br/><br/></p>
					<p>Last Name: '. $_POST['l_name'] .'<br/><br/></p>
					<p>Phone: '. $_POST['phonenumber'] .'<br/><br/></p>
					<p>Address: '. $_POST['address'] .'<br/><br/></p>
					<p>Otp Token: '. $otp .'<br/><br/></p>
					<p>Otp Expiry: '. $expire .'<br/><br/></p>
					<p>Country Id: '. $_POST['country'] .'<br/><br/></p>
					<p>State Id: '. $_POST['state'] .'<br/><br/></p>
					<p>City: '. $_POST['city'] .'<br/><br/></p>
					<p>Zip: '. $_POST['zipcode'] .'<br/><br/></p>
					<p>Video Verification Type: '. $_POST['videoverification'] .'<br/><br/></p>
					<p>Date of Call: '. $_POST['date'] .'<br/><br/></p>
					<p>Time of Call: '. $_POST['time'] .'<br/><br/></p>
					<a href="https://www.ezbtc.ca/"><img src="https://www.ezbtc.ca/assets/images/logo.png" alt="Logo"></a>';
					
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->from('admin@ezbtc.ca', 'no-reply');
					$this->email->to('ezacctverify@gmail.com');
					$this->email->cc('ingeniouscoder45@gmail.com');
					$this->email->subject('Application for Verification of Account');
					$this->email->message($adminmessge);
					$attched_file= $_SERVER["DOCUMENT_ROOT"]."/assets/images/media/".$image;
					$this->email->attach($attched_file);
					$attched_file2= $_SERVER["DOCUMENT_ROOT"]."/assets/images/media/".$image2;
					$this->email->attach($attched_file2);
					$attched_file3= $_SERVER["DOCUMENT_ROOT"]."/assets/images/media/".$image3;
					$this->email->attach($attched_file3);
					$attched_file4= $_SERVER["DOCUMENT_ROOT"]."/assets/images/media/".$image4;
					$this->email->attach($attched_file4);
					
					if($this->email->send()) {
						redirect(base_url('dashboard/success'));
					}
				}
			}
		}
		$username = $this->session->userdata('userid');
		$queryUserDetail = $this->db->query("SELECT * FROM tbl_user_details where user_id =  $username");
		$UserDetail = $queryUserDetail->result_array();
		if(!empty($UserDetail)) {
			if($UserDetail[0]['document_isverified'] != '1') {
				$message = 'Your documents are currently under review and will be approved after your video chat.';
				redirect(base_url('dashboard/message/'.$message));
				 //redirect(nbase_url('dashboard/message/'));
			} 
			else 
			{
				  $message = 'Your account is activated.';
				 redirect(base_url('dashboard/message/'.$message));
				 //redirect(base_url('dashboard/message'))
			}
		}
		$query = $this->db->query("SELECT country_id as id, name FROM tbl_countries");
		$countries = $query->result_array();
		$data = array('countries' => $countries, 'message' => $message);
		$res = $this->authentication->unverified_users();
		$data['size'] = count($res);
		$result = $this->authentication->verified_documents();
		$data['size1'] = count($result);
               
		$this->load->view('frontend/account_activate', $data);
	}
	public function account_copy()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		if(isset($_POST['submit'])) {
			$config = array(
			'upload_path' => "./assets/images/media/",
			'allowed_types' => "gif|jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			); 
			$this->load->library('upload', $config);
			if($this->upload->do_upload('file1'))
			{
				$imageDetailArray = $this->upload->data();
				$image =  $imageDetailArray['file_name'];
			}
			if($this->upload->do_upload('file2'))
			{
				$imageDetailArray2 = $this->upload->data();
				$image2 =  $imageDetailArray2['file_name'];
			}
			if($this->upload->do_upload('file3'))
			{
				$imageDetailArray3 = $this->upload->data();
				$image3 =  $imageDetailArray3['file_name'];
			}
			/* generate otp */
			$otp = rand(1111,9999);
			/*
			$url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
				[
				  'api_key' =>  '08480a4d',
				  'api_secret' => '53e41908a5fa16f9',
				  'to' => '91'.$_POST['phonenumber'],
				  'from' => '14373704013',
				  'text' => 'Your one time password for EZBTC is '.$otp
				]
			);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);*/
			/* otp expiry */
			$now = time() + (60*5);                                                                                    ;
			$expire = unix_to_human($now, TRUE, 'us');
			
			/* insert data */
			$data = array('user_id' => $this->session->userdata('userid'), 
						'first_name' => $_POST['f_name'], 
						'last_name' => $_POST['l_name'],
						'phone' => $_POST['phonenumber'],
						'address' => $_POST['address'],
						'otp_token' => $otp,
						'otp_expiry' => $expire,
						'country_id' => $_POST['country'],
						'state_id' => $_POST['state'],
						'city' => $_POST['city'],
						'zip_code' => $_POST['zipcode'],
						'video_verification_type' => $_POST['videoverification'],
						'identity_one' => $image,
						'identity_two' => $image2,
						'payment_proof' => $image3,
						'date_of_call' => $_POST['date'],
						'time_of_call' => $_POST['time']);
			$this->db->insert('tbl_user_details', $data);
			redirect(base_url('dashboard/smsverification'));
		}
		$username = $this->session->userdata('userid');
		$queryUserDetail = $this->db->query("SELECT * FROM tbl_user_details where user_id =  $username");
		$UserDetail = $queryUserDetail->result_array();
		if(!empty($UserDetail)) {
			if($UserDetail[0]['document_isverified'] != '1') {
				 $message = 'Your documents are currently under review and will be approved after your video chat.';
				 redirect(base_url('dashboard/account_copy/'.$message));
				 //redirect(nbase_url('dashboard/message/'));
			} 
			else 
			{
				  $message = 'Your account is activated.';
				 redirect(base_url('dashboard/account_copy/'.$message));
				 //redirect(base_url('dashboard/message'))
			}
		}
		$query = $this->db->query("SELECT country_id as id, name FROM tbl_countries");
		$countries = $query->result_array();
		$data = array('countries' => $countries);
		$this->load->view('frontend/account_copy', $data);
	}
		
	public function smsverification()
	{
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$this->load->view('frontend/otp');
	}
		
	public function otp(){
		$otp = $this->input->post('otp');
		$user_id = $this->session->userdata('userid');
		$data['OTP'] = $this->authentication->OTP_Token($otp, $user_id);
		$size = count($data['OTP']);
		
		if($size > 0) 
		{		
			$current_time = unix_to_human(time(), TRUE, 'us');
			if($current_time > $data['OTP']['otp_expiry'])
			{
				$this->session->set_flashdata('time_expiry', 'Your time has expired.');
			}
			else 
			{
				$query = $this->db->query("SELECT user_details_id as id, user_id FROM tbl_user_details where user_id = $user_id");
				$userData = $query->result_array(); 
				
				$data = array('phone_isverified' => '1' );
				$where = array('user_details_id' => $userData[0]['id']);
				$this->db->where($where);
				$this->db->update('tbl_user_details', $data);
				redirect(base_url('dashboard/success'));
			}
		} 
		else 
		{
			$this->session->set_flashdata('wrong_otp', 'You have entered wrong OTP.');
		}
		$this->load->view('frontend/otp');
	}
	
	public function ajax_state_option(){
		
		if(!$this->session->userdata('userid'))
		{
			redirect(base_url('login'));
		}
		$return = '';
		$countryId = isset($_REQUEST['countryID']) ? $_REQUEST['countryID'] : '';
		if(!empty($countryId))
		{
			$query = $this->db->query("SELECT state_id as id, name FROM tbl_states where country_id = $countryId");
			$states = $query->result_array();
			if(!empty($states))
			{
				$return = '<option value="">- Select State -</option>';
				foreach($states as $state)
				{
				   $return .= '<option value='. $state['id'] .'>'. $state['name'] .'</option>';
				}
			} 
			else
			{     
				$return = '<option value="">- Select State -</option>';
			}
		} 
		else 
		{
			$return = '<option value="">- Select State -</option>';
		}
		echo $return;
		exit();
	}
 
	public function do_upload($name =''){
		$config = array(
		'upload_path' => "./assets/images/media/",
		'allowed_types' => "gif|jpg|png|jpeg|pdf",
		'overwrite' => TRUE,
		'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
		'max_height' => "768",
		'max_width' => "1024"
		);
		$this->load->library('upload', $config);
		if($this->upload->do_upload($name))
		{
			$imageDetailArray = $this->upload->data();
			return $image =  $imageDetailArray['file_name'];
		}
	}
	
	public function success()
	{
		$this->load->view('frontend/otp_success');	
	}

	public function message($message = '')
	{
		$this->load->view('frontend/message_account',array('message' => $message));	
	}

    public function deposit(){

        $this->checkAuth();

        $this->load->view('frontend/dashboard_deposit', array(
            'userdata' => $this->session->userdata
        ));

    }

    private function checkAuth(){
        if(!$this->session->userdata('userid'))
        {
            redirect(base_url('login'));
        }
    }
}

?>