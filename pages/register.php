<?php
include('../partials/header.php');
include('../partials/auth/register.php');
if(isset($_SESSION['loged-in'])) {
header("Location: /Hotel-reservation");
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
    try {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $name = $_POST['name'];
      include_once "../upload.php";
      $avatar = $fname;
        $sql = "INSERT INTO `users` (`user_nname`, `password`, `email`, `avatar`) VALUES ( '$name', '$password', '$email', '$avatar' );";
        if (!mysqli_query($conn, $sql)) {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } else {
  header("Location: /Hotel-reservation/pages/login.php");
      }
      mysqli_close($conn);
    } catch (\Throwable $th) {
      print_r($th);
      ?>
      <script>
alert('error occured while creating an account');
      </script>
      <?php
      mysqli_close($conn);
    }
  }
}
include('../partials/footer.php');
?> 
