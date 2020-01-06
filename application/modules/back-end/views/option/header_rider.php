<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>deejungdelivery.com</title>
    <link rel="apple-touch-icon" href="public/backend/app-assets/images/ico/apple-icon-120.png">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="public/backend/app-assets/images/ico/favicon.ico"> -->
    <link rel="shortcut icon" type="image/x-icon" href="public/backend/app-assets/images/logo/deejung.jpg">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="public/backend/app-assets/css/plugins/forms/validation/form-validation.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="public/backend/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/backend/assets/css/newstyle.css">
    <link href="public/backend/assets/fileupload/css/uploads.css" rel="stylesheet" type="text/css" /> 
    <!-- END: Custom CSS-->


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>


                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        
                        <?php $user = $this->db->get_where('tbl_rider', ['username' => $this->session->userdata('username')])->row_array() ?>
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $user['username'] ?></span></div><span><img class="round" src="uploads/rider/<?php echo $user['file_name'];  ?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- <a class="dropdown-item" href="Admin_Profile"><i class="feather icon-user"></i> Edit Profile</a> -->
                                <!-- <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item" href="Admin_Logout"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <ul class="main-search-list-defaultlist d-none">
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Files</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="public/backend/app-assets/images/icons/xls.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;17kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="public/backend/app-assets/images/icons/jpg.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;11kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="public/backend/app-assets/images/icons/pdf.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
                <div class="d-flex">
                    <div class="mr-50"><img src="public/backend/app-assets/images/icons/doc.png" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                    </div>
                </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
            </a></li>
        <li class="d-flex align-items-center"><a class="pb-25" href="#">
                <h6 class="text-primary mb-0">Members</h6>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="public/backend/app-assets/images/portrait/small/avatar-s-8.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="public/backend/app-assets/images/portrait/small/avatar-s-1.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="public/backend/app-assets/images/portrait/small/avatar-s-14.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing Manager</small>
                    </div>
                </div>
            </a></li>
        <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
                <div class="d-flex align-items-center">
                    <div class="avatar mr-50"><img src="public/backend/app-assets/images/portrait/small/avatar-s-6.jpg" alt="png" height="32"></div>
                    <div class="search-data">
                        <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                    </div>
                </div>
            </a></li>
    </ul>
    <ul class="main-search-list-defaultlist-other-list d-none">
        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100 py-50">
                <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No results found.</span></div>
            </a></li>
    </ul>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="https://deejungdelivery.com/">
                        
                        <h2 class="brand-text mb-0">deejungdelivery</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <!-- <li class=" nav-item"><a href="index.html"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                    <ul class="menu-content">
                        <li><a href="dashboard-analytics.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Analytics</span></a>
                        </li>
                        <li><a href="dashboard-ecommerce.html"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="eCommerce">eCommerce</span></a>
                        </li>
                    </ul>
                </li> -->
                
                <li class=" navigation-header"><span>Menu</span>
                </li>

                <li class="<?php if($this->uri->segment(1)=="Admin_Order"){echo 'active';}?>"><a href="Admin_Order_rider"><i class="feather icon-package"></i><span class="menu-item" data-i18n="List View">รายการอาหารล่าสุด</span></a>
                </li>

                <!-- <li class="nav-item <?php if($this->uri->segment(1)=="Admin_Rider"){echo 'active';}?>"><a href="Admin_Rider"><i class="fa fa-motorcycle"></i><span class="menu-title" data-i18n="Data List">Rider List</span></a>
                </li>
                
                <li class="<?php if($this->uri->segment(1)=="Admin_Restaurant" || $this->uri->segment(1) == "Admin_Type_Food_Restaurant" || $this->uri->segment(1) == "Admin_Food"){echo 'active';}?>"><a href="Admin_Restaurant"><i class="fa fa-cutlery"></i><span class="menu-item" data-i18n="List View">ร้านอาหาร</span></a>
                </li>

                <li class="<?php if($this->uri->segment(1)=="Admin_Type_Restaurant"){echo 'active';}?>"><a href="Admin_Type_Restaurant"><i class="fa fa-list-ol"></i><span class="menu-item" data-i18n="List View">ประเภทร้านอาหาร</span></a>
                </li>

                <li class="<?php if($this->uri->segment(1)=="Admin_Type_Food"){echo 'active';}?>"><a href="Admin_Type_Food"><i class="fa fa-list-ol"></i><span class="menu-item" data-i18n="List View">ประเภทอาหาร</span></a>
                </li> -->

                <!-- <li class=" nav-item"><a href="#"><i class="feather icon-list"></i><span class="menu-title" data-i18n="Data List">บล๊อก</span></a>
                    <ul class="menu-content">
                        <li class="<?php if($this->uri->segment(1)=="Admin_Blog_Promotion" || $this->uri->segment(1)=="Admin_Blog_Promotion_Add"){echo 'active';}?>">
                            <a href="Admin_Blog_Promotion">
                                <i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">โปรโมชั่น</span>
                            </a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="Admin_Blog_Comment"){echo 'active';}?>">
                            <a href="Admin_Blog_Comment">
                                <i class="feather icon-circle"></i><span class="menu-item" data-i18n="List View">ความคิดเห็นจากลูกค้า</span>
                            </a>
                        </li> -->
                    </ul>
                </li>
                

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
