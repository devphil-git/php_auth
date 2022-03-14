<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
session_start();
require 'connect.php';

if (isset($_POST["username"]) && isset($_POST["password"])) {

   $username = $_POST["username"];
   $email = $_POST["email"];
   $pass = $_POST["password"];

   $query = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$pass')";
   $result = mysqli_query($connection, $query);

   if ($result) {
      $smsg = 'Регистрация прошла успешно';
   } else {
      $fsmsg = 'Ошибка регистрации';
      header ('Refresh: 1; URL=index.php');
   }
}
?>


   <div class="container">
      <form class="form-signin text-center" action="" method="POST">
         <h2>Registration</h2>


         <?php if(isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg ?> </div> <?php } ?>
         <?php if(isset($fsmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg ?> </div> <?php } ?>


         <div class="form-floating">
            <input class="form-control" type="text" name="username" placeholder="Name">
            <label for="floatingInput">User</label>
         </div>
         <div class="form-floating">
            <input class="form-control" type="email" name="email" placeholder="example@mail.ru">
            <label for="floatingInput">Email</label>
         </div>
         <div class="form-floating mb-3">
            <input class="form-control" type="password" name="password" placeholder="Password">
            <label for="floatingInput">Password</label>
         </div>
         <div class="checkbox mb-3">
            <label>
               <input type="checkbox" name="agrement" value="Y" required> Accept privacy policy
            </label>
         </div>
         <button class="btn btn-lg btn-primary btn-block w-100 mb-2" type="submit">Register</button>
         <a href="login.php" class="btn btn-lg btn-outline-primary btn-block w-100">Login</a>
      </form>
   </div>
</body>
</html>