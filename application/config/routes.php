<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['auth/login'] = 'Auth/Login';
$route['logout'] = 'Auth/logout';
$route['admin/dashboard'] = 'Backend/Dashboard';

$route['admin/chanel'] = 'Backend/Chanel';
$route['admin/insertChanel'] = 'Backend/Chanel/Insert';
$route['admin/channelStore'] = 'Backend/Chanel/Store';
$route['admin/chanelDetail/(:num)'] = 'Backend/Chanel/Detail/$1';
$route['admin/user'] = 'Backend/User';
$route['admin/tambah_user'] = 'Backend/User/insert';
$route['admin/delete_user'] = 'Backend/User/delete';
$route['insertChanel'] = 'Backend/Token/insertJson';
$route['backend/token_generate'] = 'Backend/Token/generate';
$route['admin/hapus_chanel'] = 'Backend/Chanel/delete_chanel';
$route['chart_data'] = 'Backend/Dashboard/chart_data';
$route['admin/token'] = 'Backend/Token';

$route['documentation'] = 'Documentation/Documentation';

$route['getchanel'] = 'Backend/Feeds';

//user
$route['user/dashboard'] = 'User/Dashboard';
$route['user/chanel'] = 'User/Chanel';
$route['user/insertChanel'] = 'User/Chanel/Insert';
$route['user/channelStore'] = 'User/Chanel/Store';
$route['user/hapus_chanel'] = 'User/Chanel/delete_chanel';
$route['user/chanelDetail/(:num)'] = 'User/Chanel/Detail/$1';
$route['user/grafik'] = 'User/Grafik';
$route['user/update_chanel'] = 'User/Chanel/update';
$route['user/grafikId/(:num)'] = 'User/Grafik/Grafik/$1';
$route['getJsonData/(:num)'] = 'User/Grafik/getJsonData/$1';

//settting
$route['setting']		= 'Setting/Umum';
$route['setting/add']	= 'Setting/store';
