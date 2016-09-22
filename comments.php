<?php
session_start();
if(!isset($_SESSION['admin'])){
//redirect them to login
header('location:login.php');
exit();
}
$user=$_SESSION['user'];

include('includes/functionlib.php');

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
<h2 class="adminh2">Comments</h2>
<p class="error">Administrators, you may delete comments from this page.</p>
<?php
$users=run_my_query("SELECT * FROM comments ORDER BY id DESC");
$users -> data_seek(0);
		
?>
 
    <?php
    $users -> data_seek(0);
		while($row=$users->fetch_assoc()){
	$usern=$row['username'];
	$usern2=$row['username2'];
	$id=$row['id'];
	$comment=$row['comment'];
	$picture=$row['picture'];
			
	?>
   <section>
	<img class="thumb" src="users/<?php echo $usern2; ?>/img/<?php echo $picture; ?>">
	<p><?php echo $cap; ?></p>
    <h3><?php echo $usern; ?> commented on this picture</h3>
    <p class="comment"><?php echo $comment; ?></p>
	<form action="admin-delete-comment.php" method="get">
  <input type="hidden" name="userpic" value="<?php echo $picture; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
  <input type="submit" value="Delete Comment">
  </form>
    </section>
    <?php
	}
	?>
</section>
</div>
</body>
</html>