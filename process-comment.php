<?php
session_start();
header('location: live.php');
//here, insert code from an externl file
include('includes/functionlib.php');

$comment=$_POST['comment'];
$userpic=$_POST['userpic'];
$user=$_SESSION['user'];
$username=$_POST['username'];
//obtain next available id number//
$results=run_my_query("SELECT * FROM comments ");


//query to add a record

run_my_query("
INSERT INTO comments
VALUES 
(NULL, '$user', '$userpic', '$username', '".addslashes($comment)."',NULL); 
");
//redirect user back to all-socks
header('location: live.php');
exit();
?>
