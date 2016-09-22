<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
$user=$_SESSION['user'];
include('includes/functionlib.php');
$results=run_my_query("SELECT * FROM users WHERE username='$user'");
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
</head>

<body id="dashhome">
<header>
  <img class="thumb" src="img/logo.png"/>
  <nav>
    <ol>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="upload.php">Upload</a></li>
      <li><a href="live.php">Live Feed</a></li>
      <li><a href="mentions.php">Mentions</a></li>
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
    $name=$row['name'];
			}
	?>

<h1 id="dashh">Hey Mr. Joseph, I'm working on this page! :)</h1>

</body>
</html>