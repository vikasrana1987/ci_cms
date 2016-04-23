<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
use Cartalyst\Sentry\Facades\Native\Sentry as Sentry;

// core/MY_Controller.php
/**
 * Base Controller
 * 
 */ 
class MY_Controller extends MX_Controller {
                      
    function __construct()
    {
        parent::__construct();
		
		/* Debugging */ 
		if($this->config->item('enable_debug'))
		{
			$this->load->add_package_path(APPPATH.'third_party/debugbar');
			$this->load->library('console');
			$this->output->enable_profiler(TRUE);
			/*$this->console->exception(new Exception('test exception'));
			$this->console->debug('Debug message');
			$this->console->info('Info message');
			$this->console->warning('Warning message');
			$this->console->error('Error message'); */
		}	
		/* End Debugging */ 
		
        // load database configuration from CodeIgniter
        $this->load->database();
		$this->output->set_title('Administrator');
		// configure database
		Sentry::setupDatabaseResolver(new PDO($this->db->dsn, $this->db->username, $this->db->password));
    }
}

/**
 * Back end Controller
 * 
 */ 
class Admin_Controller extends MY_Controller {
	private $login_layout_modules;
	static $module = 'admin';
    function __construct()
    {
        parent::__construct();
		$this->output->set_title('Administrator');
		$this->config->set_item('website_url',base_url(self::$module)); // Override base url
		
		try
		{
			// Get the current active/logged in user
			$user = Sentry::getUser();
			if (Sentry::check())
			{
				if(!$user->hasAnyAccess([self::$module]))
				{
					redirect(website_url('auth'));
				}
			}
			$login_layout_modules = array('auth');			
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			// User wasn't found, should only happen if the user was deleted
			// when they were already logged in or had a "remember me" cookie set
			// and they were deleted.
		}
		if(in_array($this->uri->segment(2),$login_layout_modules))
		{
			$this->output->set_template('admin/layouts/admin_login');
		}
		else
		{
			$this->output->set_template('admin/layouts/admin_dashboard');
		}	
		// Check login, load back end dependencies
    }
}

/**
 * Default Front-end Controller
 * 
 */ 
class Public_Controller extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->output->set_template('front');
        // Load any front-end only dependencies
    }
}