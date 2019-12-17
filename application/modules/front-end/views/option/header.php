<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<meta name="author" content="Egprojets">
	<meta name="description" content="" />
	<title>Food Lover HTML</title>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	
	<!-- Google Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald:400,700,300" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" />
	<!-- End Google Fonts -->

	<!-- Contribute CSS Files -->
	<link rel="stylesheet" href="public/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="public/assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="public/assets/css/flaticon.css" />
	<!-- Contribute End CSS Files -->

	<!-- Custom CSS Files -->
	<link rel="stylesheet" href="public/assets/css/style.css" />
	<link rel="stylesheet" href="public/assets/css/responsive.css" />
	<link rel="stylesheet" href="public/assets/css/newstyle.css" />
	<link rel="stylesheet" href="public/assets/css/newresponsive.css" />
	<!-- Custom CSS Files -->


</head>

<body>
	
	<!-- Loader Bloc -->
	<div class="site-loader">
		<div class="loading"></div>
	</div>
	<!-- End Loader Bloc -->

	<!-- Site Wrapper -->
	<div id="site-wrapper">
		<!-- Header -->
		<header id="site-header">
			<div class="nav-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ul>
								<li><i class="fa fa-envira"></i>Open hour - 10 am - 11 pm</li>
								<li><i class="fa fa-phone"></i>+00 123 456 789 000</li>
								<li><a href=""><i class="fa fa-envelope"></i>support@example.com</a></li>
								<li class="social-bloc">
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-google-plus"></i></a>
									<a href="#"><i class="fa fa-skype"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="navbar" role="navigation">
				<div class="container">
					<div class="row">
						
						<button data-target=".navbar-collapse" data-toggle="collapse" type="button" class="menu-mobile visible-xs">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<ul class="nav navbar-nav navbar-collapse collapse">
							<li><a href="index">หน้าแรก</a></li>
							<li><a href="Resturant">ร้านอาหาร</a></li>
							<li><a href="Food">อาหาร</a></li>
							<li><a href="blog">บล็อก</a></li>
							<li><a href="contact">ติดต่อเรา</a></li>	
						<?php $user = $this->db->get_where('tbl_member', ['email' => $this->session->userdata('email')])->row_array() ?>
						<?php $facebook_log = $this->db->get_where('users',['email'=> $this->session->userData['email']])->row_array(); ?>
                             <?php if ($user == true ) :  ?>

							<li><a href="Profile"><?php echo $user['first_name'].' '.$user['last_name'] ?></a></li>
							<li><a href="Logout">ล็อกเอาท์</a></li>
							<?php elseif ($facebook_log == true) : ?>
							<li><a href="Profile"><?php echo $facebook_log['first_name'].' '.$facebook_log['last_name'] ?></a></li>
							<li><a href="logout_facebook">ล็อกเอาท์</a></li>
							<?php else : ?>
							<li><a href="Register">สมัครสมาชิก</a></li>
							<li><a href="user_authentication">ล็อกอิน</a></li>
							<?php endif  ?>
						</ul>
					</div>
				</div>
			</div>
		</header>
		
		<!-- End Header -->