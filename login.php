<?php

session_start();

include('includes/functionlib.php');

$add_error1='';
$add_error2='';
$add_error3='';
if(isset($_SESSION['invalid_user'])){
	
	$add_error1="<p class=\"error\">Username or Password is incorrect</p>";
	 
	};
	if(isset($_SESSION['wrong_email'])){
	
	$add_error2="<p class=\"error\">Email is already in use</p>";
	 
	};
	if(isset($_SESSION['wrong_username'])){
	
	$add_error3="<p class=\"error\">Username is already taken</p>";
	 
	};

if(isset($_SESSION['logged_in'])){
	header("location:dashboard.php");
};



?><!doctype html>
<html>
<head>
<link rel="stylesheet"  href="css/reset.css">
<link rel="stylesheet"  href="css/style.css">
<meta charset="utf-8">
<title>Creative Pics</title>
</head>

<body>
<img class="thumb" src="img/logo.png">
<h1 id="logh">An artistic piece of art everyday!</h1>
<div id="loghome">
  <div class="logf">
    <h2>Admin Login</h2><br>
    <?php echo $add_error1; unset($_SESSION['invalid_user']); ?>
    <form action="process-admin-login.php" method="post">
      <input type="text" name="uname" placeholder="Username" required>
      <input type="password" name="upass" placeholder="Password" required>
      <input type="submit" value="Login">
    </form>
  </div>
  
</div>

</body>
</html>