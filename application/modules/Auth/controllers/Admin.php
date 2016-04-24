<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('parser');
		if (Sentry::check())
		{
			if($this->uri->segment(3)!='logout')
			{
				redirect(website_url('dashboard'));
			}	
		}
	}

	/*
	 * index
	 *
	 * This function is used to authenticate user
	 *
	 * @param (type) nothing
	 * @return (type) nothing
	 */
	public function index() {
		$this->output->append_title('Login');
		
		$data = array();
		
		if($this->input->post())
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('remember_me','Remember Me','');

			if($this->form_validation->run() == TRUE)
			{
				// set login credentials
				$credentials = array(
				  'email'    => $this->input->post('email'),
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
					redirect($redir ? $redir : website_url('dashboard'));
				} 
				catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
				{
					$message =  array('type' => 'danger','message' => 'Login field is required.');
				}
				catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
				{
					$message =  array('type' => 'danger','message' => 'Password field is required.');
				}
				catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
				{
					$message =  array('type' => 'danger','message' => 'Invalid credentials.');
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
					$message =  array('type' => 'danger','message' => 'User was not found.');
				}
				catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
				{
					$message =  array('type' => 'danger','message' => 'User is not activated.');
				}

				// The following is only required if the throttling is enabled
				catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
				{
					$message =  array('type' => 'danger','message' => 'User is suspended.');
				}
				catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
				{
					$message =  array('type' => 'danger','message' => 'User is banned.');
				}
			}
			else
			{
				$errors = $this->message->validation_errors();
			}
			$this->message->set($message['type'], $message['message']);
		}
		
		$data['email'] = array('name' => 'email',
			'autocomplete' => 'off',
			'id' => 'email',
			'placeholder' => 'Email',
			'class' => 'form-control',
			'type' => 'text',
			'value' => $this->form_validation->set_value('email')
		);
		
		$data['password'] = array('name' => 'password',
			'autocomplete' => 'off',
			'id' => 'password',
			'placeholder' => 'Password',
			'class' => 'form-control',
			'type' => 'password',
			'value' => $this->form_validation->set_value('password')
		);
		$this->load->view(parent::$module.'/index',$data);
	}

	/*
	 * forgot_password
	 *
	 * This function is used to reset password
	 *
	 * @param void
	 * @return void
	 */
	 
	public function forgot_password() {
		$this->output->append_title('Forgot Password');
		$data = array();
		if($this->input->post())
		{
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			if($this->form_validation->run() == TRUE)
			{
				try
				{
					$email = $this->input->post('email');
					$subject = 'Password Reset Confirmation';
					
					// Find the user using the user email address
					$user = Sentry::findUserByLogin($email);
					
					// Get the password reset code
					$resetCode = $user->getResetPasswordCode();
					$url = website_url('auth/reset/'.$resetCode);
					$template_data = array(
						'email_title' => 'Forgot Password',
						'email_heading' => 'Hello',
						'email_body' => 'There was recently a request to reset your password.
						<br/>If you requested this password change, please click on the following link to reset your password:<br/> <a href="'.$url.'">'.$url.'</a><br/>
						If clicking the link does not work, please copy and paste the URL into your browser instead.<br/><br/>
						If you didn\'t make this request, you can ignore this message and your password will remail the same.
						'
					);

					$body =  $this->parser->parse('emails/user_registration', $template_data,TRUE);
					if($this->common->sendEmail($email,$subject,$body))
					{
						$message =  array('type' => 'success','message' => 'An email has been sent to your email address with instructions to reset your password.');
					}
					else
					{
						$message =  array('type' => 'warning','message' => 'Unable to send email, please try again later.');
					}
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
					$message =  array('type' => 'danger','message' => 'Email does not exists.');
				}
			}
			else
			{
				$message =  array('type' => 'danger','message' => $this->message->validation_errors());
			}
			
			$this->message->set($message['type'], $message['message']);
		}
		
		$data['email'] = array('name' => 'email',
			'autofocus' => 'autofocus',
			'id' => 'email',
			'placeholder' => 'Email',
			'class' => 'form-control',
			'type' => 'text',
			//'value' => $this->form_validation->set_value('email')
		);
		$this->load->view(parent::$module.'/forgot_password',$data);
	}
	
	/*
	 * reset
	 *
	 * This function is used to set new password
	 *
	 * @param string $code (reset code)
	 * @return void
	 */
	 
	public function reset($code=null) {
		
		if(empty($code))
		{
			redirect(website_url('auth'));
		}
		
		$this->output->append_title('Reset Password');
		$data = array();
		$message = array();
		if($this->input->post())
		{
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
			if($this->form_validation->run() == TRUE)
			{
				try
				{
					$user = Sentry::findUserByResetPasswordCode($code);
					if ($user->checkResetPasswordCode($code))
					{
						// Attempt to reset the user password
						if ($user->attemptResetPassword($code, $this->input->post('new_password')))
						{
							$message =  array('type' => 'success','message' => 'Password updated successfully.');
						}
						else
						{
							$message =  array('type' => 'danger','message' => 'Invalid reset code.');
						}
					}
					else
					{
						$message =  array('type' => 'danger','message' => 'Invalid reset code.');
					}
				}
				catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
				{
					$message =  array('type' => 'danger','message' => 'Invalid reset code.');
				}
			}
			else
			{
				$message =  array('type' => 'danger','message' => $this->message->validation_errors());
			}
			$this->message->set($message['type'], $message['message']);
		}
			
		$data['new_password'] = array('name' => 'new_password',
			'autofocus' => 'autofocus',
			'id' => 'new_password',
			'placeholder' => 'New Password',
			'class' => 'form-control',
			'type' => 'password'
		);
		
		$data['confirm_password'] = array('name' => 'confirm_password',
			'autofocus' => 'autofocus',
			'id' => 'confirm_password',
			'placeholder' => 'Confirm Password',
			'class' => 'form-control',
			'type' => 'password'
		);
		
		$this->load->view(parent::$module.'/reset_password',$data);
	}
	
	/*
	 * logout
	 *
	 * This function is used to log out user
	 *
	 * @param  void
	 * @return  void
	 */
	 
	public function logout() {
		Sentry::logout();
		redirect(website_url('auth'));
	}
}