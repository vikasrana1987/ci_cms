<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Copyright (c) 2015, Vikas Rana
 * 
 * 
 */
class Auth extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function getTest()
	{
		return 'test';
	}
}
