<?php

include('../partials/header.php');
if (!$_SESSION['loged-in']) {
}
if (!isset($_SESSION['role'])) {
   header("Location: /Hotel-reservation");
}
if ($_SESSION['role'] !== "admin") {
   header("Location: /Hotel-reservation");
}
include('../partials/footer.php');
$sql = "SELECT * FROM `users`;";
$sqlr = "SELECT * FROM `rooms`;";
$host = 'localhost';
$db_name = 'reservation';
$username = 'root';
$password = '';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// $conn = mysqli_connect($host, $username, $password,$db_name);
$mysqli = new mysqli($host, $username, $password, $db_name);

if (true) {

   if (isset($_GET['deleteuid'])) {
      $did = $_GET['deleteuid'];
      try {
         $query = 'DELETE FROM users WHERE `users`.`uid` = ?';
         $result = $mysqli->execute_query($query, [$did]);

         if (mysqli_query($conn, $q)) {

            header("Location: /Hotel-reservation/pages/dashboard.php");
         }
      } catch (\Throwable $th) {
         print_r($th);
      }
   }
   if (isset($_GET['deleterid'])) {
      $did = $_GET['deleterid'];
      try {
         $q = "DELETE FROM rooms WHERE `rooms`.`rid` = $did";
         if (mysqli_query($conn, $q)) {

            header("Location: /Hotel-reservation/pages/dashboard.php");
         }
      } catch (\Throwable $th) {
         print_r($th);
      }
   }
   if (isset($_POST['submit'])) {
      $cat = $_POST['cat'];
      $price = $_POST['price'];
      $mates = $_POST['mates'];
      try {
         $sqliu = "INSERT INTO `rooms` (`price`, `category`, `mates`) VALUES ('$price', '$cat', '$mates');";
         if (mysqli_query($conn, $sqliu)) {

            header("Location: /Hotel-reservation/pages/dashboard.php");
         }
      } catch (\Throwable $th) {
         print_r($th);
      }
   }
?>
   <div class="container mt-4">

      <h1>Admin dashboard</h1>
      <div class="row">
         <div class="col">

            <h3>all users</h3>
            <table class="table table-bordered">
               <thead>

                  <td>user id</td>
                  <td>user name</td>
                  <td>email</td>
                  <td>role</td>
                  <td>avatar</td>
                  <td>delete user</td>
               </thead>
               <?php
               $data = mysqli_query($conn, $sql);
               while ($row = mysqli_fetch_array($data)) {
               ?>
                  <tr>
                     <td><?php echo $row["uid"]; ?></td>
                     <td><?php echo $row["user_nname"]; ?></td>
                     <td><?php echo $row["email"]; ?></td>
                     <td><?php echo $row["role"]; ?></td>
                     <td><img alt="user profile picture" style="width: 2rem; aspect-ratio: 1 / 1; object-fit: cover;" src="/Hotel-reservation/pages/<?php echo $row["avatar"]; ?>"></td>
                     <td><a href="/Hotel-reservation/pages/dashboard.php?deleteuid=<?php echo $row["uid"]; ?>" class="badge bg-danger">delete</a></td>
                  </tr>
               <?php
               }
               ?>
            </table>
            <h3>available rooms</h3>
            <table class="table table-bordered">
               <thead>

                  <td>room id</td>
                  <td>price</td>
                  <td>category</td>
                  <td>status</td>
                  <td>remove room</td>
               </thead>
               <?php
               $data = mysqli_query($conn, $sqlr);
               while ($row = mysqli_fetch_array($data)) {
               ?>
                  <tr>
                     <td><?php echo $row["rid"]; ?></td>
                     <td><?php echo $row["price"]; ?></td>
                     <td><?php echo $row["category"]; ?></td>
                     <td>available</td>
                     <td><a href="/Hotel-reservation/pages/dashboard.php?deleterid=<?php echo $row["rid"]; ?>" class="badge bg-danger">delete</a></td>
                  </tr>
               <?php
               }
               ?>
            </table>
         </div>
         <div class="col">
            <h3>add new room to our hotel</h3>
            <form action="/Hotel-reservation/pages/dashboard.php" method="post">

               <div class="form-group mb-4">

                  <div class="form-group">
                     <label class="col-form-label mt-2" for="inputDefault">category</label>
                     <input type="text" name="cat" class="form-control" placeholder="VVIP" id="inputDefault">
                  </div>
                  <div class="form-group">
                     <label class="col-form-label mt-2" for="inputDefault">price</label>
                     <input name="price" min="100000" step="50000" type="number" class="form-control" id="inputDefault">
                  </div>
                  <div class="form-group">
                     <label class="col-form-label mt-2" for="inputDefault">room mates</label>
                     <input name="mates" type="number" class="form-control" id="inputDefault">
                  </div>


                  <div class="form-floating">
                     <button type="submit" name="submit" class="btn btn-success px-4 mt-2">save</button>
                  </div>
               </div>
            </form>

         </div>
      </div>
   </div>

<?php
} ?>