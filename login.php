<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
</head>
<body>

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
   $pass = $_POST["password"];

   $query = "SELECT * FROM users WHERE username = '$username' and pass = '$pass'";

   $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
   $count = mysqli_num_rows($result);

   if ($count = 1) {
      $_SESSION['username'] = $username;
   } else {
      $fsmsg = 'Error';
   }
   if (isset($_SESSION['username'])) {
      $username = $_SESSION['username'];

      ?><div class="mt-5 d-flex justify-content-center flex-column align-items-center">
         <div class="h2 text-center">Hello, <?= $username ?> </div>
         <a class="btn btn-lg btn-success btn-logout" href="logout.php">Logout</a>
      </div><?

   }
}
?>

</body>
</html>