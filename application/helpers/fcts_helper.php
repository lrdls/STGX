<?php


/*  echo "test fcts";
 exit; */

 function get_user($hostname, $username, $password, $database, $token){
    $user = "demo";
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "SELECT username FROM users WHERE token='$token'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $user = $row["username"];           
        }
    }

    $conn->close();

    return $user;

} 

 

 function getDirContents_json($user, $dir, &$results = array()){
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












  
function get_projects($hostname, $username, $password, $database, $token, $path){


    $arr_project = array();




    // Create connection
    $conn = new mysqli($hostname, $username, $password, $database);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    $sql = "SELECT username FROM users WHERE token='$token'";
    $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                //echo "pseudo: " . $row["username"]. "<br>";
                $user = $row["username"];
                // $path = "__projects/";
                $dir = new DirectoryIterator($path);
                foreach ($dir as $fileinfo) {
                    if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                      $dn = $fileinfo->getFilename();
                      $e = explode("_",$dn)[0];
                      //echo $e.'<br>';
                        if($e==$user){
                          //echo $dn.'<br>';
                          array_push($arr_project,$dn);
                        }
                    }
                }

                // load localstorage // to do better
            }
        } else {
            // echo "0 results";
        }
        $conn->close();
/*         print_r($arr_project);
        exit; */
        sort($arr_project);
        return $arr_project;

  // exit;

    //echo $_GET['token'];
    //$user = "moa";


    // get localstorage
  }



  function get_current_project($arr_last_json){

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
  /* else{
    $current_json = '__projects/demo_demo/localstorage_graph.json';
  } */
  return $current_project;
  }



















 ?>