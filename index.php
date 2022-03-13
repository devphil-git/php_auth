<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

require 'connect.php';

//var_dump ($_POST);

if (isset($_POST["username"]) && isset($_POST["password"])) {

   $username = $_POST["username"];
   $email = $_POST["email"];
   $pass = $_POST["password"];

//   echo "<br>username $username <br>";
//   echo "email $email <br>";
//   echo "pass $pass <br>";


   $query = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$pass')";
   $result = mysqli_query($connection, $query);
   if ($result) {
      $smsg = 'Регистрация прошла успешно';
   } else {
      $fsmsg = 'Ошибка регистрации';
   } 
}

?>

   <div class="container">
      <form class="form-signin" action="" method="POST">
         <h2>Регистрация</h2>
         <?php if(isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg ?> </div> <?php } ?>
         <?php if(isset($fsmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg ?> </div> <?php } ?>
         <input class="form-control" type="text" name="username" placeholder="Имя">
         <input class="form-control" type="email" name="email" placeholder="Email">
         <input class="form-control" type="password" name="password" placeholder="Пароль">
         <button class="btn btn-lg btn-primary btn-block">Отправить</button>
      </form>
   </div>
</body>
</html>