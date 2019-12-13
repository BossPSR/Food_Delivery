<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'front-end/Index_ctr/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/****************       front-end       *********************/ 


$route['Login']         = 'front-end/Login_ctr'; 
$route['LoginMe']         = 'front-end/Login_ctr/loginMe'; 
$route['Logout']         = 'front-end/Login_ctr/logout'; 
$route['index']         = 'front-end/Index_ctr/index'; 
$route['blog']          = 'front-end/Blog_ctr/index'; 
$route['blog-single']   = 'front-end/Blog_ctr/blog_single'; 
$route['contact']       = 'front-end/Contact_ctr/index'; 

$route['Resturant']       = 'front-end/Resturant_ctr'; 
$route['Food']       = 'front-end/Food_ctr'; 