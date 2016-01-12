<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		if (Sentry::check())
		{
			if($this->uri->segment(3)!='logout')
			{
				redirect('admin/dashboard');
			}	
		}
	}

	public function index() {
		$this->output->append_title('Login');
		//$this->message->set('danger', 'Test Message');
		$data = array();
		
		 // Create the user
		$user = Sentry::createUser(array(
			'email'     => 'vikas.rana1@sebiz.net',
			'first_name' => 'Root',
			'last_name' => 'User',
			'password'  => 'demo123',
			'activated' => true,
			'permissions' => array('superuser' => '1')
		));
		//echo '<pre>'; print_r($user);
	//	$user = $user->getUser();
		//$user = (array)$user;
		echo '<pre>'; print_r($user->getId());
		echo '<pre>'; print_r($user['*original']);
		die;
		/* 
		// Find the group using the group id
		$adminGroup = Sentry::findGroupById(1); 

		// Assign the group to the user
		$user->addGroup($adminGroup);  */
		if($this->input->post())
		{
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'required|required');
			$this->form_validation->set_rules('remember_me','Remember Me','');

			if($this->form_validation->run() == TRUE)
			{
				// Login
				
				// set login credentials
				$credentials = array(
				  'email'    => $this->input->post('username'),
				  'password' => $this->input->post('password'),
				);
				
				// authenticate
				try {
					$currentUser = Sentry::authenticate($credentials, $this->input->post('remember_me'));
					// Redirect
					if($redir = $this->session->userdata('redir'))
					{
						$this->session->unset_userdata('redir');
					}
					redirect($redir ? $redir : 'admin/dashboard');
				} 
				catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
				{
					$errors = 'Login field is required.';
				}
				catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
				{
					$errors = 'Password field is required.';
				}
				catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
				{
					$errors = 'Invalid credentials.';
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
					$errors = 'User was not found.';
				}
				catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
				{
					$errors = 'User is not activated.';
				}

				// The following is only required if the throttling is enabled
				catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
				{
					$errors = 'User is suspended.';
				}
				catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
				{
					$errors = 'User is banned.';
				}
			}
			else
			{
				$errors = $this->message->validation_errors();
			}
			$this->message->set('danger', $errors);
		}
		
		$data['username'] = array('name' => 'username',
			'autofocus' => 'autofocus',
			'id' => 'username',
			'placeholder' => 'Username',
			'class' => 'form-control',
			'type' => 'text',
			'value' => $this->form_validation->set_value('username')
		);
		
		$data['password'] = array('name' => 'password',
			'autofocus' => 'autofocus',
			'id' => 'password',
			'placeholder' => 'Password',
			'class' => 'form-control',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password')
		);
		$this->load->view('index',$data);
	}

	public function logout() {
		Sentry::logout();
		redirect('admin/auth');
	}
}