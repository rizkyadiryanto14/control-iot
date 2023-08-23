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
