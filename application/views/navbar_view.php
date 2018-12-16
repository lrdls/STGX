<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php
$base_url  =  "http://".$_SERVER['HTTP_HOST'];
$base_url .= preg_replace('@/+$@', '', dirname($_SERVER['SCRIPT_NAME'])).'/';


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STORYGRAPH</title>
<!-- 	<link rel="icon" type="image/png" href="<?php echo $base_url;?>assets/images/favicon.png" />
	<link rel="icon" href="<?php echo $base_url;?>assets/images/favicon.png" type="image/png">
	<link rel="icon" href="<?php echo $base_url;?>assets/images/favicon.ico" /> -->
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">


<style>
body, html {
	background-image:url("<?= base_url('assets/images/bg_home.png') ?>");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
	background-size: cover;
	margin: 0;
	padding: 0;
/*     opacity: 0.2;
    filter:alpha(opacity=20); */
}


html {
	margin: 0;
	padding: 0;
	width: 100%;
	height: 100%;
}


</style>
</head>
<body>

	<header id="site-header header-home" style="padding:0;margin:0;">
		<nav class="navbar navbar-default header-home" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">

					<a class="navbar-brand" href="<?php echo $base_url;?>">STORYGRAPH</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">

							<li><a href="<?php echo $base_url;?>/index.php/Home/Register">Register</a></li>
							<li><a href="<?php echo $base_url;?>/index.php/Home/Login">Login</a></li>
		
					</ul>
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<main id="site-content" role="main">
		
<!-- 		<?php if (isset($_SESSION)) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php var_dump($_SESSION); ?>
					</div>
				</div>
			</div>
		<?php endif; ?> -->
		
