<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'Processors';
$route['homepage']='Processors/homepage';
$route['login']='Processors/login_page';
$route['register']='Processors/register_page';
$route['ourteam']='Processors/ourteam_page';

$route['sign_up'] = 'Processors/sign_up';
$route['sign_in'] = 'Processors/sign_in';
$route['process'] = 'Processors/process';
$route['is_valid'] = 'Processors/is_valid';
$route['log_out'] = 'Processors/log_out';
$route['show_users'] = 'Processors/show_users';
$route['change_status'] = 'Processors/change_status';
$route['edit_profile'] = 'Processors/edit_profile';
$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;
