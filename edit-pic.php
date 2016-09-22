<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
$user=$_SESSION['user'];
include('includes/functionlib.php');
$results=run_my_query("SELECT * FROM profile WHERE username='$user'");
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Expletus+Sans' rel='stylesheet' type='text/css'>
<link href="img/logo.png" type="image/x-icon" rel="icon"/>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="aboutbody">
<header>
  <h1>Upload a new profile picture</h1>
</header>

<form  action='process-edit-pic.php' method="post" enctype="multipart/form-data">
    	
        <p>Picture:<input class="inputadd" type="file" name="newpic"></p>
        <p><input type='submit' /></p>
    </form><br>


</body>
</html>