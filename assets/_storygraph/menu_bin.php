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
  print_r("<br>");
  print_r($arr_project);
  print_r("<br>");
  print_r($user);
  print_r("<br>");
  print_r($current_project);
  print_r("<br>");
  // exit;
   */




?>

<div style="background-color:blue;width:100%;">
menu bin2
</div>