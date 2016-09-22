<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
$dash='<li><a href="dashboard.php">Dashboard</a></li>
	   <li><a href="upload.php">Upload</a></li>
      <li><a href="live.php">Live Feed</a></li>
      <li><a href="bugs.php">Report Bugs</a></li>
      <li><a href="myprofile.php">Profile</a></li>
      <li><a href="account.php">Account</a></li>';
if(isset($_SESSION['admin'])){
	$dash='<li><a href="adminindex.php">Dashboard</a></li>
		   <li><a href="users.php">Users</a></li>
		  <li><a href="live.php">Live Feed</a></li>
		  <li><a href="comments.php">Comments</a></li>';
}

$user=$_SESSION['user'];
include('includes/functionlib.php');
$results=run_my_query("SELECT * FROM stream ORDER BY id DESC");
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
<?php
if(isset($_SESSION['admin'])){
echo '<link rel="stylesheet" href="css/admin.css"/>';
}
?>
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
      <?php echo $dash ?>
      <li><a href='logout.php'>Logout</a></li>
    </ol>
  </nav>
</header>
<div class="bodycontain">

<h1 id="dashh">Live Stream</h1>
<?php
if(isset($_SESSION['admin'])){
echo '<p class="error">Administrators, when you hit the \'Delete Picture\' button, you are deleting the entire post along with the comments that go with it.</p>';
}
?>
<div id="livefeed">
<?php
		
		$results -> data_seek(0);
		
		while($row=$results->fetch_assoc()){
    $id =$row['id'];
    $username=$row['username'];
    $pic=$row['pic'];
    $cap=$row['cap'];
    $date=$row['date'];
			
	?>
	<section class="livesec">
    
    <form action="pic.php" method="post">
    <input type="hidden" value="<?php echo $pic; ?>" name="picture"><input type="hidden" name="username" value="<?php echo $username; ?>"><input type="hidden" name="pic" value="<?php echo $pic ?>"><input type="hidden" name="datepic" value="<?php echo $date ?>">
	<input type="image" class="livepic" src="users/<?php echo $username; ?>/img/<?php echo $pic; ?>">
	
    </form>
    <h4><?php echo $date; ?></h4>
   <p class="livep"><form class="linksubmit" action="users/<?php echo $username; ?>/index.php" method="post">
	<input type="hidden" value="<?php echo $username; ?>" name="username"><input class="linksubmit" type="submit" value="<?php echo $username; ?>">
    </form> posted a picture</p>
    
    <hr>
	<p class="livecap"><?php echo $cap; ?></p>
    <?php
	if(isset($_SESSION['admin'])){
    echo '<form action="admin-delete-pic.php" method="post">
    <input type="hidden" value="<?php echo $pic; ?>" name="picture"><input type="hidden" name="username" value="<?php echo $username ?>"><input type="hidden" name="pic" value="<?php echo $pic ?>"><input type="hidden" name="datepic" value="<?php echo $date ?>">
	<input type="submit" value="Delete Picture">
    </form>';
	}
    ?>
	</section>
	<?php
	}
	?>
	
</div>
</div>
<footer>
<a rel="shadowbox"  href="about.php">About Creative Pics</a>
<a rel="shadowbox"  href="contact.php">Contact Us</a>
<a rel="shadowbox"  href="updates.php">Updates and Added Features</a>
<h6>&copy; Katelyn Hare 2014</h6>

</footer>
</body>
</html>