<?php
require_once('../partials/header.php');
require_once('../partials/reservation.php');

if (!$_SESSION['loged-in']) {
  header("Location: /Hotel-reservation/pages/login.php");
}

if (isset($_GET['room'])) {
  $room = $_GET['room'];
  $email =  $_SESSION['email'];
  $email =  $_SESSION['email'];
  try {
    $query = 'SELECT * FROM rooms WHERE rid=?';
    $result = $mysqli->execute_query($query, [$room]);
    foreach ($result as $row) {
      $_SESSION['room'] = $row['rid'];
      $_SESSION['room-category'] = $row['category'];
      $uid = $_SESSION['uid'];
      $rid = $row['rid'];
      $reservation_query = 'INSERT INTO `reservation` (`room`, `ui`) VALUES (?, ?)';
      $rooms_update_query = 'UPDATE `rooms` SET `status`=? WHERE `rooms`.`rid`=?';
      $mysqli->execute_query($reservation_query, [$rid, $uid]);
      $mysqli->execute_query($rooms_update_query, ['booked', $rid]);

      header("Location: /Hotel-reservation");
    }
  } catch (\Throwable $th) {
    print_r($th);
  }
}
include('../partials/footer.php');
