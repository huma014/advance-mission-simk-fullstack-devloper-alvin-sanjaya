<?php
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// setcookie('tebakiniapa','',time()-3600);
// setcookie('tebakiniapa2','',time()-3600);

header('location:login.php');
exit;


?>