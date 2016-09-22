<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
include('includes/functionlib.php');
$user=$_SESSION['user'];
$results=run_my_query("SELECT * FROM users WHERE username='$user'");
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link href="img/logo.png" type="image/x-icon" rel="icon"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Expletus+Sans' rel='stylesheet' type='text/css'>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="aboutbody">

<header><h1>Change your email</h1>
</header>
 <?php
		
		$results -> data_seek(0);
		
		while($row=$results->fetch_assoc()){
    $id =$row['ID'];
		$email=$row['email'];
		$pass=$row['password'];
			}
	?>
     
  
      <?php
                if (isset($_REQUEST['newemail'])){
                  $name = $_REQUEST['newemail'] ;
                    run_my_query("
                      UPDATE users
                      SET email= '$name' 
                      WHERE username='$user'
                    ");
                     echo "<p>Your email was changed successfully.</p><br>";
                }
                else
       
                {
                    echo "<form  action='edit-email.php' method='post' enctype='multipart/form-data'>
    	<p>New email:<input class='inputadd' type='email' name='newemail'></p>
        <p><input type='submit' /></p>
    </form><br>";
                }
                
            ?>
</body>
</html>