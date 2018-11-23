<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>STORYGRAPH</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Courgette:400,700">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">


	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

<style>
body {
  display: flex;
/*   justify-content: center;
  align-items: center;
  min-height: 100vh; */
}

headerX {
/*     min-height: 400px; */
    width: 100%;
/*     min-width: 600px; */
    background: #fff;
    padding: 0px;
	margin:0;
    border-radius: 5px;
    box-shadow: 5px 55px 50px -20px #b6b6b6; 
}

ul {
  padding: 0;
  list-style: none;
}


/* ============================
    Twitter
   ============================
*/

.twitter {
  display: flex;
}

.twitter__bird {
  margin-left: auto;
  margin-right: auto/*this will push aside the other flex-items and the bird takes the remaining space!*/
} 

/*
  UI cleanups for the twitter navigation. This just makes things look good on the eye 😎
*/

.twitter {
  border: 1px solid red;
  height: 46px;
  align-items: center;
  padding: 0 10px;
  border: 1px solid rgba(238,238,238 ,1);
  border-radius: 5px;
  color: rgba(117,117,117 ,1);
  box-shadow: 5px 10px 20px -20px rgba(85,172,238 ,1);
}
.twitter li {
  cursor: pointer;
}
.twitter li:hover{
  color: rgba(85,172,238 ,1);
}
.twitter__bird {
  color: rgba(85,172,238 ,1);
  font-size: 1.3em;
}
.twitter li:not(:last-child):not(.twitter__bird) {
  margin-right: 10px;
}
.twitter li  i:not(.fa-twitter):not(.fa-search):not(.fa-user-circle-o) {
  margin-right: 3px;
}
.twitter li > button {
  font-size: 0.8em;
  border: 0;
  background: rgba(85,172,238 ,1);
  color: #fff;
  border-radius: 100px;
}





/* ============================
    Facebook
   ============================
*/
.facebook {
  display: flex;
}

.facebook__search {
  margin-right: auto;
}
/*
  UI cleanups for the facebook navigation. Let's make facebook great again :-) 
*/
.facebook {
  border: 1px solid red;
  height: 46px;
  align-items: center;
  padding: 0 10px;
  border: 1px solid rgba(238,238,238 ,1);
  border-radius: 5px;
  background: rgba(59,89,153 ,1);
  color: #fff;
  font-size: 0.9em;
  box-shadow: 5px 10px 20px -20px rgba(59,89,153 ,1)
}

.facebook__brand  i{
  font-size: 1.5em;
}
.facebook li:not(:last-child):not(:first-child):not(.facebook__search) {
  margin-right: 10px;
}

</style>


</head>
<body>



	<header id="site-header">
		<nav class="navbar navbar-default" role="navigation">
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

	<main id="site-content" role="main">
		
		<?php if (isset($_SESSION)) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php var_dump($_SESSION); ?>
					</div>
				</div><!-- .row -->
			</div><!-- .container -->
		<?php endif; ?>


