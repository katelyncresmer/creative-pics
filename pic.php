<?php
session_start();
if(!isset($_SESSION['logged_in'])){
//redirect them to login
header('location:index.php');
exit();
}
$user=$_SESSION['user'];
$username=$_POST['username'];
$userpic=$_POST['pic'];
$datepic=$_POST['datepic'];
include('includes/functionlib.php');
$results=run_my_query("SELECT * FROM comments WHERE picture='$userpic'");
$rere=run_my_query("SELECT * FROM stream WHERE pic='$userpic'");
$rere -> data_seek(0);
		
		while($row=$rere->fetch_assoc()){
    
    $cap=$row['cap'];
    
		}
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="css/reset.css"/>
<link rel="stylesheet" href="css/style.css"/>
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
     <section id="picsec">
    <h1 id="pich"><center><?php echo $username; ?>'s Picture</center></h1>
	<img  src="users/<?php echo $username; ?>/img/<?php echo $userpic; ?>">
	<div id="picdiv">
    <h4><center><?php echo $datepic; ?></center></h4>
	<p class="livecap"><?php echo $cap; ?></div>
     <?php
	if($username==$user){
		?>
        <form style="display:inline-block;"action="edit-cap.php" method="post">
  <input type="hidden" name="userpic" value="<?php echo $userpic; ?>">
  <input type="submit" value="Edit Caption">
  </form>
	<form style="display:inline-block;"action="delete-picture.php" method="post">
  <input type="hidden" name="userpic" value="<?php echo $userpic; ?>">
  <input type="submit" value="Delete Picture">
  </form>
  <?php
	}
	?></p>
    <h2 style="background:#181C25;padding:1%;width:100%;margin-top:2%;">Comments</h2>
    <?php
    $results -> data_seek(0);
		$usern=$row['username'];
		while($row=$results->fetch_assoc()){
	$usern=$row['username'];
	$id=$row['id'];
	$comment=$row['comment'];
			
	?>
    <div class="picdiv2">
    <h3><a href="users/<?php echo $usern; ?>"><?php echo $usern; ?></a> posted a comment</h3>
    <p class="comment"><?php echo $comment; ?></p>
    <?php
	if($usern==$user){
		?>
	<form action="delete-comment.php" method="post">
  <input type="hidden" name="userpic" value="<?php echo $userpic; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="submit" value="Delete Comment">
  </form>
  
  <?php
	}
	?>
    </div>
    <?php
	}
	?>
  <h3>Post a Comment</h3>
  <form action="process-comment.php" method="post">
  <input type="hidden" name="userpic" value="<?php echo $userpic; ?>">
  <input type="hidden" name="username" value="<?php echo $username; ?>">
  <textarea name="comment"></textarea><br>
  <input type="submit">
  </form>
	</section>
		</div>	
	<footer>
<a rel="shadowbox"  href="about.php">About Creative Pics</a>
<a rel="shadowbox"  href="contact.php">Contact Us</a>
<a rel="shadowbox"  href="updates.php">Updates and Added Features</a>
<h6>&copy; Katelyn Hare 2014</h6>

</footer>


</body>
</html>