<?php
require_once('../partials/header.php');
require_once('../partials/auth/register.php');
if (isset($_SESSION['loged-in'])) {
  header("Location: /Hotel-reservation");
}

if (isset($_POST['submit'])) {
  try {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    include_once "../upload.php";
    $avatar = $fname;
    $query = 'INSERT INTO `users` (`user_nname`, `password`, `email`, `avatar`) VALUES ( ?, ?, ?, ? )';
    $mysqli->execute_query($query, [$name, $password, $email, $avatar]);
    header("Location: /Hotel-reservation/pages/login.php");
  } catch (\Throwable $th) {
    echo $th->getMessage();

?>
    <script>
      alert('error occured while creating an account');
    </script>
<?php
  }
}
include('../partials/footer.php');
?>