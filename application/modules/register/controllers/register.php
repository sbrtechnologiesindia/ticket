<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register extends MX_Controller {

	public function __construct()
	{
		selectlanguage();
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('cognalys');
		$this->load->model('register_model');
		$this->load->model('users/users_model');
		$this->load->model('ticket/ticket_model');
		$this->load->model('knowledgebase/knowledgebase_model');
		$this->load->model('kbcat/kbcat_model');
		$this->load->model('product/product_model');
	}

	public function index()
	{
		@session_start();
		$this->load->view('register');
	}
	
	public function login()
	{
		@session_start();
		$this->load->view('login');
	}

	public function dologin()
	{
		@session_start();
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$this->login();
		}
		else
		{
			$data['username'] = $this->input->post('username');
			//$data['password'] = $this->dibyariaz_encrypt->encode($this->input->post('password'));
			
			$l = $this->register_model->login($data);
			if(!empty($l))
			{
				$_SESSION['c_userid'] = $l[0]->id;
				$_SESSION['c_username'] = $l[0]->username;
				$_SESSION['c_email'] = $l[0]->email;
				$_SESSION['c_name'] = $l[0]->firstname." ".$l[0]->lastname;
				$_SESSION['c_type'] = $l[0]->type;

				echo "<script>
					    window.location.href='".TICKET_PLUGIN_URL."CI/index.php/register/ListTicket'
					  </script>";
			}
			else
			{
			$_SESSION['login_error'] = '<p>Invalid username/password combination</p>';
			$this->login();
			}
		}
	}

	public function ListTicket()
	{
		front_authenticate();
		$where['userid'] = $_SESSION['c_userid'];
		$ticketdet=$this->ticket_model->listUserTicket($where);
		$data['ticketdet']=$ticketdet;

		$this->load->view('list-ticket',$data);
	}
	
	public function knowledge_base()
	{
		//front_authenticate();

		$data['knowledgebasedet']=$this->knowledgebase_model->listknowledgebaseall();
		
		
		//$data['catdet']=$this->kbcat_model->allkbcat();
		//$data['productdet']=$this->product_model->allproduct();
		
		$this->load->view('front-knowledge',$data);
	}

	public function faq()
	{
		//front_authenticate();

		$data['faqdet']=$this->knowledgebase_model->listfaqall();
		
		$this->load->view('front-faq',$data);
	}

	public function viewTicket($ticketid)
	{
		front_authenticate();
		$this->load->model('product/product_model');
		$this->load->model('department/department_model');
		$this->load->model('company/company_model');
		$this->load->model('ticketpriority/ticketpriority_model');

		$productdet=$this->product_model->allproduct();
		$data['productdet']=$productdet;
		$companydet=$this->company_model->allcompany();
		$data['companydet']=$companydet;
		$departmentdet=$this->department_model->alldepartment();
		$data['departmentdet']=$departmentdet;
		$prioritydet=$this->ticketpriority_model->allpriority();
		$data['prioritydet']=$prioritydet;
		$det=$this->ticket_model->getticket($ticketid);
		$data['ticketdetlist']=$det;
		$ticketattachment=$this->ticket_model->getTicketAttachment($ticketid);
		
		$data['ticketattachment']=$ticketattachment;
		$ticketChain = $this->ticket_model->getTicketChain($ticketid);
		$data['querychain']=$ticketChain;
		$this->load->view('newticketview',$data);
	}

	public function postTicket()
	{
		front_authenticate();
		$this->load->model('product/product_model');
		$this->load->model('department/department_model');
		$this->load->model('company/company_model');
		$this->load->model('ticketpriority/ticketpriority_model');
		
		$productdet=$this->product_model->allproduct();
		$data['productdet']=$productdet;
		$companydet=$this->company_model->allcompany();
		$data['companydet']=$companydet;
		$departmentdet=$this->department_model->alldepartment();
		$data['departmentdet']=$departmentdet;
		$prioritydet=$this->ticketpriority_model->allpriority();
		$data['prioritydet']=$prioritydet;

		$this->load->view('ticket-post',$data);
	}
	public function doRegister()
	{
		@session_start();
		$this->load->model('users/users_model');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique['.getDbPrefix().'ticket_users.username]');
		$chkmob=fetchmod('mob_ver');
		if($chkmob==1)
		{
			$settings = (array)getSettingsValue('mobile_verification');

             $type = $settings['type'];

             if($type == 2)
             {
             	$this->form_validation->set_rules('user_mobile', 'Mobile No.', 'is_unique['.getDbPrefix().'ticket_users.mobile]');
             }
             else
             {
             	$this->form_validation->set_rules('user_mobile', 'Mobile No.', 'required|is_unique['.getDbPrefix().'ticket_users.mobile]');
             }

			
		}
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'matches[password]|required');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique['.getDbPrefix().'ticket_users.email]');

		$this->form_validation->set_message('is_unique', '%s already exists !!');
		$this->form_validation->set_message('required', 'Please enter %s !!');
		$this->form_validation->set_message('valid_email', 'Please enter a valid email address !!');
		$this->form_validation->set_message('matches', 'Password did not match !!');
		
		$captcha = $this->input->post('g-recaptcha-response');

		if($c = empty($captcha))
		{
			$_SESSION['register_error'] = "<p>Please check the captcha form.</p>";
		}

		if ($this->form_validation->run() == FALSE || $c)
		{        
			$this->index();
		}
		else
		{
		$data['username'] = $this->input->post('username');
		$data['firstname'] = $this->input->post('firstname');
		$data['lastname'] = $this->input->post('lastname');
		$data['email'] = $this->input->post('email');
		if($chkmob==1)
		{
			$data['mobile'] = $this->input->post('user_mobile');
		}
		$data['password'] = $this->dibyariaz_encrypt->encode($this->input->post('password'));
		$data['admin'] = 0;
		$data['creation_date'] = date('Y-m-d H:i:s');
		$data['modified_date'] = date('Y-m-d H:i:s');
		$data['privilege_group_id'] = '';
		$data['type'] = $this->input->post('c_type');

		$r = $this->users_model->insert($data);
		
		$adminemail=getSettingsValue('adminemail');
		$adminemail=$adminemail->email;
		
		if(!empty($r))
		{
			sendmail($data['email'],$data['firstname'],$data['lastname'],"Ticket System Registration","You have been successfully registered","info@ticketingsystem.com");
			
			sendmail($adminemail,"","","Ticket System Registration","A new user with name ".$data['firstname']." ".$data['lastname']." hase been registered","info@ticketingsystem.com");
			
			$_SESSION['register_success'] = "Registration Successful !!";
			redirect(TICKET_PLUGIN_URL."CI/index.php/register/login");
		}
	  }
	}

	public function logout()
	{
		@session_start();
		@$userid=$_SESSION['c_userid'];
		
		$this->register_model->logout($userid);
		unset($_SESSION['c_userid']);
		
		$url = TICKET_PLUGIN_URL."CI/index.php/register/login";
		session_destroy();
		echo "<script>window.location.href='".$url."'</script>";
		//redirect($url);
	}
	
	public function getOTP()
	{
		$no = $this->input->post("mobile");

				$settings = (array)getSettingsValue('mobile_verification');

		$data = getMobileNo($settings['app_id'],$settings['access_token'],$no);

			echo json_encode($data);
			return;
	}

	public function verifyMobileNumber()
	{

		$mobile = $this->input->post("mobile_number");
		$keymatch = $this->input->post("keymatch");
		$otp = $this->input->post("otp");
		
		$settings = (array)getSettingsValue('mobile_verification');
		
		$data = VerifyMobile($settings['app_id'],$settings['access_token'],$keymatch,$otp);

		echo json_encode($data);
		return;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
