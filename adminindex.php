<?php
session_start();
if(!isset($_SESSION['admin'])){
//redirect them to login
header('location:login.php');
exit();
}
$user=$_SESSION['user'];
include('includes/functionlib.php');
$results=run_my_query("SELECT * FROM admin WHERE username='$user'");
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/admin.css">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Expletus+Sans' rel='stylesheet' type='text/css'>
<link href="img/logo.png" type="image/x-icon" rel="icon"/>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="dashhome">
<div id="adminhome">
<header>
  <img class="thumb" src="img/logo.png"/>
  <nav>
    <ol>
      <li><a href="adminindex.php">Dashboard</a></li>
      <li><a href="users.php">Users</a></li>
      <li><a href="live.php">Live Feed</a></li>
      <li><a href="comments.php">Comments</a></li>
      <li><a href='logout.php'>Logout</a></li>
    </ol>
  </nav>
</header>
<div class="bodycontain">
<h1>Welcome Administrator, this is your Dashboard.</h1><br>
<h2>Current To-do List for the Site</h2>
<ol>
<li>implement code on profile</li>
<li>username restrictions</li>
<li>sending verification emails</li>
<li>make password case sensitive</li>
<li>delete pictures</li>
<li>email verification</li>
<li>let users report bugs</li>
<li>put information on the dashboard</li>
<li>finish mentions page</li>
<li>slideshow on index page</li>
<li>make logo</li>
<li>default profile pictures</li>
<li>work on responsiveness</li>
<li>work on design of pages</li>
</ol>
<h2>Newest Updates</h2>
<ol>
<li>delete comments</li>
</ol>
<h2>Reported Bugs</h2>




</div>
</div>
</body>
</html>