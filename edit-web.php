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
$resultsp=run_my_query("SELECT * FROM profile WHERE username='$user'");
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
  <h1>Change your website</h1>
</header>
<?php
                if (isset($_REQUEST['newpass'])){
                  $name = $_REQUEST['newpass'] ;
                    run_my_query("
                      UPDATE profile
                      SET web= '$name' 
                      WHERE username='$user'
                    ");
                     echo "<p>Your website was changed successfully.</p><br>";
                }
                else
       
                {
                    echo "<form  action='process-edit-web.php' method='post' enctype='multipart/form-data'>
    	<p>New website:<input class='inputadd' type='text' name='newpass'></p>
        <p><input type='submit' /></p>
    </form><br>";
                }
                
            ?>
    

</body>
</html>