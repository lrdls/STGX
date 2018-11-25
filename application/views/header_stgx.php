<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STORYGRAPH</title>
  <link rel="icon" type="image/png" href="<?= base_url('/assets/images/favicon.png') ?>" />
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style>

html, body {

height: 100% !important;
width: 100% !important;
overflow: none !important;
padding: 0 !important;
margin: 0 !important;
}

.iframe_stgx, #id_header, #site-content {

padding: 0 !important;
margin: 0 !important;
overflow: none !important;
}

  </style>
</head>
<body style="margin:0px;padding:0px;overflow:hidden;background-color:black;">

	<header id="site-headerX" style="margin:0px;padding:0px;overflow:hidden;border:0; border-radius:0;display:none;">
		<nav class="navbar navbar-default" role="navigation"  style="margin:0px;padding:0px;overflow:hidden;border:0;border-radius:0;">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= base_url() ?>">STORYGRAPH</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
							<li><a href="<?= base_url('logout') ?>">Logout</a></li>
						<?php else : ?>
							<li><a href="<?= base_url('register') ?>">Register</a></li>
							<li><a href="<?= base_url('login') ?>">Login</a></li>
						<?php endif; ?>
					</ul>
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	<main id="site-contentX" role="main" style="background-color:yellow;height:100%;margin:0;padding:0;">
		
<!-- 		<?php if (isset($_SESSION)) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php var_dump($_SESSION); ?>
					</div>
				</div>
			</div>
		<?php endif; ?> -->
		
    <iframe class="iframe_stgx" 
    src="<?php echo base_url( 'cytoscape' ) ?>" 
    frameborder="0" scrolling="no" 
    style="overflow:hidden;height:100%;width:100%" 
    height="100%" width="100%"  
    onload="resizeIframe(this);"
    >
  </iframe>
    
    

