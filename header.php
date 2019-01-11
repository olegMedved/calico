<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
				content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
 

 	<?php wp_head() ?>
 	
 	
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri() ?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri() ?>/img/favicon-16x16.png">
	<link rel="manifest" href="<?php echo get_template_directory_uri() ?>/img/site.webmanifest">
	<link rel="mask-icon" href="<?php echo get_template_directory_uri() ?>/img/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#28bdb0">
	<meta name="theme-color" content="#ffffff">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body <?php body_class() ?>>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="header clearfix">
					<div class="logo">
						<a href="<?php echo home_url() ?>"><img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt=""></a>
					</div>
					<div class="top-menu">
						<a href="#"><span></span></a>
						<?php  al_main_menu('Main Menu', "sub-menu")  ?>
						 
					</div>
				</div>
			</div>
		</div>
	</header>


