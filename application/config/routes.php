<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// ultraadmin routes
$route['ultraadmin/([a-zA-Z_-]+)/(:any)'] = '$1/ultraAdmin/$2';
$route['ultraadmin/([a-zA-Z_-]+)/(:any)/(:any)'] = '$1/ultraAdmin/$2/$3';
$route['ultraadmin/([a-zA-Z_-]+)/(:any)/(:any)/(:any)'] = '$1/ultraAdmin/$2/$3/$4';
$route['ultraadmin/([a-zA-Z_-]+)'] = '$1/ultraAdmin/index';

// superadmin routes
$route['admin/([a-zA-Z_-]+)/(:any)'] = '$1/admin/$2';
$route['admin/([a-zA-Z_-]+)/(:any)/(:any)'] = '$1/admin/$2/$3';
$route['admin/([a-zA-Z_-]+)'] = '$1/admin/index';

/* $handle = opendir(APPPATH.'modules');

if ($handle)
{
	while ( false !== ($module = readdir($handle)) )
	{
		$module = strtolower($module);
		// make sure we don't map silly dirs like .svn, or . or ..
		
		if (substr($module, 0, 1) != ".")
		{
			if ( file_exists(APPPATH.'modules/'.$module.'/'.$module.'_routes.php') )
			{
				include(APPPATH.'modules/'.$module.'/'.$module.'_routes.php');
			}
			if ($module != 'admin') {
				$route[$module] = $module;
				$route[$module.'(/.*)?'] = $module.'$1';
				$route['admin/'.$module.'(/.*)?'] = "$module/admin$1";
			}
		}
	}
} */


/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/users/(:num)'] = 'api/users/id/$1';
$route['api/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/users/id/$1/format/$3$4'; 