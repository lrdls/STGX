<?php
session_start();


 if(isset($_POST['nodes'])) {

    $json = $_POST['nodes'];
    $nodes = json_decode($_POST['nodes'], true);



    //$path_dir = '..' . DIRECTORY_SEPARATOR . '__projects' . DIRECTORY_SEPARATOR . $_SESSION["PROJECT"] . DIRECTORY_SEPARATOR;
    $path_dir = __DIR__. DIRECTORY_SEPARATOR . '__projects' . DIRECTORY_SEPARATOR . $_SESSION["PROJECT"] . DIRECTORY_SEPARATOR;
    //$file = $path_dir . 'localstorage_graph.txt';
    $file = $path_dir.'localstorage_graph.json';
    if (file_exists($file)) {
        unlink($file);
    }

    $localstorage_graph_txt = fopen($file, 'w+') or die("Unable to open file!");

    fwrite($localstorage_graph_txt, $json);
    fclose($localstorage_graph_txt);


    echo "ok";

 }
  else {
      echo "Error";
  }

?>
