<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'front-end/Index_ctr/index';
// $route['default_controller'] = 'front-end/Index_ctr/coming_soon';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


/****************       front-end       *********************/ 


$route['Login']                         = 'front-end/Login_ctr'; 
$route['LoginMe']                       = 'front-end/Login_ctr/loginMe'; 
$route['Logout']                        = 'front-end/Login_ctr/logout'; 
$route['index']                         = 'front-end/Index_ctr/index'; 
// $route['index']                         = 'front-end/Index_ctr/coming_soon'; 
$route['promotion']                     = 'front-end/Promotion_ctr/index'; 
$route['promotion-single']              = 'front-end/Promotion_ctr/promotion_single'; 
$route['contact']                       = 'front-end/Contact_ctr/index'; 
$route['contact_com']                   = 'front-end/Contact_ctr/Contacr_com'; 

$route['Resturant']                     = 'front-end/Resturant_ctr'; 
$route['Food']                          = 'front-end/Food_ctr'; 
$route['Register']                      = 'front-end/Register_ctr'; 
$route['Register_success']              = 'front-end/Register_ctr/register_success'; 
$route['Profile']                       = 'front-end/Profile_ctr'; 
$route['my_profile_save']               = 'front-end/Profile_ctr/my_profile_save'; 
$route['user_authentication']           = 'front-end/User_authentication';
$route['logout_facebook']               = 'front-end/User_authentication/logout';
$route['OrderList']                     = 'front-end/Profile_ctr/order_list';
$route['OrderDetail']                   = 'front-end/Profile_ctr/order_detail';
$route['Food_Resturant']                = 'front-end/Resturant_ctr/food';
$route['Order_User']                    = 'front-end/Resturant_ctr/order';
$route['Cart']                          = 'front-end/Resturant_ctr/cart';
$route['save_cart']                     = 'front-end/Resturant_ctr/save_cart';
$route['delet_cart']                    = 'front-end/Resturant_ctr/delet_cart';
$route['destroy_cart']                  = 'front-end/Resturant_ctr/destroy_cart';
$route['add_cart']                      = 'front-end/Resturant_ctr/add_cart';
$route['update_cart']                   = 'front-end/Resturant_ctr/update_cart';
$route['total_cart_item']               = 'front-end/Resturant_ctr/total_cart_item';
$route['total_cart']                    = 'front-end/Resturant_ctr/total_cart';
$route['sendemail']                     = 'front-end/Sendemail_ctr';
$route['send']                          = 'front-end/Sendemail_ctr/send';
$route['checkCoupon']                   = 'front-end/Resturant_ctr/checkCoupon';
$route['newTotal']                      = 'front-end/Resturant_ctr/newTotal';

/****************       back-end       *********************/ 
$route['Admin_Login']                   = 'back-end/AdminLogin_ctr';
$route['Admin_Login_suss']              = 'back-end/AdminLogin_ctr/admin_loginMe';
$route['Admin_Logout']                  = 'back-end/AdminLogin_ctr/admin_logout';
$route['Forgot_Password_Admin']         = 'back-end/AdminLogin_ctr/forgot_password'; 
$route['Admin_Order']                   = 'back-end/AdminOrder_ctr'; 
$route['Admin_Order_status']            = 'back-end/AdminOrder_ctr/status_order'; 
$route['Admin_Order_rider']             = 'back-end/AdminOrder_ctr/rider_order'; 
$route['Admin_Order_vat']             = 'back-end/AdminOrder_ctr/vat_order'; 
$route['Admin_Rider']                   = 'back-end/AdminRider_ctr'; 
$route['Admin_Rider_com']               = 'back-end/AdminRider_ctr/rider_add_com'; 
$route['Admin_Rider_edit_com']          = 'back-end/AdminRider_ctr/rider_edit_com'; 
$route['Admin_Rider_delete']            = 'back-end/AdminRider_ctr/delete_rider'; 
$route['Admin_Rider_status']            = 'back-end/AdminRider_ctr/status_rider'; 
$route['Admin_Restaurant']              = 'back-end/AdminRestaurant_ctr'; 
$route['Restaurant_add_com']            = 'back-end/AdminRestaurant_ctr/restaurant_add_com'; 
$route['Restaurant_edit_com']            = 'back-end/AdminRestaurant_ctr/restaurant_edit_com'; 
$route['status_restaurant']             = 'back-end/AdminRestaurant_ctr/status_restaurant'; 
$route['Admin_Restaurant_com']          = 'back-end/AdminRestaurant_ctr/type_restaurant_com'; 
$route['Admin_Restaurant_edit_com']     = 'back-end/AdminRestaurant_ctr/edit_type_food_restaurant'; 
$route['delete_type_food_restaurant']     = 'back-end/AdminRestaurant_ctr/delete_type_food_restaurant'; 
$route['delete_restaurant']             = 'back-end/AdminRestaurant_ctr/delete_restaurant'; 
$route['Admin_Type_Food']               = 'back-end/AdminTypeFood_ctr'; 
$route['Admin_Type_Food_com']           = 'back-end/AdminTypeFood_ctr/type_food'; 
$route['delete_type_food']              = 'back-end/AdminTypeFood_ctr/delete_type_food'; 
$route['edit_type_food']                = 'back-end/AdminTypeFood_ctr/edit_type_food'; 
$route['Admin_Type_Restaurant']         = 'back-end/AdminRestaurant_ctr/type_restaurant'; 
$route['Admin_Type_Food_Restaurant']    = 'back-end/AdminRestaurant_ctr/type_food'; 
$route['Admin_Food']                    = 'back-end/AdminFood_ctr'; 
$route['food_add_com']                  = 'back-end/AdminFood_ctr/food_add_com'; 
$route['food_edit_com']                 = 'back-end/AdminFood_ctr/food_edit_com'; 
$route['delete_food']                   = 'back-end/AdminFood_ctr/delete_food'; 
$route['Admin_Blog_Promotion']          = 'back-end/AdminBlog_ctr/promotion'; 
$route['Admin_Blog_Promotion_Add']      = 'back-end/AdminBlog_ctr/add_promotion'; 
$route['promotion_add_com']             = 'back-end/AdminBlog_ctr/promotion_add_com'; 
$route['Admin_Blog_Comment']            = 'back-end/AdminBlog_ctr/comment'; 
$route['Admin_Profile']                 = 'back-end/AdminLogin_ctr/profile'; 
$route['adminEdit_profile']             = 'back-end/AdminLogin_ctr/editProfile'; 
$route['Rider_edit']                    = 'back-end/AdminOrder_ctr/rider_edit'; 
$route['coupon']                        = 'back-end/AdminRestaurant_ctr/coupon'; 
$route['coupon_com']                    = 'back-end/AdminRestaurant_ctr/coupon_com'; 
$route['edit_coupon_com']               = 'back-end/AdminRestaurant_ctr/edit_coupon_com'; 
$route['delete_coupon']                 = 'back-end/AdminRestaurant_ctr/delete_coupon'; 
$route['status_show_contact']           = 'back-end/AdminBlog_ctr/status_show_contact'; 
$route['status_show_restaurant']        = 'back-end/AdminRestaurant_ctr/status_show_restaurant'; 
$route['status_show_food']              = 'back-end/AdminRestaurant_ctr/status_show_food'; 
// 