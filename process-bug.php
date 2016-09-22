<?php
session_start();
$url = $_SERVER['HTTP_REFERER'];
header("location: $url");
include('includes/functionlib.php');
$bug=$_POST['newbug'];
$results=run_my_query("SELECT * FROM bugs ");
run_my_query("
	INSERT INTO bugs
		VALUES 
		(NULL, '$bug' ); 
");
header('location: bugs.php');
exit();
?>
