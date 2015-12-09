<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		
		echo 'Dashboard';
	}

}