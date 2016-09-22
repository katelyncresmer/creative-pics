<?php
header("location:adminindex.php");
include('includes/functionlib.php');
$theirname=$_POST['uname'];
$theirpass=$_POST['upass'];
$results=run_my_query("SELECT * FROM admin 
					WHERE username=\"$theirname\"
					AND password=\"$theirpass\"	");
$results -> data_seek(0);
if($row=$results->fetch_assoc()){
	session_start();
    $_SESSION['admin']=true;
	$_SESSION['logged_in']=true;
	$_SESSION['name']=$row['name'];
	$_SESSION['user']=$row['username'];
	header("location:adminindex.php");
	exit();
}else{
	session_start();
	$_SESSION['invalid_user']=true;
	header("location:login.php");
	exit();
}
?>
