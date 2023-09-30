<?php

if (!$_SESSION['loged-in']) {
  header("Location: /Hotel-reservation/pages/login.php");
}
$host = 'localhost';
$db_name = 'reservation';
$username = 'root';
$password = '';
$conn = mysqli_connect($host, $username, $password, $db_name);
if (isset($_GET['giveout'])) {
  $giveout = htmlspecialchars($_GET['giveout']);
  $sqld = "DELETE FROM `reservation` WHERE room = $giveout;";
  $sqldu = "UPDATE `rooms` SET `status` = 'available' WHERE `rooms`.`rid` = $giveout;";
  if (mysqli_query($conn, $sqld)) {
    if (mysqli_query($conn, $sqldu)) {
      unset($_SESSION['room']);
      header("Location: /Hotel-reservation");
    }
  }
}
?>
<div class="container mt-4">
  <div class="alert alert-dismissible alert-danger">
    <strong><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM rooms WHERE status = 'available'")); ?> rooms available</strong> <a href="#" class="alert-link mr-4">request one</a> for you.
  </div>
</div>
<?php
if (isset($_SESSION['room'])) {

  if ($_SESSION['room']) {
?>
    <div class="container mt-4">
      <div class="alert alert-dismissible alert-danger">
        <strong>Your room is room number <?php echo $_SESSION['room']; ?></strong> category <?php echo $_SESSION['room-category']; ?>

        <a href="/Hotel-reservation?giveout=<?php echo $_SESSION['room']; ?>" class="badge bg-warning">give out this room</a>
      </div>
    </div>
<?php
  }
}
