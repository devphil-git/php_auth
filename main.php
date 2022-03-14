<?php
$page_title = "Main";
include 'header.php';

session_start();
if (isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
} else {
   $username = 'noname';
}
?>

<div class="mt-5 d-flex justify-content-center flex-column align-items-center">
   <div class="h2 text-center">Hello, <?= $username ?> </div>
   <div class="mb-5 text-center">Click logout to exit</div>
   <a class="btn btn-lg btn-success btn-logout" href="logout.php">Logout</a>
</div>

<?php
include 'footer.php';
?>