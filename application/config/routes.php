<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Dashboard_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['reservas'] = 'Dashboard_controller/reservas';
$route['search'] = 'Dashboard_controller/search';
$route['getReservas'] = 'Dashboard_controller/getReservas';
$route['setReserva'] = 'Dashboard_controller/setReserva';

