<?php
@session_start();

$system_path = 'system';
if (!defined('BASEPATH')) {
    // Path to the system directory
    define('BASEPATH', $system_path);
    define('ENVIRONMENT', 'production');
}

$name_app_folder = basename(dirname(dirname(__FILE__),2));
$www_root = $_SERVER['DOCUMENT_ROOT'].DIRECTORY_SEPARATOR.$name_app_folder; // /var/www/WEBSTG
$base_url = "http://".$_SERVER['HTTP_HOST']."/".$name_app_folder."/"."assets"."/"."_storygraph/"; // NO DIRECTORY_SEPARATOR important !!!!
require_once($www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR.'inc.php');


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<title>Frames</title>
		    <!-- http://dreamchain.com/static/split-pane/fixed-left.html -->
		<link rel="stylesheet" href="<?php echo $base_url ?>/css/stgx/split-pane.css" />
		<!-- The style sheet below is not part of the split-pane plugin. Feel free to use it, or style things your own way. -->
		<link rel="stylesheet" href="<?php echo $base_url ?>/css/stgx/pretty-split-pane.css" />
		<!-- <script src="jquery.min.js"></script> -->
		<script type="text/javascript" src="<?php echo $base_url ?>/js/jquery-2.1.4.min.js"></script>
		<script src="<?php echo $base_url ?>/js/stgx/split-pane.js"></script>

		<style type="text/css">

			:root {

			--right-component-width: 5%;

			}
			html, body {
				width: 100%;
				height: 100%;
				min-height: 100%;
				margin: 0;
				padding: 0;
				overflow:hidden;
			}
			#left-component {
				right: var(--right-component-width);
				margin: 0;
				padding: 0;
				margin-right: 5px;
			}
			#my-divider {
				right: var(--right-component-width);
				width: 5px;
			}
			#right-component {
				width: var(--right-component-width);
				margin: 0;
				padding: 0;
			}


			#footer 
			{
				position: fixed;
				left: 0;
				bottom: 0;
				width: 100%;
				background-color: black;
				color: #2F4F4F;
				text-align: left;
				height:14px;
				font-size:10px;
				font-family:arial;
				margin:0;
				padding:0;
			}
			#footer p
			{
				margin:0;
				margin-top:1px;
				padding:0;
				padding-left:5px;
				background-color: none;
				color: #2F4F4F;
				text-align: left;
				width: 100%;
			}


		</style>

		<script>
			$(function() {
				$('div.split-pane').splitPane();
				$('button:first').on('click', function() {
					$('div.split-pane').splitPane('lastComponentSize', 0);
				});
				$('button:last').on('click', function() {
					$('div.split-pane').splitPane('firstComponentSize', 0);
				});
			});
		</script>
	</head>
	<body>

		<div id="navbar" class="navbar" style="margin:0;padding:0;height:var(--navbar-btn-height);max-height:var(--navbar-btn-height);min-height:var(--navbar-btn-height);">
			<div  style="margin:0;padding:0;height:var(--navbar-btn-height);max-height:var(--navbar-btn-height);min-height:var(--navbar-btn-height);">
			Loading...
			</div>
		</div>

		<div class="pretty-split-pane-frame" style="background-color:yellow;padding:0;margin:0;overflow:hidden;position:absolute;top:var(--navbar-btn-height);"><!-- This div is added for styling purposes only. It's not part of the split-pane plugin. -->
			<div class="split-pane vertical-percent" style="background-color:green;padding:0;margin:0;overflow:hidden;">
				<div class="split-pane-component" id="left-component" style="background-color:blue;padding:0;margin:0;overflow:hidden;">
					Loading...
				</div>
				<div class="split-pane-divider" id="my-divider"></div>
				<div class="split-pane-component" id="right-component" style="background-color:red;padding:0;margin:0;overflow:hidden;">
					Loading...
				</div>
			</div>
		</div>

		<div id="footer" class="footer">
			<p>
			&copy; 2016-<?php echo date("Y");?> LRDS
			</p>
		</div>

	</body>


<script type="text/javascript">

console.clear();

window.onload = function(){

	var loaded = true;

	if (!window.jQuery){console.log('jQuery is NOT loaded!!!');var loaded = false;}
	if (window.jQuery){console.log('jQuery is loaded');}

    if (loaded == true){
		$('#navbar').load('<?php echo $base_url ?>navbar.php?token=<?php echo $token ?>');
		$('#right-component').load('<?php echo $base_url ?>menu_bin.php?token=<?php echo $token ?>')
		$('#left-component').load('<?php echo $base_url ?>stgx.php?token=<?php echo $token ?>'); // at the end

		$("#btn-navbar-param").click(function(){
		console.log('pm bt cl')
			$("#navbar-param").toggle();
		});

    }
    else
    {
        console.log('jQuery ARE NOT loaded!!!');
    }
}
</script>


</html>