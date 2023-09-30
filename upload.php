<?php
  $fname;
  if(isset($_FILES['avatar'])){
    $error = [];
    $fname = $_FILES['avatar']['name'];
    $fsize = $_FILES['avatar']['size'];
    $ftemp = $_FILES['avatar']['tmp_name'];
    $type = $_FILES['avatar']['type'];
    $fext = strtolower(end(explode('.', $fname)));
    
    $ext = ["jpeg", "jpg", "png"];

    if(in_array($fext, $ext) == false){
      array_push($error, "extension not allowed , choose'jpeg', 'jpg', 'png'");
    }

    if($fsize > 2097152){
      array_push($error, "file is large, choose small one");
    }

    if(empty($error) == true){
      move_uploaded_file($ftemp, $fname);
      echo "success ${fext}";
    }else {

      print_r($error);
    }
  }
