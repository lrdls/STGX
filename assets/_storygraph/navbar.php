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

$home_url = "http://".$_SERVER['HTTP_HOST']."/".$name_app_folder;

$current_project = "demo";
$user = "demo";
// $_SESSION['user'] = $user;
$project = $user."_".$current_project;
$current_json= $www_root.DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR.'_storygraph'.DIRECTORY_SEPARATOR."__projects".DIRECTORY_SEPARATOR.$project.DIRECTORY_SEPARATOR."localstorage_graph.json";
$arr_project = array();
$token = "";

/*   */

if(!isset($_GET['token'])) {
  // echo "no tokenMN";
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

/* print_r("<br>---MN");
print_r($arr_project); */

/* print_r($token);
print_r("<br>---MN");
print_r($arr_project);
print_r("<br>---MN");
print_r($user);
print_r("<br>---MN");
print_r($_SESSION['user']);
print_r("<br>---MN");
print_r($current_project);
print_r("<br>---MN"); */

?>

<style>

:root {

  --color0: black;
  --color1: green;
  --color2: #2980B9;
  --color3: yellow;
  --color4: red;
  --color99: white;

  --navbar-stgx-width: 100%;
  --navbar-stgx-height: 39px;
  --navbar-stgx-bgcolor: var(--color1);
  --navbar-stgx-zindex: 9999;

  --navbar-btn-height: var(--navbar-stgx-height);
  --navbar-btn-width: var(--navbar-stgx-height);

  --navbar-btn-color: var(--color99);
  --navbar-btn-bgcolor: var(--color0);
  --navbar-btn-bgcolor-hover: var(--color2);
  
}

</style>

<style>
.navbar-stgx {
    display: block;
    list-style-type: none;
    width: var(--navbar-stgx-width);
    height: var(--navbar-stgx-height);
    font: 400 14px/40px Arial;
    padding: 0;
    margin: 0;
    background-color: var(--navbar-stgx-bgcolor);
}

.navbar-stgx li {
    display: block;
    float: left;
    position: relative;
}

.navbar-stgx li a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 13px 10px;
    line-height: 14px;
    background-color: black;
    -webkit-transition: background-color 0.2s linear;
}

.navbar-stgx li a:hover {
    background-color: var(--navbar-btn-bgcolor-hover);
    -webkit-transition: none;
}


.btn-navbar-stgx{
    width: var(--navbar-btn-width);
    height: var(--navbar-btn-height);
    color: var(--navbar-btn-color);
    background-color: var(--navbar-btn-bgcolor);
    padding: 0;
    margin: 0;
}

.btn-navbar-stgx:hover {
    background-color: var(--navbar-btn-bgcolor-hover);
    cursor: pointer;
}

.li-navbar-stgx {
    height: 100%;
    padding: 0;
    margin: 0;
}

.navbar-param{
  position: absolute;
  top: var(--navbar-btn-height);
  top: 200;
  left: 200;
  z-index:9999;
  color: white;
  background-color: var(--navbar-btn-bgcolor);
  padding:0;margin:0;
  display:none;
  width:250px;
}



/* The container must be positioned relative: */
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element: */
}

.select-selected {
  background-color: DodgerBlue;
}

/* Style the arrow inside the select element: */
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/* Point the arrow upwards when the select box is open (active): */
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/* style the items (options), including the selected item: */
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
}

/* Style items (options): */
.select-items {
  position: absolute;
  background-color: #2980B9;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 9999;
}

/* Hide the items when the select box is closed: */
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}


</style>

<style>
	.demo select {
		border: 0 !important;  /*Removes border*/
		-webkit-appearance: none;  /*Removes default chrome and safari style*/
		-moz-appearance: none; /* Removes Default Firefox style*/
        appearance:none;
		background: #0088cc url(<?php echo $home_url;?>/assets/images/select-arrow.png) no-repeat 90% center;
    width: 200px; /*Width of select dropdown to give space for arrow image*/
    height: var(--navbar-btn-height);
		text-indent: 0.01px; /* Removes default arrow from firefox*/
		text-overflow: "";  /*Removes default arrow from firefox*/ /*My custom style for fonts*/
		color: #FFF;
		border-radius: 15px;
		padding: 5px;
		box-shadow: inset 0 0 5px rgba(000,000,000, 0.5);
	}
	.demo select.black {
		background-color: #000;
	}

  
	.demo2 select {
		border: 0 !important;  /*Removes border*/
		-webkit-appearance: none;  /*Removes default chrome and safari style*/
		-moz-appearance: none; /* Removes Default Firefox style*/
        appearance:none;
		background: #0088cc url(<?php echo $home_url;?>/assets/images/select-arrow.png) no-repeat 90% center;
    width: 200px; /*Width of select dropdown to give space for arrow image*/
    height: var(--navbar-btn-height);
		text-indent: 0.01px; /* Removes default arrow from firefox*/
		text-overflow: "";  /*Removes default arrow from firefox*/ /*My custom style for fonts*/
		color: #FFF;
		border-radius: 15px;
		padding: 5px;
    box-shadow: inset 0 0 5px rgba(000,000,000, 0.5);
    display: inline-block;
	}
	.demo2 select.black2 {
		background-color: #000;
	}



</style>

<style>
.dropbtn {
  background-color: #000;
  color: white;
  padding: 12px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  height: var(--navbar-btn-height);
}

.dropbtn:hover, .dropbtn:focus {
  background-color: var(--navbar-btn-bgcolor-hover);
}

.dropdown {
  position: relative;
  display: inline-block;
  height: var(--navbar-btn-height);
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 9999;
  
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>









<nav id="navbar-stgx" class="navbar-stgx">
<li>
<div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#home">Home</a>
    <a href="#about">About</a>
    <a href="#contact">Contact</a>
  </div>
</div>
</li>
<!-- <form class="demo2">

<select class="black2">
<option value="myprojects"><?php echo $_SESSION['user'];?>P btX</option>

<option value="s1">Sub1</option>
<option value="s2">Sub2</option>
<option value="logout">Logout</option>


</select>

</form> -->





<li><button id="btn-navbar-param" class="btn-navbar-stgx" style="padding:0;margin:0;background-image: url(http://www.geppoz.eu/geppoz.png);background-size:100% 100%;"><?php echo $_SESSION['user'];?>P btX</button></li>
<li><button id="btn-navbar-help" class="btn-navbar-stgx">Help</button></li>
<li><button id="btn-navbar-resize" class="btn-navbar-stgx">Resize</button></li>
<li><button id="btn-navbar-save" class="btn-navbar-stgx">Save</button></li>
<li><button id="btn-navbar-delete" class="btn-navbar-stgx">Delete</button></li>
<li><button id="btn-navbar-pack" class="btn-navbar-stgx">Pack</button></li>








    <li>


<form class="demo">

	<select class="black">
  <option value="myprojects">MY PROJECTS</option>

<?php
foreach ($arr_project as $value) {
  // $p = $value;
  $p = explode("_",$value)[1];
echo '<option value="'.$value.'">'.$p.'</option>';
}
?>

<option value="demo_demo">Demo project</option>
<option value="new">Create New Project</option>


	</select>

</form>



    </li>

    <li><a href="#">Play <?php echo $current_project; ?></a></li>


    <li><a href="#">Search</a></li>

</nav>



<!-- <div class="navbar-param" id="navbar-param" style="">
<p>1 submenu</p>
<p>2 submenu</p>
<p><a href="<?php echo $home_url;?>">Logout</a></p>
</div>
 -->


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>






