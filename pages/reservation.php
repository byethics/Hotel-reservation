<?php
include('../partials/header.php');

include('../partials/reservation.php');

if(!$_SESSION['loged-in']) {
  header("Location: /Hotel-reservation/pages/login.php");
  }

$host = 'localhost';
$db_name = 'reservation';
$username = 'root';
$password = '';
$conn = mysqli_connect($host, $username, $password,$db_name);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}else {

  
  if(isset($_GET['room'])) {
    $room = $_GET['room'];
    $email =  $_SESSION['email'];           
    $email =  $_SESSION['email'];
    
      $sql = "SELECT * FROM rooms WHERE rid = '$room';";
      $data = mysqli_fetch_array(mysqli_query($conn, $sql));

      if (count($data) > 1) {
          $_SESSION['room'] = $data['rid'];
          $_SESSION['room-category'] = $data['category'];
          $uid = $_SESSION['uid'];
          $rid = $data['rid'];
          $sqlr = "INSERT INTO `reservation` (`room`, `ui`) VALUES ('$rid', '$uid');";
          $sqlru = "UPDATE `rooms` SET `status` = 'booked' WHERE `rooms`.`rid` = $rid;";
try {
  if(mysqli_query($conn, $sqlr)){
    if(mysqli_query($conn, $sqlru)){

      header("Location: /Hotel-reservation");
    }
  }
} catch (\Throwable $th) {
print_r($th);
}

      }
          mysqli_close($conn);
        }
}

include('../partials/footer.php');
?> 
