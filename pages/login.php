<?php
include('../partials/header.php');
include('../partials/auth/login.php');

if (isset($_SESSION['loged-in'])) {
  if ($_SESSION['loged-in']) {
    header("Location: /Hotel-reservation");
  }
}

$host = 'localhost';
$db_name = 'reservation';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli($host, $username, $password, $db_name);


if (isset($_POST['submit'])) {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  $query = 'SELECT * FROM users WHERE email=? and password=?';
  $result = $mysqli->execute_query($query, [$email, $password]);

  foreach ($result as $row) {
    if (!empty($row["email"]) || !empty($row["password"])) {
      $_SESSION['loged-in'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['uid'] = $row['uid'];
      if ($row['role'] == 'admin') {
        $_SESSION['role'] = "admin";
        header("Location: /Hotel-reservation/pages/dashboard.php");
      } else {
        header("Location: /Hotel-reservation");
      }
    }
  }
  echo "did you forget you email or password?";
}

include('../partials/footer.php');
