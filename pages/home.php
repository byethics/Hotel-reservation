<?php
if (!$_SESSION['loged-in']) {
  header("Location: /Hotel-reservation/pages/login.php");
}

if (isset($_GET['giveout'])) {
  $giveout = htmlspecialchars($_GET['giveout']);

  $reservation_delete_query = 'DELETE FROM `reservation` WHERE room=?';
  $rooms_update_query = 'UPDATE `rooms` SET `status`=? WHERE `rooms`.`rid`=?';
  $mysqli->execute_query($reservation_delete_query, [$giveout]);
  $mysqli->execute_query($rooms_update_query, ['available', $giveout]);
  unset($_SESSION['room']);
  header("Location: /Hotel-reservation");
}
$rooms = $mysqli->execute_query("SELECT * FROM rooms WHERE status = 'available'");
?>
<div class="container mt-4">
  <div class="alert alert-dismissible alert-danger">
    <strong><?php
            $i = 1;
            foreach ($rooms as $room) {
              ++$i;
            }
            echo $i;
            ?> rooms available</strong> <a href="#" class="alert-link mr-4">request one</a> for you.
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
