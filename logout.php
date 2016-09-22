<?php
session_start();
unset($_SESSION['logged_in']);  
unset($_SESSION['priv']);
unset($_SESSION['name']);
unset($_SESSION['user']);
unset($_SESSION['admin']);
header("Location: index.php");
?>