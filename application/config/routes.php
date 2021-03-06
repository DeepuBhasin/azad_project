<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend_controller/index';
$route['home']['get'] = 'frontend_controller/index';
$route['contact'] = 'frontend_controller/contact';
$route['project']['get'] = 'frontend_controller/project';
$route['about']['get'] = 'frontend_controller/about';
$route['project/(:num)']['get'] = 'frontend_controller/singleproject/$1';


$route['admin_login']['get'] = 'backend_controller/index';
$route['dashboard']['get']  = 'backend_controller/dashboard';
$route['homepage']  = 'backend_controller/homepage';
$route['footerdiv'] = 'backend_controller/footerdiv';
$route['contactpage'] = 'backend_controller/contactpage';
$route['aboutpage'] = 'backend_controller/aboutpage';
$route['addproject'] = 'backend_controller/addproject';
$route['viewproject']['get'] = 'backend_controller/viewproject';
$route['showproject/(:num)']['get'] = 'backend_controller/showproject/$1';
$route['dashboard_status/(:num)/(:num)']['get'] = 'backend_controller/dashboard_status/$1/$2';
$route['deleteproject/(:num)']['get'] = 'backend_controller/deleteproject/$1';
$route['editproject/(:num)']['get'] = 'backend_controller/editproject/$1';
$route['editsave']['post'] = 'backend_controller/editsave';
$route['changepassword'] = 'backend_controller/changepassword';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
// $route['(:any)'] = 'frontend_controller/index';
