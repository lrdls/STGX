<?php
@session_start();
$token = "";

if(!isset($_GET['token'])) {
  //echo "no token";
  //exit;
} else {
  $token = $_GET['token'];
  //echo $token;
}

?>
<!DOCTYPE html>
<html>
  <head>
    <META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css">
		<title>Storygraph</title>
    <?php
      $base_url = base_url()."assets/_storygraph";
      require_once($base_url."/head.php");
    ?>

    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/stgx/split-pane.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/stgx/pretty-split-pane.css" />
    <!-- http://dreamchain.com/static/split-pane/fixed-left.html -->
    <script src="<?php echo base_url() ?>assets/js/stgx/split-pane.js"></script>

		<style type="text/css">


			html, body {
				height: 100%;
				min-height: 100%;
				margin: 0;
        padding: 0;
       /*  overflow: hidden; */

      -webkit-user-select: none; /* Chrome all / Safari all */
      -o-user-select: none;
      user-select: none;
      -webkit-touch-callout:none;
      overflow: hidden;

			}
			.split-pane-divider {
				background: #aaa;
			}
			#left-component {
        width: 90em;
        /* overflow:hidden; */
			}
			#my-divider {
				left: 90em; /* Same as left component width */
				width: 5px;
			}
			#right-component {
				left: 90em;  /* Same as left component width */
        margin-left: 5px;  /* Same as divider width */
        /* overflow:hidden; */
			}
		</style>
		<script>
			$(function() {
				$('div.split-pane').splitPane();
			});
		</script>
	</head>




<body oncontextmenu="return false;">


    <?php
      $base_url = base_url()."assets/_storygraph";
      // require_once($base_url."/navbar.php");
    ?>


<!-- 		<div class="split-pane fixed-left">
			<div class="split-pane-component" id="left-component">
				This is the left component
			</div>
			<div class="split-pane-divider" id="my-divider"></div>
			<div class="split-pane-component" id="right-component">
				This is the right component
                <button onclick="$('div.split-pane').splitPane('firstComponentSize', 0);">Collapse first component</button>
			</div>
		</div> -->


<iframe src="<?php echo base_url() ?>/assets/_storygraph/index.php?token=<?php echo $_SESSION['token'] ?>" width="100%" height="100%" class="iframe-stgx" scrolling="no"  marginwidth="0" paddingwidth="0" frameborder="0" border="0" styleX="border:1px solid yellow;">



<!--   <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/home.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/storygraph.css">
    
<script type="text/javascript" src="<?php echo $base_url;?>/js/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>/js/cytoscape.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>/js/dagre.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>/js/cytoscape-dagre.js"></script>


  <script type="text/javascript" src="<?php echo $base_url;?>/js/cytoscape.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>/js/dagre.min.js"></script>
  <script type="text/javascript" src="<?php echo $base_url;?>/js/cytoscape-dagre.js"></script>
 -->

<script>






$(document).ready(function(){

/* $('#left-component').load('<?php echo base_url() ?>assets/_storygraph/index.php?token=<?php echo $token ?>');

$('#right-component').load('<?php echo base_url() ?>assets/_storygraph/menu_bin.php?token=<?php echo $token ?>')
 */
});

</script>

<!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/stgx/global_fcts.js"  type="text/javascript"></script>
 -->


	</body>
</html>