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
} 