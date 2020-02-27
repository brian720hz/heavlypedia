<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?php echo $title ?></title>
	<meta name="description" content="<?php echo $description ?>"> 
	<meta name="keywords" content="<?php echo $keywords ?>">

	<!-- Favicons-->
	<link rel="shortcut icon" href="<?php echo base_url()?>assets/frontend/img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url()?>assets/frontend/img/apple-touch-icon-144x144-precomposed.png">
    
    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">
    
	<!-- BASE CSS -->
	<link href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/menu.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/vendors.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/frontend/css/icon_fonts/<?php echo base_url()?>assets/frontend/css/all_icons_min.css" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="<?php echo base_url()?>assets/frontend/css/custom.css" rel="stylesheet">

</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
	<!-- header -->
        <?php $this->load->view('Frontend/V_header') ?>
    <!-- end header -->
	
	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login">
					<h1>Login to Heavlypedia</h1>
					<div id="notifications"><?php echo $this->session->flashdata('pesan'); ?></div>
					<div class="box_form">
						<form method="POST" action="<?php echo site_url('Login/login_akun')?>">
							<div class="form-group">
								<input type="text" name="username" class="form-control" placeholder="Masukan Username">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" placeholder="Masukan Password" name="password" id="password">
							</div>
							<a href=""><small>Forgot password?</small></a>
							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" type="submit" value="Login">
							</div>
						</form>
					</div>
					<p class="text-center link_bright">Do not have an account yet? <a href="<?php echo site_url('Register');?>"><strong>Register now!</strong></a></p>
				</div>
				<!-- /login -->
			</div>
		</div>
	</main>
	<!-- /main -->
	
	<!-- footer -->
        <?php $this->load->view('Frontend/V_footer') ?>
    <!-- end footer -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="<?php echo base_url()?>assets/frontend/js/jquery-2.2.4.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/js/common_scripts.min.js"></script>
	<script src="<?php echo base_url()?>assets/frontend/js/functions.js"></script>
     


</body>
</html>