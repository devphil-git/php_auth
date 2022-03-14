<?php
session_start();
session_destroy();
?>

<div class="">logout is ok...</div>

<?php
header('Refresh: 1; URL=index.php');
?>