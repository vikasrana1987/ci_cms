<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		echo $this->user_model->getTest();
		$this->load->view('index');
	}

}