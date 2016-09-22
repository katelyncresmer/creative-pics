<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
include('includes/functionlib.php');
$user=$_SESSION['user'];
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/shadowbox.css"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Expletus+Sans' rel='stylesheet' type='text/css'>
<script src="js/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
language: 'en',
players: ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
});
</script>
<link href="img/logo.png" type="image/x-icon" rel="icon"/>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body id="dashhome">
<header>
  <img class="thumb" src="img/logo.png"/>
  <nav>
    <ol>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="upload.php">Upload</a></li>
      <li><a href="live.php">Live Feed</a></li>
      <li><a href="bugs.php">Report Bugs</a></li>
      <li><a href='myprofile.php'>Profile</a></li>
      <li><a href="account.php">Account</a></li>
      <li><a href='logout.php'>Logout</a></li>
    </ol>
  </nav>
</header>

     <div class="bodycontain">
<h1 id="dashh">Report a Bug</h1>
<h2>Report a bug within the site.</h2>
<form  action='process-bug.php' method="post" enctype="multipart/form-data">
  <textarea class="inputadd" name="newbug" placeholder="Please tell us about the bug with as much detail as possible. Thank you!"></textarea><br>
 <input type='submit' />
    </form>
    </div>
    <footer>
<a rel="shadowbox"  href="about.php">About Creative Pics</a>
<a rel="shadowbox"  href="contact.php">Contact Us</a>
<a rel="shadowbox"  href="updates.php">Updates and Added Features</a>
<h6>&copy; Katelyn Hare 2014</h6>

</footer>
</body>
</html>