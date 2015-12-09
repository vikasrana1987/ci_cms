<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;
class Admin extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		if (!Sentry::check())
		{
			$this->message->set('danger', 'You must login to access this module');
			redirect('admin/auth');
		}
	}

	public function index() {
		
		// add page title
		$this->output->append_title('Dashboard');
		// add breadcrumbs
		$this->breadcrumb->append('Dashboard', '');

		$data = array();
		// load view
		$this->load->view('index',$data);
	}

}