<?php
session_start();
header("Location: users.php");
//here, insert code from an externl file
include('includes/functionlib.php');
$user=$_POST['username'];
//alert("Are you sure you want to delete your account?");

//obtain next available id number//
$results=run_my_query("SELECT * FROM users");
$profile=run_my_query("SELECT * FROM profile");
$results -> data_seek(0);
		//run a speacial while loop, repeating what's in {} for each row of our table, stopping when it runs out of rows
		$profile->data_seek(0);

//query to add a record
run_my_query("
	DELETE FROM users WHERE username='".$user."' 
");
run_my_query("
	DELETE FROM profile WHERE username='".$user."' 
");
run_my_query("
	DELETE FROM stream WHERE username='".$user."' 
");

$files = glob("users/$user/*"); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
$files = glob("users/$user/img/*"); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
rmdir("users/$user/img");
rmdir("users/$user");
header("Location: users.php");
exit();
?>