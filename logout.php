<?php
session_start();
$_SESSION['login'] = 0;
session_destroy();
$_SESSION['message']="You are now logged out";
header("location:login.php");
?>