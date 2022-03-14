<?php
$page_title = "Login";
include 'header.php';
?>

   <div class="container">
      <form class="form-signin text-center" action="" method="POST">
         <h2>Login</h2>
      
         <div class="form-floating">
            <input class="form-control" type="text" name="username" placeholder="Name">
            <label for="floatingInput">User</label>
         </div>
         <div class="form-floating mb-3">
            <input class="form-control" type="password" name="password" placeholder="Password">
            <label for="floatingInput">Password</label>
         </div>
         <button class="btn btn-lg btn-primary btn-block w-100 mb-2" type="submit">Login</button>
         <a href="index.php" class="btn btn-lg btn-outline-primary btn-block w-100">Register</a>
      </form>
   </div>


<?php
session_start();
require 'connect.php';

if (isset($_POST["username"]) && isset($_POST["password"])) {

   $username = $_POST["username"];
   $pass = md5($_POST["password"]);

   $query = "SELECT * FROM users WHERE username = '$username' and pass = '$pass'";

   $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
   $count = mysqli_num_rows($result);

   if ($count = 1) {
      $_SESSION['username'] = $username;        //Запись в сессию имени пользователя
   } else {
      $fsmsg = 'Error';
   }
   if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];
      header('Location: main.php');
   }
}
?>

<?php
include 'footer.php';
?>