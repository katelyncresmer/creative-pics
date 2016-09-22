<?php
session_start();
if(isset($_SESSION['logged_in'])){
	header("location:dashboard.php");
};
include('includes/functionlib.php');
$add_error1='';
$add_error2='';
$add_error3='';
if(isset($_SESSION['invalid_user'])){
	$add_error1="<p class=\"error\">Username or Password is incorrect</p>";
};
if(isset($_SESSION['wrong_email'])){
	$add_error2="<p class=\"error\">Email is already in use</p>";
};
if(isset($_SESSION['wrong_username'])){
	$add_error3="<p class=\"error\">Username is already taken</p>";
};
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet"  href="css/reset.css">
<link rel="stylesheet"  href="css/style.css">
<link rel="stylesheet" href="css/shadowbox.css"/>
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Expletus+Sans' rel='stylesheet' type='text/css'>
<link href="img/logo.png" type="image/x-icon" rel="icon"/>
<meta charset="utf-8">
<title>Creative Pics</title>
<script src="js/shadowbox.js"></script>
<script type="text/javascript">
	Shadowbox.init({
	language: 'en',
	players: ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
	});
</script>
<script language="JavaScript1.1">
<!--
var slideimages=new Array()
var slidelinks=new Array()
function slideshowimages(){
for (i=0;i<slideshowimages.arguments.length;i++){
slideimages[i]=new Image()
slideimages[i].src=slideshowimages.arguments[i]
}
}
function slideshowlinks(){
for (i=0;i<slideshowlinks.arguments.length;i++)
slidelinks[i]=slideshowlinks.arguments[i]
}
function gotoshow(){
if (!window.winslide||winslide.closed)
winslide=window.open(slidelinks[whichlink])
else
winslide.location=slidelinks[whichlink]
winslide.focus()
}
//-->
</script>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>

<body>
<header>
	<img class="thumb" src="img/logo.png">
	<h1 id="logh">An artistic piece of art everyday!</h1>
	<div class="logf">
		<h2>Login</h2>
		<?php echo $add_error1; unset($_SESSION['invalid_user']); ?>
		<form action="process-login.php" method="post">
			<input type="text" name="uname" placeholder="Username" required>
			<input type="password" name="upass" placeholder="Password" required>
			<input type="submit" value="Login">
		</form>
	</div>
</header>
<main>
	<div id="slideshow">
		<img src="img/1slideshow.jpg" name="slide">
		<script>
		<!--

		//configure the paths of the images, plus corresponding target links

		slideshowimages("img/1slideshow.jpg","img/2slideshow.jpg","img/3slideshow.jpg","img/4slideshow.jpg","img/5slideshow.jpg")

		//configure the speed of the slideshow, in miliseconds
		var slideshowspeed=5000

		var whichlink=0
		var whichimage=0
		function slideit(){
		if (!document.images)
		return
		document.images.slide.src=slideimages[whichimage].src
		whichlink=whichimage
		if (whichimage<slideimages.length-1)
		whichimage++
		else
		whichimage=0
		setTimeout("slideit()",slideshowspeed)
		}
		slideit()

		//-->
		</script>
		<!--<div class="slides">
		<img src="img/1slideshow.jpg">
		</div>-->
	</div>
	<div class="logf logf2">
		<h2>Signup</h2>
		<form action="process-register.php" method="post">
		<input type="text" name="newname" placeholder="Name" required>
		<input type="email" name="newemail" placeholder="Email" required><?php echo $add_error2; unset($_SESSION['wrong_email']); ?>
		<input type="text" name="newuname" placeholder="Username" required><?php echo $add_error3; unset($_SESSION['wrong_username']); ?>
		<input type="password" name="newpass" placeholder="Password" required>
		<input type="submit" value="Signup">
		</form>
	</div>
</main>
<footer>
	<div>
		<a href="login.php">Admin Login</a>
		<a rel="shadowbox"  href="about.php">About Creative Pics</a>
		<a rel="shadowbox"  href="contact.php">Contact Us</a>
		<a rel="shadowbox"  href="updates.php">Updates and Added Features</a>
	</div>
	<h6>&copy; <a href='http://katelynhare.com'>Katelyn Hare</a> <?php echo date("Y") ?></h6>
</footer>
</body>
</html>