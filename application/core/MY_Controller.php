<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

// core/MY_Controller.php
/**
 * Base Controller
 * 
 */ 
class MY_Controller extends MX_Controller {
                      
    function __construct()
    {
        parent::__construct();
        // Load shared resources here or in autoload.php
    }
}

/**
 * Back end Controller
 * 
 */ 
class Admin_Controller extends MY_Controller {

    function __construct()
    {
        parent::__construct();
		$this->output->set_template('admin');
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