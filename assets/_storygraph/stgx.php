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
//$path_projects = $www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR.'__projects'.DIRECTORY_SEPARATOR;
/* require_once($www_root.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'fcts_helper.php');
require_once($www_root.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'database.php'); */
require_once($www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR.'inc.php');

// sleep(2);

/* $current_project = "demo";
$user = "demo";
$project = $user."_".$current_project;

$current_json= $www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR."__projects".DIRECTORY_SEPARATOR.$project.DIRECTORY_SEPARATOR."localstorage_graph.json";
$arr_project = array();
$token = "";


 */

/* if(!isset($_GET['token'])) {
    echo "no token";
    array_push($arr_project,$project);
  } else {
      $token = $_GET['token'];
      $user = get_user($hostname, $username, $password, $database, $token);
      $_SESSION['user'] = $user;
      $arr_project = get_projects($hostname, $username, $password, $database, $token, $path_projects);
      $arr_last_json = getDirContents_json($user, $path_projects);
      $current_project = get_current_project($arr_last_json);
      $current_project = explode("_",$current_project)[1];
  }
  
  print_r($token);
  print_r("<br>---stgx");
  print_r($arr_project);
  print_r("<br>---stgx");
  print_r($user);
  print_r("<br>---stgx");
  print_r($current_project);
  print_r("<br>---stgx");
 // exit;
   */




?>



    <?php
      // require_once("head.php");
    ?>

<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/home.css">
<link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/storygraph.css">
    
<script type="text/javascript" src="<?php echo $base_url;?>/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>/js/jquery-ui.min.js"></script>


<!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.min.css"/>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" />
        <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" /> -->



<script type="text/javascript" src="<?php echo $base_url;?>/js/cytoscape.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>/js/dagre.min.js"></script>
<script type="text/javascript" src="<?php echo $base_url;?>/js/cytoscape-dagre.js"></script>



<style type="text/css">

:root{
  --width-menuLeft-stgx: 100px; 
  --width-container-stgx: calc(100% - var(--width-menuLeft-stgx) - 3vh); 
  --height-container-stgx: calc(100% - 3vh);

}

body,html {
  -webkit-user-select: none; /* Chrome all / Safari all */
  -o-user-select: none;
  user-select: none;
  -webkit-touch-callout:none;
  padding:0;
  margin:0;
  height: 100%;
  min-height: 100%;
  overflow: hidden;
}

.menuLeft_ST {
	position: fixed;
	left: 0px; 
/* 	top: 35px; */
	width: calc(15% + 1px);
	height:calc(100% - 55px);
	z-index: 8888;
	color: #999;
	padding: 10px;
	padding-top: 25px;
	margin: 0;
	bottom: 100px;
	background-color: var(--color-grey2);
/*   background-color:blue; */
/*   opacity: 0.8; */
	position:absolute;
	top:35px;

	max-width:var(--width-menuLeft-stgx);
	min-width:var(--width-menuLeft-stgx);
	padding:0;
	margin:0;
	height:100%;

}


.containerStgx{
  width: var(--width-container-stgx) !important;
  height: var(--height-container-stgx) !important;

  overflow: hidden !important;
  background-color: red !important;


  right:40px !important;
  padding:10px !important;

margin:0  !important;
left:100px !important;
padding-left:10px !important;
margin-right:10px !important;
padding-right:10px !important;
padding-bottom:10px !important;

}



</style>







<!--     <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_url ?>/js/jquery-ui.min.js"></script>

 -->









</head>



<body oncontextmenu="return false;">



<!-- <div style="background-color:yellow;width:100%;">
<span style="background-color:yellow;width:100%;"> -->
<?php 
//echo explode("_",$current_project)[1]; 
?>
<!-- </span>
</div> -->


<!--  Menu Panel Left Cytoscape -->

<!-- <br class="clearBoth" /> -->




  <div class="menuLeft_ST">


<button id="play_stgx" class="bt_ST">Play</button>

<!--     <span style="background-color:yellow;"><?php echo explode("_",$current_project)[1]; ?>zaaaaaaaaaaaaaaaaaaaaaaaaa</span> -->
  <span id="nbNodes">Nothing to see</span>
<!--  Menu Cytoscape -->
<!-- <div class="menuTop_ST" style="background-color:yellow;margin-left:0;padding-left:0;"> -->

    <div class="menuTop_left_ST" style="padding:0;margin:0;">
      <select id="layoutCh" class="layoutCh">
        <option value="dagre" selected>Dagre</option>
<!--         <option value="breadthfirst">Breadthfirst</option> -->
        <option value="grid">Grid</option>
<!--         <option value="cose">Cose</option>
        <option value="circle">Circle</option>
        <option value="concentric">Concentric</option>
        <option value="random">Random</option> -->
      </select>
      <button id="fit" class="bt_ST">Show All</button>
      <button id="redraw" class="bt_ST">Re Draw</button>

      <button class="disabled bt_ST" id="deleteNodes">Delete selected</button>
    </div>


    <div class="menuTop_Right_ST">

<!--       <button id="load" class="bt_ST">Restore Last save</button> -->
      <button id="save" class="bt_ST">Save</button>
      <button id="save_json" class="bt_ST">Save Json</button>
      <!-- <button id="emptyLS" class="bt_ST">Cancel</button> -->
      <button id="clear" class="bt_ST">Clear Graph</button>
    </div>


<!-- </div> -->

    <hr />

<!--     <div class="nodeModel edge" data-type="edge">Edge</div> -->
    <div class="nodeModel sequenceM" data-type="sequence">Sequence</div>
    <div class="nodeModel assetM"  data-type="asset">Asset</div>    


    <hr />

      <button id="help_ST" class="help_ST">Help</button>

    <div id="menuLeft_ST_memo" class="menuLeft_ST_memo">


      <p>Drag and Drop element on screen</p>


      <ul>
        <b>Zoom</b> : <li>Molette souris</li>
        <b>Pano</b> : <li>Click+drag sur le fond</li>
        <b>Sélection</b> : 
          <li>Box-select -> SHIFT + click + drag</li>
          <li>Multiple -> SHIFT + click sur les nodes</li>
        <b>Menu contextuel</b> :
          <li>Clic-droit sur node -> actions du node</li>
          <li>Clic-droit sur fond -> actions génériques</li>
        <b>Connexions Manuelles</b> :
          <li>Sélectionner des nodes (avec SHIFT+clic ou le box-select), puis
          CRTL+click sur un node pour les connecter à ce dernier.</li>
          <li><b>Directions autorisées :</b></li>
          <li>&nbsp;&nbsp;&nbsp; -> Asset vers Asset(s)</li>
          <li>&nbsp;&nbsp;&nbsp; -> Asset vers Sequence(s)</li>
          <li>&nbsp;&nbsp;&nbsp; -> Sequence vers Sequence(s)</li>
        <b>Mémoire :</b>
          <li>
            Bouton "Charger" : charge un graphe depuis la mémoire
            du navigateur si présente, sinon charge depuis un fichier json sur le serveur.
          </li>
          <li>Bouton "Mémoriser" : mémorise le graphe courant dans la mémoire du navigateur.</li>
          <li>Bouton "Oublier" : Vide la mémoire du navigateur</li>
      </ul>
    </div>
  </div>




  <div id="container" class="containerStgx"></div>

  <div id="contextMenu">
    <div class="ctxNodeTitle overNode"></div>
    <div class="ctxMenuEntry nodeAction" id="renameNode">Rename</div>
    <div class="ctxMenuEntry nodeAction disabled">Isoler</div>
    <div class="ctxMenuEntry nodeAction disabled">Select child(s)</div>
    <div class="ctxMenuEntry nodeAction" id="deleteNode">Delete</div>
    <div class="ctxMenuEntry nodeAction disabled">Disconnect</div>
    <hr class="overNode" />
    <div class="ctxMenuEntry" id="fitM">Show all</div>
    <hr />
    <div class="ctxMenuEntry addNode" data-type="asset">Add asset</div>
    <div class="ctxMenuEntry addNode" data-type="sequence">Add sequence</div>
<!--    <div class="ctxMenuEntry addNode" data-type="shot">Ajouter un shot</div> -->
    <hr />
    <div class="ctxMenuEntry" id="clearM">Clear graph</div>
  </div>









  



<!--   <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->


<!--   <script src="<?php echo $base_url;?>/js/storygraph.js"></script> -->


<!--   <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>/css/storygraph.css"> -->

<script>



$(document).ready(function(){

    var loaded = true;

    if (!window.jQuery){console.log('jQuery STGX NOT loaded!!!');var loaded = false;}
    if (window.jQuery){console.log('jQuery STGX is loaded');}

    if (!window.jQuery.ui){console.log('jQuery UI STGX NOT loaded!!!');var loaded = false;}
		if(window.jQuery.ui){console.log('jQuery UI STGX is loaded');}

    if (loaded == true){

        $.getScript('<?php echo $base_url;?>/js/storygraph.js');

        $('#help_ST').on("click", function(){
          $('#menuLeft_ST_memo').toggle();
        });

    }
    else
    {
        console.log('jQuery & jQuery STGX UI ARE NOT loaded!!!');
    }

});



</script>












</body>

</html>

