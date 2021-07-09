<?php session_start(); 

$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['secondname'] = null;
$_SESSION['role'] = null;
header("location: ../index.php");

?>