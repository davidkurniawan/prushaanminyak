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
$route['translate_uri_dashes'] = TRUE;

$route['default_controller'] = "home";
$route['404_override'] = '';
$route['goadmin'] = "goadmin/login";

$route['debug/(:num)'] = 'debug';

$route['news/archive'] = 'news/news_archive';
$route['news/archive/(:num)'] = 'news/news_archive/$1';
$route['news/(:num)'] = 'news';
$route['news/(:any)'] = 'news/news_detail/$1';

$route['csr/archive'] = 'csr/csr_archive';
$route['csr/archive/(:num)'] = 'csr/csr_archive/$1';
$route['csr/(:num)'] = 'csr';
$route['csr/(:any)'] = 'csr/csr_detail/$1';

$route['awards-recognitions/(:num)'] = 'awards_recognitions/awards_recognitions_archive/$1';
$route['awards-recognitions/(:any)'] = 'awards_recognitions/detail/$1';

$route['terms-and-conditions'] = 'information/toc';


// $route['goadmin/upload/(:any)'] = "goadmin/upload/images/$1";

// URI like '/en/about' -> use controller 'about'
// UNCOMMENT FOR INTERNATIONALIZATION
// $route['^(en|id)/(.+)$'] = "$2";

// '/en' and '/fr' URIs -> use default controller
// UNCOMMENT FOR INTERNATIONALIZATION
// $route['^(en|id)$'] = $route['default_controller'];
