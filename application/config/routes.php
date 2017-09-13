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
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//login
$route['login'] ='login';
$route['logging'] = 'Login/logging';
$route['logout'] = 'Login/logout';


//contributor//

//profil
$route['profil/(.+)'] = 'contributor/profil/get_profil/$1';
//artikel
$route['artikel']= 'contributor/artikel';
$route['artikel/buatartikel'] = 'contributor/artikel/buatartikel';
$route['artikel/feedartikel'] = 'contributor/artikel/feedartikel';

//cms artikel
$route['cms/artikel/coba'] = 'cms/artikel/coba';
$route['cms/artikel/delete/(:any)'] = 'admin/delete/$1';
$route['cms/artikel/update/(:any)'] = 'admin/update/$1';
$route['cms/artikel/create'] = 'admin/create';
$route['cms/artikel/konfirmasi'] = 'admin/konfirmasi/$1';
$route['cms/artikel/pinpost'] = 'admin/pinpost/$1';
$route['cms/artikel/unpin'] = 'admin/unpin/$1';
$route['cms/artikel'] = 'admin';
$route['cms/artikel-belum-konfirmasi'] = 'admin/validasi';
$route['cms/artikel/(:any)'] = 'home/view_berita/$1';

//berita
$route['berita'] = 'home/berita';
$route['berita/(:any)'] = 'home/view_berita/view/$1';