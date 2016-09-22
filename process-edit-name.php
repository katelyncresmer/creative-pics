<?php
session_start();
$url = $_SERVER['HTTP_REFERER'];
header("location: $url");
//here, insert code from an externl file
include('includes/functionlib.php');

$name=$_POST['newname'];

$user=$_SESSION['user'];

//obtain next available id number//
$results=run_my_query("SELECT * FROM users WHERE username='$user'");


//query to add a record
run_my_query("
	UPDATE users
	SET name= '$name' 
	WHERE username='$user'
");

//redirect user back to all-socks
header('location: account.php');
exit();
?>
