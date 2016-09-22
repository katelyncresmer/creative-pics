<?php
session_start();
header('location: live.php');
//here, insert code from an externl file
include('includes/functionlib.php');

$userpic=$_POST['userpic'];
$cap=$_POST['newname'];

//obtain next available id number//
$results=run_my_query("SELECT * FROM stream WHERE pic='$userpic' ");


//query to add a record

run_my_query("
	UPDATE stream SET cap='".addslashes($cap)."' WHERE pic='$userpic'
");
//redirect user back to all-socks
header('location: live.php');
exit();
?>
