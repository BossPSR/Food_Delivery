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
$route['user_authentication'] = 'front-end/User_authentication';
$route['logout_facebook'] = 'front-end/User_authentication/logout';




/****************       back-end       *********************/ 
$route['Admin_Login']                   = 'back-end/AdminLogin_ctr';
$route['Admin_Login_suss']              = 'back-end/AdminLogin_ctr/admin_loginMe';
$route['Admin_Logout']                  = 'back-end/AdminLogin_ctr/admin_logout';
$route['Forgot_Password_Admin']         = 'back-end/AdminLogin_ctr/forgot_password'; 
$route['Admin_Order']                   = 'back-end/AdminOrder_ctr'; 
$route['Admin_Rider']                   = 'back-end/AdminRider_ctr'; 
$route['Admin_Rider_com']               = 'back-end/AdminRider_ctr/rider_add_com'; 
$route['Admin_Rider_edit_com']          = 'back-end/AdminRider_ctr/rider_edit_com'; 
$route['Admin_Rider_delete']            = 'back-end/AdminRider_ctr/delete_rider'; 
$route['Admin_Rider_status']            = 'back-end/AdminRider_ctr/status_rider'; 
$route['Admin_Restaurant']              = 'back-end/AdminRestaurant_ctr'; 
$route['Restaurant_add_com']              = 'back-end/AdminRestaurant_ctr/restaurant_add_com'; 
$route['status_restaurant']              = 'back-end/AdminRestaurant_ctr/status_restaurant'; 
$route['Admin_Restaurant_com']          = 'back-end/AdminRestaurant_ctr/type_restaurant_com'; 
$route['Admin_Restaurant_edit_com']     = 'back-end/AdminRestaurant_ctr/edit_type_food_restaurant'; 
$route['delete_restaurant']             = 'back-end/AdminRestaurant_ctr/delete_restaurant'; 
$route['Admin_Type_Food']               = 'back-end/AdminTypeFood_ctr'; 
$route['Admin_Type_Food_com']           = 'back-end/AdminTypeFood_ctr/type_food'; 
$route['delete_type_food']              = 'back-end/AdminTypeFood_ctr/delete_type_food'; 
$route['edit_type_food']                 = 'back-end/AdminTypeFood_ctr/edit_type_food'; 
$route['Admin_Type_Restaurant']         = 'back-end/AdminRestaurant_ctr/type_restaurant'; 
$route['Admin_Type_Food_Restaurant']    = 'back-end/AdminRestaurant_ctr/type_food'; 
$route['Admin_Food']                    = 'back-end/AdminFood_ctr'; 
$route['Admin_Blog_Promotion']          = 'back-end/AdminBlog_ctr/promotion'; 
$route['Admin_Blog_Promotion_Add']      = 'back-end/AdminBlog_ctr/add_promotion'; 
$route['Admin_Blog_Comment']            = 'back-end/AdminBlog_ctr/comment'; 
$route['Admin_Profile']                 = 'back-end/AdminLogin_ctr/profile'; 

// 