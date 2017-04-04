<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller']    = 'Dashboard_controller/reservas';
$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;

$route['login']                 = "Login_controller";
$route['reservas']              = 'Dashboard_controller/reservas';
$route['search']                = 'Dashboard_controller/search';
$route['setReserva']            = 'Dashboard_controller/setReserva';

$route['user_login_process']    = 'Login_controller/user_login_process';
$route['logout']                = 'Login_controller/logout';

