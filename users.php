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
<h2 class="adminh2">Users</h2>
<p class="error">Administrators, you may delete user accounts from this page. Please note that all their pictures will be gone along with any commenting associated with those pictures. Their comments on other pictures, however, will still remain.</p>
<?php
$users=run_my_query("SELECT * FROM users ORDER BY id DESC");
$users -> data_seek(0);
		
		while($row=$users->fetch_assoc()){
    $id =$row['ID'];
    $uname=$row['name'];
	$email=$row['email'];
	$username=$row['username'];
	$password=$row['password'];
			
?>
<section>
<form action="users/<?php echo $username ?>/index.php" method="post">
	<a href="users/<?php echo $username ?>/profile.php"><h3><input type="submit" value="<?php echo $username; ?>"></h3></a>
	<input type="hidden" value="<?php echo $username; ?>" name="username">
    </form>
<p><?php echo $uname ?></p>
<form action="admin-delete-account.php" method="post">
	<input type="submit" value="Delete User">
	<input type="hidden" value="<?php echo $username; ?>" name="username">
    </form>
</section>
<?php
}
?>
</section>
</div>
</body>
</html>