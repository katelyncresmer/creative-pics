<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
include('includes/functionlib.php');
$user=$_SESSION['user'];
$pic=$_POST['userpic'];
$results=run_my_query("SELECT * FROM users WHERE username='$user'");
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
 <?php
		
		$results -> data_seek(0);
		
		while($row=$results->fetch_assoc()){
    $id =$row['ID'];
		$email=$row['email'];
		$pass=$row['password'];
			}
	?>
     
<h1 id="dashh">Change Caption</h1>
<form  action='process-edit-cap.php' method="post" enctype="multipart/form-data">
<input type="hidden" name="userpic" value="<?php echo $pic; ?>">
    	<p>New Caption:<input class="inputadd" type="text" name="newname"></p>
        <p><input type='submit' /></p>
    </form>
</body>
</html>