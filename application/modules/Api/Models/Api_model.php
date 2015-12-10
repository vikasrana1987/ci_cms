<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Copyright (c) 2015, Vikas Rana
 * 
 * 
 */
class Api_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getUsers()
	{
		$users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];	
		return $users;
	}
}
