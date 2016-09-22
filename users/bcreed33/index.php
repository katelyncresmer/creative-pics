<?php
session_start();
include('../../includes/functionlib.php');

$path = realpath(dirname(__FILE__));
$folder_array = explode('/', $path);
$i = count($folder_array) - 1;
$folder = $folder_array[$i];

$user=$_POST['username'];

$results=run_my_query("SELECT * FROM users WHERE username='$folder'");
$profile=run_my_query("SELECT * FROM profile WHERE username='$folder'");
		
		$results -> data_seek(0);
		
		while($row=$results->fetch_assoc()){
    $id =$row['ID'];
    $username=$row['username'];
    $name=$row['name'];
		$email=$row['email'];
		$pass=$row['password'];
			}
	
		
		$profile -> data_seek(0);
		
		while($row=$profile->fetch_assoc()){
    $about=$row['about'];
		$web=$row['website'];
		$pic=$row['picture'];
			}


	
?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Creative Pics</title>
<link rel="stylesheet" href="../../css/reset.css"/>
<link rel="stylesheet" href="../../css/style.css"/>
<link rel="stylesheet" href="css/shadowbox.css"/>
<script src="js/shadowbox.js"></script>
<script type="text/javascript">
Shadowbox.init({
language: 'en',
players: ['img', 'html', 'iframe', 'qt', 'wmp', 'swf', 'flv']
});
</script>
</head>

<body id="dashhome">
<header>
  <img class="thumb" src="../../img/logo.png"/>
  <nav>
    <ol>
      <li><a href="../../dashboard.php">Dashboard</a></li>
      <li><a href="../../upload.php">Upload</a></li>
      <li><a href="../../live.php">Live Feed</a></li>
      <li><a href="../../bugs.php">Report Bugs</a></li>
      <li><a href='../../myprofile.php'>Profile</a></li>
      <li><a href="../../account.php">Account</a></li>
      <li><a href='../../logout.php'>Logout</a></li>
    </ol>
  </nav>
</header>
<div class="bodycontain">
<h1 id="dashh"><center><?php echo $username; ?>'s Profile</center></h1>
<div class="profilepic"><img class="profilepic" src="img/<?php echo $pic; ?>" alt="profile picture"></div>
<div class="aboutme">
<h3><center><?php echo $name; ?></center></h3>

<h5><center><?php echo $username; ?></center></h5>



<h3><strong>About <?php echo $name; ?></strong></h3>
<a class="userweb" href="http://<?php echo $web; ?>"><?php echo $web; ?></a>
<p class="aboutdescr"><?php echo $about; ?></p>
</div>

			
<div class="userstream">
<h2 style="background:#181C25;padding:1%;width:100%;">Stream</h2>
<?php
$stream=run_my_query("SELECT * FROM stream WHERE username='$user' ORDER BY id DESC");
		$stream -> data_seek(0);
		
		while($row=$stream->fetch_assoc()){
    $picture=$row['pic'];
		$cap=$row['cap'];
		
		?>
		<section>
		<img class="prostrepic" src="img/<?php echo $picture; ?>">
		<p><?php echo $cap; ?></p>
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