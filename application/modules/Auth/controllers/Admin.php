<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		echo 'Admin Auth';
		$this->load->view('index');
	}

}