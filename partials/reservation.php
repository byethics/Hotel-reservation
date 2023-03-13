<div class="mt-4"></div>
<?php

  if(!$_SESSION['loged-in']) {
    header("Location: /Hotel-reservation/pages/login.php");
    }
$host = 'localhost';
$db_name = 'reservation';
$username = 'root';
$password = '';
$conn = mysqli_connect($host, $username, $password,$db_name);

    $ql = mysqli_query($conn, "SELECT * FROM rooms");
    while($row = mysqli_fetch_array($ql)){

      ?>
      <div class="alert alert-dismissible alert-danger">
        <p>

          room number: <?php echo $row['rid'];?>
        </p>
        <p>

          price: <?php echo $row['price'];?>
        </p>
        <p>

          category: <?php echo $row['category'];?>
        </p>
        <p>

          size: <?php echo $row['mates'];?> person
        </p>
    <a href="/Hotel-reservation/pages/reservation.php?room=<?php echo $row['rid'];?>" name="submit" class="btn btn-primary px-4 mt-2">book this room</a>

    </div>
    <?php
    }
    ?>
