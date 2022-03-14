<?php
$server_ip = '127.0.0.1:3306';
$db_user = 'root';
$db_pass = '';
$db_name = 'auth_db';

$connection = mysqli_connect($server_ip, $db_user, $db_pass);
$select = mysqli_select_db($connection, $db_name);

?>