<?php
@session_start();

$this->load->helper('fcts');

$user = $_SESSION['username'];
/* $current_project = "demo";
$project = $user."_".$current_project; */
//$current_json= "assets/_storygraph/__projects/".$project."/localstorage_graph.json";
$arr_project = array();
$arr_json = array();
$token = $_SESSION['token'];



//echo $_SESSION['username'];
$arr_project_menu = array();
$path = "assets/_storygraph/__projects";
$dir = new DirectoryIterator($path);
foreach ($dir as $fileinfo) {
	if ($fileinfo->isDir() && !$fileinfo->isDot()) {
	  $dn = $fileinfo->getFilename();
	  $e = explode("_",$dn)[0];
	  //echo $e.'<br>';
		if($e==$_SESSION['username']){
		  //echo $dn.'<br>';
		  array_push($arr_project_menu,$dn);
		}
	}
}
//print_r($arr_project);
//exit;



function getDirContents_json_DES($user, $dir, &$results = array()){
    $files = scandir($dir);
  
    foreach($files as $key => $value){
  
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value);
  /*       echo $value;
        echo "<br>-----"; */
        // exit;
        if($value == 'localstorage_graph.json'){
          //echo "<br>";
          $b = basename(dirname($path));
  /*         echo $b;
          echo "<br>";
          echo $value;
          echo "<br>-----"; */
  
          $u = explode("_",$b)[0];
  
          $date = date ("Y-m-d H:i:s", filemtime($path));
          if($user == $u){
            $results[$date] = $path;
          }
        }
                if(!is_dir($path)) {
                    //$results[] = $path;
                } else if($value != "." && $value != "..") {
                //} else if($value == "localstorage_graph.json") {
                    getDirContents_json($user, $path, $results);
                    //$results[] = $path;
                }
        //}       
    }
  
    return $results;
  }








  $path = "assets/_storygraph/__projects/";
  $dir = new DirectoryIterator($path);
  foreach ($dir as $fileinfo) {
      if ($fileinfo->isDir() && !$fileinfo->isDot()) {
        $dn = $fileinfo->getFilename();
        $e = explode("_",$dn)[0];
        //echo $e.'<br>';
          if($e==$_SESSION['username']){
            //echo $dn.'<br>';
            array_push($arr_project,$dn);
          }
      }
  }



sort($arr_project);

/* echo '<br>#################';
print_r($arr_project);
echo '#########################<br>'; */
// exit;



$arr_last_json = getDirContents_json($_SESSION['username'], 'assets/_storygraph/__projects/');

if(count($arr_last_json)!=0){

      krsort($arr_last_json);

/* 
      print_r($arr_last_json);

      print_r(count($arr_last_json));

      echo '<br>';
      echo '<br>--recent json';
      echo '<br>';
 */

      $last_json = reset($arr_last_json);


      $current_json = $last_json;
      $current_project = basename(dirname($current_json));



      // echo $current_json;



}



























?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Storygraph</title>

<!-- 	<link rel="icon" type="image/png" href="<?php echo base_url() ?>assets/images/favicon.png" />
	<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.png" type="image/png">
	<link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico" /> -->

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>

<style>

root {
  --height-top-navbar: 50px;
}


body, html {
    /* min-height: 100vh; */
    margin:0;
    padding:0;
/*     height:100%;*/
    overflow: hidden; 
}

.title_topnav{
    color: grey;
    font-size: 40px; 
    font-weight: bold;
}

.btn_topnav{
    border: 0px solid #004b4b;
    padding: 10px;
    border-radius: 0px;
    background-color: #004b4b;
}

.btn_topnav > a:hover {
    color: white !important;
    text-decoration:none !important;
    background-color: #004b4b !important;
}

.btn_play{
    background-image: url("<?php echo base_url() ?>assets/images/play-icon.png");
    background-repeat: no-repeat;
    background-position: left;
    background-size: 35px 35px;
    background-position: 20px 7px; 
    width:40vh;
    text-indent: 55px;
}

.btn_topnav_profile{
    border: 0px solid #004b4b;
    padding: 10px;
    border-radius: 0px;
}

.btn_profile{
    background-image: url("<?php echo base_url() ?>assets/images/profile-icon.png");
    background-repeat: no-repeat;
    background-position: left;
    background-size: 50px 50px;
    background-position: 6px 0px; 
    text-indent: 5px;
    background-color: none !important;
}

.container-stgx{
    background-color: blue;
/*     min-height: 100vh; */
}

.container-stgx{
    border: none;
    margin:0;
    padding:0;
    overflow: hidden;
    width:100%;
    height:100%;
    min-height: 100vh;
}

.iframe-stgx{

    border: none;
    margin:0;
    padding:0;
    overflow: hidden;
    width:100%;
    min-height: calc(100vh - 51px); /* minus var(--height-top-navbar) +1; */
    background-color: red;
}

.navbar-static-top{
    margin-bottom:0;
    height:var(--height-top-navbar);
}

.dropdown_myprojects{
    position:absolute !important;
    left:240px !important;
}

</style>

<script>

$(document).ready(function(){

    $(window).resize(function(){
        var ele = $('.myCol');
        var $window = $(this),windowWidth = $window.width();
        /* console.log(windowWidth); */
        if (windowWidth<768) {
            ele.hide();
        }
        else {
            ele.show();
        }
    });

});

</script>

</head>


<body>
    <nav class="navbar navbar-inverse navbar-static-top" id="topnavbar" style="display:none;">

        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand title_topnav" href="#">Storygraph</a>
        </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right "  class="">

                <li class="dropdown dropdown_myprojects">
                <a href="#" class="dropdown-toggle btn_topnav myCol" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                My Projects<span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li role="separator" class="divider"></li>
                    <li><a href='#'>Create New Project</a></li>
<!--                     <li role="separator" class="divider"></li>
                    <li><a href='#'>P1</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href='#'>P2</a></li> -->
                    <?php
                    foreach ($arr_project_menu as $value) {
                        $v = explode("_",$value)[1];
                        echo "<li role='separator' class='divider'></li>";
                        echo "<li><a href='#'>".$v."</a></li>";
                        //echo "$value <br>";
                    }
                    ?>
                    <li role="separator" class="divider"></li>
                    <li><a href='#'>Demo Project</a></li>
                </ul>
                </li>

<!--             <form class="navbar-form navbar-left">
                <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-success">Search</button>
            </form> -->
<!--                 <li class="active"><a href="#">HOME<span class="sr-only">(current)</span></a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">CONTACT</a></li> -->

                <!-- <li><a href="#" class="btn_topnav btn_play myCol">Play this Project</a></li> -->

                <li class="dropdown">
                <a href="#" class="dropdown-toggle btn_topnav_profile btn_profile" 
                data-toggle="dropdown" title="<?php echo $_SESSION['username'];?> parameters" role="button" aria-haspopup="true" aria-expanded="false">
                
                <strong data-toggle="tooltip" title="<?php echo $_SESSION['username'];?> parameters">
                    <?php echo substr(strtoupper($_SESSION['username']), 0, 1);?>
                    </strong>

                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li role="separator" class="divider"></li>
                    <li><a href='#'>Profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href='#'>Contact</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href='#'>Help</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href='<?php echo base_url(); ?>index.php/Login/logoutUser'>Logout</a></li>

                </ul>
                </li>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div style="background-color:blue;color:white;width:100%;display:none;">
    Storygraph | My Projects| Play Project :
    <?php 
             echo explode("_",$current_project)[1];
        ?>
        | Size : 2 Mo | n Sequences | n Cases | n Cases | 
        <span style="position:relative;right:0;">
        <?php
        echo $_SESSION['username'];
        
        ?>
        </span>
    </div>

</html>