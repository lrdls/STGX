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
$path_projects = $www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR.'__projects'.DIRECTORY_SEPARATOR;



$current_project = "demo";
$user = "demo";
$_SESSION['user'] = $user;
$project = $user."_".$current_project;
$current_json= $www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR."__projects".DIRECTORY_SEPARATOR.$project.DIRECTORY_SEPARATOR."localstorage_graph.json";
$arr_project = array();
$token = "";

/* $hostname = $db['default']['hostname'];
$username = $db['default']['username'];
$password = $db['default']['password'];
$database = $db['default']['database']; */


if(!isset($_GET['token'])) {
    // echo "no token INC";
    array_push($arr_project,$project);
  } else {

    require_once($www_root.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'helpers'.DIRECTORY_SEPARATOR.'fcts_helper.php');
    require_once($www_root.DIRECTORY_SEPARATOR.'application'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'database.php');

    $hostname = $db['default']['hostname'];
    $username = $db['default']['username'];
    $password = $db['default']['password'];
    $database = $db['default']['database'];

      $token = $_GET['token'];
      $user = get_user($hostname, $username, $password, $database, $token);
      $_SESSION['user'] = $user;
      $user = $_SESSION['user'];
      $arr_project = get_projects($hostname, $username, $password, $database, $token, $path_projects);
      $arr_last_json = getDirContents_json($user, $path_projects);
      $current_project = get_current_project($arr_last_json);
      $current_project = explode("_",$current_project)[1];
  }

/*   print_r("<br>---INC ");
  print_r($current_project); */


/*   print_r($token);
  print_r("<br>");
  print_r($arr_project);
  print_r("<br>");
  print_r($user);
  print_r("<br>");
  print_r($_SESSION['user']);
  print_r("<br>");
  print_r($current_project);
  print_r("<br>");
 */
?>


		<link rel="stylesheet" href="<?php echo $base_url ?>css/stgx/split-pane.css" />
		<!-- The style sheet below is not part of the split-pane plugin. Feel free to use it, or style things your own way. -->
		<link rel="stylesheet" href="<?php echo $base_url ?>css/stgx/pretty-split-pane.css" />
		<!-- <script src="jquery.min.js"></script> -->
 		<script type="text/javascript" src="<?php echo $base_url ?>js/jquery-2.1.4.min.js"></script>
<!--		<script type="text/javascript" src="<?php echo $base_url ?>js/stgx/split-pane.js"></script> -->

