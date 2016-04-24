<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library("security");
		$this->load->library("timezone");
		$this->load->library("parser");
		$this->load->model('client_model');
		if (!Sentry::check())
		{
			$this->message->set('danger', 'You must login to access this module',TRUE,'message');
			redirect(website_url('auth'));
		}
	}
	
	function loadClients()
	{
		$_GET = $this->security->xss_clean($_GET);
		echo $this->client_model->getClients(); exit;
	}
	/*
	 * index
	 *
	 * This function is used to display client listing
	 *
	 * @param void
	 * @return void
	 */
	public function index() {
		// add page title
		$this->output->append_title('users');
		// add breadcrumbs
		
		$this->breadcrumb->populate(array(
			'Dashboard' => parent::$module.'/dashboard',
			'users'
		));
		
		$data = array();
		// load view
		$this->load->view(parent::$module.'/index',$data);
	}
	
	/*
	 * add
	 *
	 * This function is used to create new client
	 *
	 * @param void
	 * @return void
	 */
	public function add() {
		$data = array();	
		// add page title
		$this->output->append_title('Add New Client');
		// add breadcrumbs
		
		$this->breadcrumb->populate(array(
			'Dashboard' => parent::$module.'/dashboard',
			'users' => parent::$module.'/clients',
			'Add Client'
		));
		// process form
		if($this->input->post())
		{
			// set validation rules
			$this->form_validation->set_rules('client_first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('client_last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('client_address', 'Client Address', 'trim|required');
			$this->form_validation->set_rules('client_url', '', 'trim');
			$this->form_validation->set_rules('email', 'Email', 'trim|edit_unique[users.email]');
			$this->form_validation->set_rules('client_phone_number', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('client_fb_page_url', '', 'trim');
			$this->form_validation->set_rules('client_twitter_page_url', '', 'trim');
			$this->form_validation->set_rules('client_website_url', '', 'trim');
			$this->form_validation->set_rules('client_timezone', 'Client Timezone', 'trim|required');
			
			
			// validate form
			if($this->form_validation->run() == TRUE)
			{

				// Create client
				$user = Sentry::createUser(array(
					'first_name' => $this->input->post('client_first_name'),
					'last_name' => $this->input->post('client_last_name'),
					'address' => $this->input->post('client_address'),
					'email'     => $this->input->post('email'),
					'password'  => $this->input->post('password'),
					'country_code'  => $this->input->post('client_country_code'),
					'phone_number' => $this->common->formatPhoneNumber($this->input->post('client_country_code'),$this->input->post('client_phone_number'),true),
					'timezone' => $this->input->post('client_timezone'),
					'activated' => true
				));
				$user_id = $user->getId(); // get user id
				
				// Find the group using the group id
				$adminGroup = Sentry::findGroupById(CLIENT_GROUP_ID); // 

				// Assign the group to the user
				$user->addGroup($adminGroup);
				
				$data = array(
				   'client_url' => prep_url($this->input->post('client_url')),
				   'client_fb_page_url' => prep_url($this->input->post('client_fb_page_url')),
				   'client_twitter_page_url' => prep_url($this->input->post('client_twitter_page_url')),
				   'client_website_url' => prep_url($this->input->post('client_website_url')),
				   'user_id' => $user_id,
				   'created_on' =>  CURRENT_DATETIME,
				   'updated_on' =>  CURRENT_DATETIME,
				);
				
				$data = $this->security->xss_clean($data); // filter data & remove malicious code 
				$this->client_model->insert($data); 
				
				$url = website_url('admin');
				
				$subject = 'Client Account Creation';
				$template_data = array(
					'email_title' => 'Client Account Creation',
					'email_heading' => 'Hello '.$this->input->post('client_first_name').' '.$this->input->post('client_last_name'),
					'email_body' => 'Your account has been created.<br/>
					Your account details are:<br/>
					Email: '.$this->input->post('email').'<br/>
					Password: '.$this->input->post('password').'<br/>
					<br/>Please click on the following link to login:<br/> <a href="'.$url.'">'.$url.'</a><br/>
					If clicking the link does not work, please copy and paste the URL into your browser instead.<br/>
					'
				);

				$body =  $this->parser->parse('emails/user_registration', $template_data,TRUE);
				if($this->common->sendEmail($email,$subject,$body))
				{
					$this->message->set('success', 'Client added successfully.', TRUE, 'message');
				}
				else
				{
					$this->message->set('warning', 'Unable to send email, please try again later.', TRUE, 'message');
				}
				
				
				redirect(website_url('users'));				
			}
			else
			{
				$this->message->set('danger', $this->message->validation_errors());
			}
		}
		
		// create form fields
		$data['client_first_name'] = array('name' => 'client_first_name',
			'autofocus' => 'autofocus',
			'id' => 'client_first_name',
			'placeholder' => 'First Name',
			'class' => 'form-control',
			'maxlength' => 50,
			'value' => $this->form_validation->set_value('client_first_name')
		);
		
		$data['client_last_name'] = array('name' => 'client_last_name',
			'id' => 'client_last_name',
			'placeholder' => 'Last Name',
			'class' => 'form-control',
			'maxlength' => 50,
			'value' => $this->form_validation->set_value('client_last_name')
		);
		
		$data['client_url'] = array('name' => 'client_url',
			'id' => 'client_url',
			'placeholder' => 'Client URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_url')
		);
		
		$data['client_address'] = array('name' => 'client_address',
			'id' => 'client_address',
			'placeholder' => 'Client Address',
			'class' => 'form-control',
			'maxlength' => 300,
			'rows' => 5,
			'value' => $this->form_validation->set_value('client_address')
		);
		
		$data['client_phone_number'] = array('name' => 'client_phone_number',
			'id' => 'client_phone_number',
			'placeholder' => 'Phone Number',
			'class' => 'form-control international-number',
			'maxlength' => 15,
			'type' => 'tel',
			'value' => $this->form_validation->set_value('client_phone_number')
		);
		
		$data['client_fb_page_url'] = array('name' => 'client_fb_page_url',
			'id' => 'client_fb_page_url',
			'placeholder' => 'Facebook Page URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_fb_page_url')
		);
		
		$data['client_twitter_page_url'] = array('name' => 'client_twitter_page_url',
			'id' => 'client_twitter_page_url',
			'placeholder' => 'Twitter Page URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_twitter_page_url')
		);
		
		$data['client_website_url'] = array('name' => 'client_website_url',
			'id' => 'client_website_url',
			'placeholder' => 'Website URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_website_url')
		);
		
		$timezones = $this->timezone->get_timezone_list(); 
		
		$list=array(''=>'Select Timezone');
		foreach($timezones as $key=>$value )
		{
			$list[$value] = $key;      
		}
		//echo '<pre>'; print_r($list);die;
		
		$data['client_timezone'] = array('name' => 'client_timezone',
			'additional' => array(
							'id' => 'client_timezone',
							'class' => 'form-control',
						),
			'value' => $list,
			'selected' => $this->form_validation->set_value('client_timezone')
		);
		
		$data['client_country_code'] = array('name' => 'client_country_code',
			'id' => 'client_country_code',
			'type' => 'hidden',
			'value' => $this->form_validation->set_value('client_country_code')
		);
		
		$data['email'] = array('name' => 'email',
			'id' => 'email',
			'placeholder' => 'Email',
			'class' => 'form-control',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email')
		);
		
		$data['password'] = array('name' => 'password',
			'id' => 'password',
			'placeholder' => 'Password',
			'class' => 'form-control',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password')
		);
		
		// load view
		$this->load->view(parent::$module.'/edit',$data);
	}
	
	/*
	 * edit
	 *
	 * This function is used to create new client
	 *
	 * @param void
	 * @return void
	 */
	public function edit($encoded_id = null) {
		$id = base64_decode(urldecode($encoded_id));
		
		if(empty($id))
		{
			redirect(website_url('users'));
		}
		$data = array();	
		// add page title
		$this->output->append_title('Edit Client');
		// add breadcrumbs
		
		$this->breadcrumb->populate(array(
			'Dashboard' => parent::$module.'/dashboard',
			'users' => parent::$module.'/clients',
			'Edit Client'
		));
		
		$row = $this->client_model->getClient($id);
		//echo '<pre>'; print_r($row);die;
		$data['result'] = $row;
		
		// process form
		if($this->input->post())
		{
			// set validation rules
			$this->form_validation->set_rules('client_first_name', 'First Name', 'trim|required');
			$this->form_validation->set_rules('client_last_name', 'Last Name', 'trim|required');
			$this->form_validation->set_rules('client_address', 'Client Address', 'trim|required');
			$this->form_validation->set_rules('client_url', '', 'trim');
			$this->form_validation->set_rules('email', 'Email', 'trim|edit_unique[users.email.'.$row->user_id .']');
			$this->form_validation->set_rules('client_phone_number', 'Phone Number', 'trim|required');
			$this->form_validation->set_rules('client_fb_page_url', '', 'trim');
			$this->form_validation->set_rules('client_twitter_page_url', '', 'trim');
			$this->form_validation->set_rules('client_website_url', '', 'trim');
			$this->form_validation->set_rules('client_timezone', 'Client Timezone', 'trim|required');
			
			
			// validate form
			if($this->form_validation->run() == TRUE)
			{
				
				// Update client
				$user = array(
					'first_name' => $this->input->post('client_first_name'),
					'last_name' => $this->input->post('client_last_name'),
					'address' => $this->input->post('client_address'),
					'email'     => $this->input->post('email'),
					'country_code'  => $this->input->post('client_country_code'),
					'phone_number' => $this->common->formatPhoneNumber($this->input->post('client_country_code'),$this->input->post('client_phone_number'),true),
					'timezone' => $this->input->post('client_timezone'),
				);
				if(!empty($this->input->post('password_edit')))
				{
					$user['password'] = $this->input->post('password_edit');
				}
				$this->client_model->updateUser($user,$row->user_id); 
				
				$data = array(
				   'client_url' => prep_url($this->input->post('client_url')),
				   'client_fb_page_url' => prep_url($this->input->post('client_fb_page_url')),
				   'client_twitter_page_url' => prep_url($this->input->post('client_twitter_page_url')),
				   'client_website_url' => prep_url($this->input->post('client_website_url')),
				   'updated_on' =>  CURRENT_DATETIME,
				);
				
				$data = $this->security->xss_clean($data); // filter data & remove malicious code 
				
				$this->client_model->insert($data,$id); 
				
				$this->message->set('success', 'Client updated successfully', TRUE, 'message');
				redirect(website_url('users'));				
			}
			else
			{
				$this->message->set('danger', $this->message->validation_errors());
			}
		}
		
		
		// create form fields
		$data['client_first_name'] = array('name' => 'client_first_name',
			'autofocus' => 'autofocus',
			'id' => 'client_first_name',
			'placeholder' => 'First Name',
			'class' => 'form-control',
			'maxlength' => 50,
			'value' => $this->form_validation->set_value('client_first_name', $row->first_name)
		);
		
		$data['client_last_name'] = array('name' => 'client_last_name',
			'id' => 'client_last_name',
			'placeholder' => 'Last Name',
			'class' => 'form-control',
			'maxlength' => 50,
			'value' => $this->form_validation->set_value('client_last_name', $row->last_name)
		);
		
		$data['client_url'] = array('name' => 'client_url',
			'id' => 'client_url',
			'placeholder' => 'Client URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_url', $row->client_url)
		);
		
		$data['client_address'] = array('name' => 'client_address',
			'id' => 'client_address',
			'placeholder' => 'Client Address',
			'class' => 'form-control',
			'maxlength' => 300,
			'rows' => 5,
			'value' => $this->form_validation->set_value('client_address', $row->address)
		);
		
		$data['client_phone_number'] = array('name' => 'client_phone_number',
			'id' => 'client_phone_number',
			'placeholder' => 'Phone Number',
			'class' => 'form-control international-number',
			'maxlength' => 15,
			'type' => 'tel',
			'value' => $this->form_validation->set_value('client_phone_number', $row->phone_number)
		);
		
		$data['client_fb_page_url'] = array('name' => 'client_fb_page_url',
			'id' => 'client_fb_page_url',
			'placeholder' => 'Facebook Page URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_fb_page_url', $row->client_fb_page_url)
		);
		
		$data['client_twitter_page_url'] = array('name' => 'client_twitter_page_url',
			'id' => 'client_twitter_page_url',
			'placeholder' => 'Twitter Page URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_twitter_page_url', $row->client_twitter_page_url)
		);
		
		$data['client_website_url'] = array('name' => 'client_website_url',
			'id' => 'client_website_url',
			'placeholder' => 'Website URL',
			'class' => 'form-control',
			'maxlength' => 100,
			'value' => $this->form_validation->set_value('client_website_url', $row->client_website_url)
		);
		
		$timezones = $this->timezone->get_timezone_list(); 
		
		$list=array(''=>'Select Timezone');
		foreach($timezones as $key=>$value )
		{
			$list[$value] = $key;      
		}
		
		
		$data['client_timezone'] = array('name' => 'client_timezone',
			'additional' => array(
							'id' => 'client_timezone',
							'class' => 'form-control',
						),
			'value' => $list,
			'selected' => $this->form_validation->set_value('client_timezone', $row->timezone)
		);
		
		$data['client_country_code'] = array('name' => 'client_country_code',
			'id' => 'client_country_code',
			'type' => 'hidden',
			'value' => $this->form_validation->set_value('client_country_code', $row->country_code)
		);
		
		$data['phone_number'] = array('name' => 'phone_number',
			'id' => 'phone_number',
			'type' => 'hidden',
			'value' => $this->common->formatPhoneNumber($row->country_code,$row->phone_number)
		);
		
		$data['email'] = array('name' => 'email',
			'id' => 'email',
			'placeholder' => 'Email',
			'class' => 'form-control',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email', $row->email)
		);
		
		$data['password'] = array('name' => 'password_edit',
			'id' => 'password_edit',
			'placeholder' => 'Password',
			'class' => 'form-control',
			'type' => 'password',
			'value' =>''
		);
		
		// load view
		$this->load->view(parent::$module.'/edit',$data);
	}

	/*
	 * remove()
	 *
	 * Deletes a client
	 *
	 * @param int $client_id 
	 * @return nothing
	 */	
	
	public function remove($encoded_id)
	{
		$id = base64_decode(urldecode($encoded_id));
		
		if(empty($id))
		{
			redirect(website_url('users'));
		}
		if(!empty($id))
		{
			// Delete user record
			
			$row = $this->client_model->deleteUser($id);
			$this->message->set('success', 'Client deleted successfully', TRUE, 'message');
			redirect(website_url('users'));	
		}	
	}
	
}