<?php
session_start();

$_SESSION['cusName'] = array();
$_SESSION['cusID'] = array();

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), time() - 3600, '/', 0,0);
}

session_destroy();
header('Location: ../user-login.php');
?>