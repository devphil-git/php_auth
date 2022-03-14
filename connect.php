<?php
$server_ip = '';
$db_user = '';
$db_pass = '';
$db_name = '';

$connection = mysqli_connect($server_ip, $db_user, $db_pass);
$select = mysqli_select_db($connection, $db_name);

?>