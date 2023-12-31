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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'beranda';
// $route['auth'] = 'error_page';
$route['admin'] = 'admin/beranda';
$route['profil'] = 'profil/ubah';
$route['gantipassword'] = 'profil/ganti_password';
$route['login'] = 'auth';
$route['registrasi'] = 'auth/registrasi';
$route['logout'] = 'auth/logout';
$route['status'] = 'lamaran';
$route['riwayat'] = 'riwayat';
$route['search'] = 'beranda/search';
$route['status/detail/(:any)/(:any)'] = 'lamaran/read/$1/$2';
$route['riwayat/detail/(:any)'] = 'riwayat/read/$1';
$route['detail/(:any)/(:any)'] = 'loker/read/$1/$2';
$route['applyloker/(:any)'] = 'lamaran/apply/$1';
// admin
$route['loginadmin'] = 'admin/auth';
$route['regisadmin'] = 'admin/auth/registrasi';
$route['logoutadmin'] = 'admin/auth/logout';
$route['admin/dataloker/(:any)/(:any)'] = 'admin/lamaran/lamaran/$1/$2';
$route['admin/dataloker/detail/(:any)/(:any)'] = 'admin/lamaran/detail_pelamar/$1/$2';
$route['404_override'] = 'errors/custom_404';

$route['translate_uri_dashes'] = FALSE;
