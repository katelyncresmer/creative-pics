<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
$user=$_SESSION['user'];
$admin='';
if(isset($_SESSION['admin'])){
$admin='<p>Hi Mr. Joseph, currently the admin cannot do anything special. But, I plan on letting them be able to delete user accounts and delete pictures from user\'s profiles.</p>';
}
include('includes/functionlib.php');
$results=run_my_query("SELECT * FROM users WHERE username='$user'");

$resultcomment=run_my_query("SELECT * FROM comments WHERE username='$user' OR username2='$user' ORDER BY id DESC");

?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/shadowbox.css"/>

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
<?php
		
		$results -> data_seek(0);
		
		while($row=$results->fetch_assoc()){
    $id =$row['ID'];
    $name=$row['name'];
			}
	?>
<div class="bodycontain">
<h1 id="dashh">Hello, <?php echo $name; ?>! This is your dashboard.</h1>
<?php echo $admin; ?>
	
<?php
		
		$resultcomment -> data_seek(0);
		
		while($row=$resultcomment->fetch_assoc()){
   
	$username=$row['username'];
	$picture=$row['picture'];
	$username2=$row['username2'];
	$comment=$row['comment'];
	$datec=$row['date'];		
	
	$resultpic=run_my_query("SELECT * FROM stream WHERE pic='$picture'");
	
	while($row=$resultpic->fetch_assoc()){
	$date=$row['date'];	
	$pi=$row['pic'];
	}
	/*$resultccc = run_my_query("SELECT * FROM comments "); 
$rez=COUNT($resultccc) ;*/


	?>
	

    <section>
    <form  action="pic.php" method="post">
	<input type="image" class="dash" src="users/<?php echo $username2; ?>/img/<?php echo $picture; ?>">
	<input type="hidden" value="<?php echo $username2; ?>" name="username"><input type="hidden" value="<?php echo $picture; ?>" name="pic"><input type="hidden" name="datepic" value="<?php echo $date ?>">
    <h4><?php echo $datec; ?></h4>
    </form>
    <p class="t"><form class="linksubmit" action="users/<?php echo $username; ?>/index.php" method="post">
	<input type="hidden" value="<?php echo $username; ?>" name="username"><input class="linksubmit" type="submit" value="<?php echo $username; ?>">
    </form> commented on <form class="linksubmit" action="users/<?php echo $username2; ?>/index.php" method="post">
	<input type="hidden" value="<?php echo $username2; ?>" name="username"><input class="linksubmit"type="submit" value="<?php echo $username2; ?>"></form>'s photo</p>
    
    <p><?php echo $comment; ?></p>
    </section>
    <?php
	}
	?>
	<form name="username1" action="users/<?php echo $username2; ?>/index.php" method="post">
	
	<input type="hidden" value="<?php echo $username2; ?>" name="username">
    </form>
	<form name="username2" action="users/<?php echo $username; ?>/index.php" method="post">
	
	<input type="hidden" value="<?php echo $username; ?>" name="username">
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