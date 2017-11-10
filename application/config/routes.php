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
$route['login'] ='Login';
$route['logging'] = 'Login/logging';
$route['logout'] = 'Login/logout';

//register
$route['register/respond'] = 'Register/regis_user';
$route['verifikasi/(:any)'] = 'Register/verif_account/$1';
//contributor//

//profil
$route['profil/(.+)'] = 'Contributor/Profil/get_profil/$1';
//artikel
$route['artikel']= 'Contributor/Artikel';
$route['artikel/buatartikel'] = 'Contributor/Artikel/buatartikel'; // create_artikel
$route['my_artikel'] = 'Contributor/Artikel/my_artikel'; // read_artikel
$route['my_artikel/edit/(:any)'] = 'Contributor/Artikel/edit_artikel/$1';
//$route['artikel/feedartikel'] = 'contributor/artikel/feedartikel';

//cms artikel
$route['cms/artikel/coba'] = 'Cms/Artikel/coba';
$route['cms/artikel/delete/(:any)'] = 'Cms/Artikel/delete/$1';
$route['cms/artikel/update/(:any)'] = 'Cms/Artikel/update/$1';
$route['cms/artikel/create'] = 'Cms/Artikel/create';
$route['cms/artikel/konfirmasi'] = 'Cms/Artikel/konfirmasi/$1';
$route['cms/artikel/pinpost'] = 'Cms/Artikel/pinpost/$1';
$route['cms/artikel/unpin'] = 'Cms/Artikel/unpin/$1';
$route['cms/artikel'] = 'Cms/Artikel';
$route['cms/artikel-belum-konfirmasi'] = 'Cms/Artikel/validasi';
$route['cms/artikel/(:any)'] = 'Home/view_berita/$1';

//berita
$route['berita'] = 'Home/berita';
$route['berita/(:any)'] = 'Home/view_berita/$1';
