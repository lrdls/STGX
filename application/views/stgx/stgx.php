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

	<!-- css -->

<link href="<?= base_url('assets/bootstrap-3.3.7/css/bootstrap.min.css') ?>" rel="stylesheet">
<link href="<?= base_url('assets/bootstrap-3.3.7/fonts/font-awesome.min.css') ?>" rel="stylesheet">

<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
  
<script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script> 

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
<style>



/* some resets I like */
html {
	font-family: Arial, Helvetica, sans-serif !important;
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

html, body {
	font-family: Arial, Helvetica, sans-serif !important;
height: 100% !important;
width: 100% !important;
overflow: none !important;
padding: 0 !important;
margin: 0 !important;
}

form {
  display: flex;
  flex-wrap: wrap;
  width: 20%;
  margin: 0 auto;
}

input[type="search"] {
  border: none;
  whitespace: wrap;
  border-radius: 5px 5px 5px 5px;
	background: #E9E9E9;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
	padding: 0.35em 0.75em;
	border: none;
	font-size: 1.1em;
	text-decoration: none;
	line-height: normal;
	max-height: 3em;
  
  flex: 2 0 20%;
}

input[type="search"]:focus {
  background: Thistle;
  color: white;
  letter-spacing: .1em;
  transition: background 400ms ease-in-out;
  outline: none;
}


.btn.btn-primary {
  font-family: sans-serif ! important;
}

.btn.btn-primary:focus,
.btn.btn-primary:active,
.btn.btn-primary:hover {
  font-family: sans-serif ! important;
}

.btn:focus {
    background-color: red;
}

.btn {

/* font-family: Arial, Helvetica, sans-serif !important; */
font-family : inherit ! important;
font-family: sans-serif ! important;
    background-color: var(--grey-color2);
    border: 1px solid var(--grey-color1);;
    color: white;
    padding: 12px 16px;
    font-size: 16px;
    cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
	background-color: var(--blueViolet-color1);
}

button {
	font-family: Arial, Helvetica, sans-serif !important;
	font-family: sans-serif ! important;
	font: inherit;
	
}




ul{
	padding:0;
	margin:0;
}


	.flex-container {

font-family: Arial, Helvetica, sans-serif !important;

  background: var(--grey-color1); /* // green */
  display: flex;
  padding: 0px;
  margin: 0px;
  height: var(--height-navbar);
  .flex-item {

font-family: Arial, Helvetica, sans-serif !important;

/*     background: yellow; */
/*     padding: 20px;
    border: 2px solid whitesmoke; */
    word-break: break-all;
    flex-shrink: 1;  //default 1
    &.shrink-0 {
      flex-shrink: 0;      
    }    
    &.shrink-3 {
      flex-shrink: 3;
      
    }
    
    
    
    /*Not part of demonstration*/
    display: flex;
    p{
      color: red;
      margin: auto;
    }
  }
}



#menu {
	font-family: Arial, Helvetica, sans-serif !important;
position: relative;
font-size: 0.8em;
margin: 0;
padding: 0;
/* background-color: yellow; */
/* border-top: 1px solid #999; */
/* border-bottom: 1px solid #999; */
overflow: visible;
z-index: 2;
height: var(--height-navbar);

}


#menu ul {
	font-family: Arial, Helvetica, sans-serif !important;
position: relative;
margin: 0;
padding: 0;
list-style: none;
z-index: 3;
}

#menu li {
	font-family: Arial, Helvetica, sans-serif !important;
display: block;
width: 120px;
float: left;
/*     border-right: 1px solid #999; */
z-index: 4;
}

#menu a {
	font-family: Arial, Helvetica, sans-serif !important;
color: #ffffff;
font-weight: bold;
display: block;
text-align: center;
text-decoration: none;
text-transform: uppercase;
margin: 0;
padding: 10px 20px;
}

#menu a:hover {
	font-family: Arial, Helvetica, sans-serif !important;
color: #000000;
margin: 5px 10px;
padding: 5px 10px;
background-color: #C0C0C0;
border-radius: 10px;
}

#menu ul.sub-menu {
	font-family: Arial, Helvetica, sans-serif !important;
display: none;
position: relative;
}

#menu ul.sub-menu li {
	font-family: Arial, Helvetica, sans-serif !important;
width: 200px;
background-color: #C0C0C0;
border-width: 0 1px 1px 1px;
border-style: solid;
border-color: #666666;
}

#menu ul.sub-menu li a {
	font-family: Arial, Helvetica, sans-serif !important;
color: #000;
text-align: center;
margin: 5px 10px;
padding: 5px 10px;
}

#menu ul.sub-menu li a:hover {
	font-family: Arial, Helvetica, sans-serif !important;
color: snow;
background-color: #666666;
}

#menu li:hover ul.sub-menu {
	font-family: Arial, Helvetica, sans-serif !important;
display: block;
z-index: 90;
}


.fa-television{
    font-family: 'FontAwesome';
}

.fa-television:before {
    content: "\f26c";
}

  .search-box{
  height:49px;
  width:300px;
  margin:0;padding:0;
background-color: grey;
    -webkit-box-shadow: inset 0px 0px 27px -8px rgba(0,0,0,0.75);
    -moz-box-shadow: inset 0px 0px 27px -8px rgba(0,0,0,0.75);
    box-shadow: inset 0px 0px 27px -8px rgba(0,0,0,0.75);
    color: white;
  }


.search-box > .fa-searchX {
  position: absolute;
  top: 9px;
  left: 7px;
  font-size: 25px;
  color: white;
}

/* Bootstrap 3 text input with search icon */

.has-search .form-control-feedback {
    right: initial;
    left: 0;
	color: white;
	top: 18px;

}

.has-search .form-control {
    padding-right: 12px;
	padding-left: 34px;
	
}

</style>


</head>
<body style="background-color:blue;">













<div class="flex-container">



<!-- 	<div class="flex-item">
		<p>
		
	<button id="bt_close" class="btn" style="width:100%;" onclick="window.location='<?= base_url('logout') ?>'">
	
	<i class="fa fa-close"></i>

</button>
</p>
</div>
 -->

	<div id="menu" style="width:50px;"  class="flex-item shrink-3">
		
		<ul>

			<li>

<!-- 				<button class="btn"  style="width:100%;padding-right:130px;font-family: Arial, Helvetica, sans-serif !important;">
				<i class="fa fa-television"> &nbsp;My Projects</i></button> -->

<!-- 				<a href="#" class="btn"><span class="glyphicon glyphicon-book"></span>My Projects</a> -->

<button class="btn"  style="width:50px;height:50px;font-family: Arial, Helvetica, sans-serif !important;border-radius: 50%;    text-align: center;
    text-decoration: none;">
<span class="fa fa-close"></span></button>


				<ul class="sub-menu">
					<li><a href="">Help</a></li>
					<li><a href="">Parametres</a></li>
					<li><a href="">Logout</a></li>
				</ul>
			</li>

		</ul>
	</div>
	



 











<!--   <div class="flex-item"  style="padding-right:20px;"><p><button class="btn" style="width:100%;"><i class="fa fa-question-circle"></i></button></p></div>
   -->
 
 <!--  <div class="flex-item"><p><button class="btn" style="width:100%;"><i class="fa fa-cog"></i></button></p></div>
 -->













<!--  <div class="flex-item"   style="width:300px;">
 <p><button class="btn"  style="width:100%;"><i class="fa fa-television">My Projects</i></button></p>
 </div> -->




	<div id="menu" style="padding-right:100px;">
		
		<ul>

			<li>

<!-- 				<button class="btn"  style="width:100%;padding-right:130px;font-family: Arial, Helvetica, sans-serif !important;">
				<i class="fa fa-television"> &nbsp;My Projects</i></button> -->

<!-- 				<a href="#" class="btn"><span class="glyphicon glyphicon-book"></span>My Projects</a> -->

<button class="btn"  style="width:150px;font-family: Arial, Helvetica, sans-serif !important;">
<span class="fa fa-television"></span>&nbsp; My Projects</button>


				<ul class="sub-menu">
					<li><a href="">Create New Project</a></li>
					<li><a href="">Proj 1</a></li>
					<li><a href="">Proj 2</a></li>
				</ul>
			</li>

		</ul>
	</div>












  <div class="flex-item" style="width: 100%;">
<!--   <p>
<button class="btn" style="width:100%;"><i class="fa fa-toggle-right">&nbsp;Play this $Project</i></button>
  </p> -->

<button class="btn"  style="width:100%;font-family: Arial, Helvetica, sans-serif !important;">
<span class="fa fa-toggle-right"></span>&nbsp; Play this $Project</button>

  </div>



  <div class="flex-item shrink-3"><p>
	  
  <button class="btn" style="width:100%;"><i class="fa fa-save"></i></button>

  </p></div>

  <div class="flex-item"  style="padding-right:100px;"><p>
	  
  <button class="btn" style="width:100%;"><i class="fa fa-file-archive-o"></i></button>


  </p></div>




<!--   <div class="flex-item  shrink-3"   style="width:300px;margin-left:100px;"><p>

    <input type="text" class="search-box" 
           placeholder="Search">

  </p></div> -->


  <div class="form-group has-feedback has-search" style="width:300px;">
<!--     <span class="fa fa-search form-control-feedbackX"></span> -->
    <input type="text" class="form-control search-box" placeholder="Search">
  </div>








</div> 



















<?php if (isset($_SESSION)) : ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php var_dump($_SESSION); ?>
					</div>
				</div>
			</div>
    <?php endif; ?>


graph

<script>
	$('#bt_close').click(function(){
		console.log('k');
   // window.location.href='the_link_to_go_to.html';
   return false;
})
</script>