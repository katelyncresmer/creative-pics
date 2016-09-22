<?php
session_start();
header("Location: dashboard.php");
//here, insert code from an externl file
include('includes/functionlib.php');
$user=$_SESSION['user'];
$pic=$_POST['userpic'];
//alert("Are you sure you want to delete your account?");

//obtain next available id number//
$results=run_my_query("SELECT * FROM stream");
$profile=run_my_query("SELECT * FROM comments");
$results -> data_seek(0);
		//run a speacial while loop, repeating what's in {} for each row of our table, stopping when it runs out of rows
		$profile->data_seek(0);

run_my_query("
	DELETE FROM stream WHERE pic='".$pic."' 
");
run_my_query("
	DELETE FROM comments WHERE picture='".$pic."' 
");
  
header("Location: dashboard.php");
exit();
?>
