<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['getReservas'] = 'Dashboard_controller/getReservas';
$route['getUsers'] = 'Dashboard_controller/getUsers';
