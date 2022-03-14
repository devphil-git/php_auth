<?php
$page_title = "Logout";
include 'header.php';

session_start();

if (isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
}
?>

<div class="h2 text-center mt-5">Good-bye <?= $username ?></div>

<?php
session_destroy();                           //Удаление данных сессии
header('Refresh: 1; URL=index.php');
?>

<?php
include 'footer.php';
?>



