<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Common:: a library for giving feedback to the user
*
* @author  Vikas Rana
* @url 
* @version 1.0
*/

class Common {
	
	public $CI;
	public $module;
	
	public function __construct($config=null){    
		$this->CI =& get_instance();        
	}
	
	public function module()
	{
		$url=current_url();
		$parts = explode("/", $url);
		$module = end($parts);
		$this->module = $module;
		return $this->module;
	}

	function sendEmail($to,$subject,$message,$cc)
	{
		$config = array(
			'protocol' => 'smtp',
			'smtp_host' => $this->CI->config->item('smtp_host'),
			'smtp_port' => $this->CI->config->item('smtp_port'),
			'smtp_user' => $this->CI->config->item('smtp_user'),
			'smtp_pass' => $this->CI->config->item('smtp_pass'),
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1',
			'wordwrap'   => TRUE
		);	
		
		$this->CI->load->library('email', $config);

		$this->CI->email->set_newline("\r\n");
		$this->CI->email->from($this->CI->config->item('smtp_user'), $this->CI->config->item('site_name'));
		$this->CI->email->to($to);
		$this->CI->email->cc($cc); 
		$this->CI->email->reply_to($this->CI->config->item('smtp_user'), $this->CI->config->item('site_name'));
		
		$this->CI->email->subject($subject);
		$this->CI->email->message($message);
		if ($this->CI->email->send()) 
		{
			if($this->CI->config->item('enable_debug'))
			{
				$this->CI->console->info('Email sent successfully');
			}	
			return true;
		} 
		else 
		{ 
			if($this->CI->config->item('enable_debug'))
			{
				$this->CI->console->error($this->CI->email->print_debugger());
			}
			return false;
		}
	}
	
	function formatPhoneNumber($code=null,$number=null,$save=false)
	{
		if($save)
		{
			return str_replace(
				array('+'.$code.' ','+'.$code),
				array('',''),
				$number
			);
		}
		return '+'.$code.' '.$number;
	}
} 