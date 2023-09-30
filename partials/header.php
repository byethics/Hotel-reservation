<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Hotel-reservation/css/bootstrap.min.css">

  <title>Hotel-reservation system</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid container">
      <a class="navbar-brand" href="#">UWI hotel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div style="width: 200px;" class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="/Hotel-reservation">Home
              <span class="visually-hidden">(current)</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="/Hotel-reservation/pages/reservation.php">Reservation</a>
          </li>
          <?php
          if (isset($_SESSION['loged-in'])) {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="/Hotel-reservation/pages/logout.php">logout</a>
            </li>
          <?php
          } else {
          ?>
            <li class="nav-item">
              <a class="nav-link" href="/Hotel-reservation/pages/login.php">login</a>
            </li>
          <?php
          }

          ?>
        </ul>

      </div>
    </div>
  </nav>


  <div class="container">
    <?php
    $host = 'localhost';
    $db_name = 'reservation';
    $username = 'root';
    $password = '';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli($host, $username, $password, $db_name);
    ?>