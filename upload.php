<?php
  $fname;
  if(isset($_FILES['avatar'])){
    $error = array();
    $fname = $_FILES['avatar']['name'];
    $fsize = $_FILES['avatar']['size'];
    $ftemp = $_FILES['avatar']['tmp_name'];
    $type = $_FILES['avatar']['type'];
    $fext = strtolower(end(explode('.', $fname)));
    
    $ext = array("jpeg", "jpg", "png");

    if(in_array($fext, $ext) == false){
      $error[]="extension not allowed , choose'jpeg', 'jpg', 'png'";
    }

    if($fsize > 2097152){
      $error[]="file is large, choose small one";
    }

    if(empty($error) == true){
      move_uploaded_file($ftemp, $fname);
      echo "success".$fext;
    }else {

      print_r($error);
    }
  }
?>
