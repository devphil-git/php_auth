<?php
$page_title = "Regisration";     //Заголовок
include 'header.php';            //Подключение header'a

session_start();                 //Старт тессии пользователя
require 'connect.php';           //Подключение к Базе Данных


if (isset($_POST["username"]) && isset($_POST["password"])) {

   $username = $_POST["username"];
   $email = $_POST["email"];
   $pass = md5($_POST["password"]);

   $query = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$pass')";
   $result = mysqli_query($connection, $query);

   if ($result) {
      $smsg = 'Регистрация прошла успешно';
   } else {
      $fsmsg = 'Ошибка регистрации';
      header ('Refresh: 1; URL=index.php');     //Перезагрузка страницы через 1 секунду
   }
}
?>


<div class="container">
   <form class="form-signin text-center" action="" method="POST">
      <h2>Registration</h2>

      <?php                                     //Информационные сообщения
      if(isset($smsg)) : ?>
         <div class="alert alert-success" role="alert"> <?php echo $smsg ?> </div> 
      <? endif;
      if(isset($fsmsg)) : ?>
         <div class="alert alert-danger" role="alert"> <?php echo $fsmsg ?> </div>
      <? endif; ?>

      <!-- Форма ввода данных -->
      <div class="form-floating">
         <input class="form-control" type="text" name="username" id="name" placeholder="Name">
         <label for="floatingInput">User</label>
      </div>
      <div class="form-floating">
         <input class="form-control" type="email" name="email" id="email" placeholder="example@mail.ru">
         <label for="floatingInput">Email</label>
      </div>
      <div class="form-floating mb-3">
         <input class="form-control" type="password" name="password" id="pass" placeholder="Password">
         <label for="floatingInput">Password</label>
      </div>
      <div class="checkbox mb-3">
         <label>
            <input type="checkbox" name="agrement" value="Y" required checked> Accept some privacy policy
         </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block w-100 mb-2" type="submit">Register</button>
      <a href="login.php" class="btn btn-lg btn-outline-primary btn-block w-100">Login</a>
   </form>
</div>

<?php
include 'footer.php';
?>