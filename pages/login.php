<?php
include('../partials/header.php');
include('../partials/auth/login.php');

if(isset($_SESSION['loged-in'])){
  if($_SESSION['loged-in']) {
    header("Location: /Hotel-reservation");
  }
}

$host = 'localhost';
$db_name = 'reservation';
$username = 'root';
$password = '';
$conn = mysqli_connect($host, $username, $password,$db_name);

if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}else {

  if(isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
      $sql = "SELECT * FROM users WHERE email = '$email' and password = '$password';";
      $data = mysqli_fetch_array(mysqli_query($conn, $sql));
      var_dump(mysqli_num_rows(mysqli_query($conn, $sql)));
      if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {
          $_SESSION['loged-in'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['uid'] = $data['uid'];
          if($data['role'] == 'admin'){
          $_SESSION['role'] = "admin";

  header("Location: /Hotel-reservation/pages/dashboard.php");

          }else {

            header("Location: /Hotel-reservation");
          }
} else { 
          echo "did you forget you email or password?";
    }
    mysqli_close($conn);
  }
}

include('../partials/footer.php');
?> 
