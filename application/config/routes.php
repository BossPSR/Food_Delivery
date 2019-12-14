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
$route['contact_com']       = 'front-end/Contact_ctr/Contacr_com'; 

$route['Resturant']       = 'front-end/Resturant_ctr'; 
$route['Food']            = 'front-end/Food_ctr'; 
$route['Register']        = 'front-end/Register_ctr'; 
$route['Register_success']        = 'front-end/Register_ctr/register_success'; 
$route['Profile']         = 'front-end/Profile_ctr'; 
$route['my_profile_save']         = 'front-end/Profile_ctr/my_profile_save'; 





/****************       back-end       *********************/ 
$route['Admin_Login']                   = 'back-end/AdminLogin_ctr';
$route['Forgot_Password_Admin']         = 'back-end/AdminLogin_ctr/forgot_password'; 
$route['Admin_Order']                   = 'back-end/AdminOrder_ctr'; 