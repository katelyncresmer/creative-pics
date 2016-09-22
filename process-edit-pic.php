<?php
session_start();
header('location: profilethanks.php');
//here, insert code from an externl file
include('includes/functionlib.php');

$pic=$_POST['newpic'];

$user=$_SESSION['user'];

//obtain next available id number//
$results=run_my_query("SELECT id FROM profile ORDER BY id DESC LIMIT 1");


$results -> data_seek(0);
		//run a speacial while loop, repeating what's in {} for each row of our table, stopping when it runs out of rows
		while($row=$results->fetch_assoc()){
			//store highest id of the highest number 
			$id =$row['id'];
			//add one to it
			$newid=$id+1;
		};


$oldpicname=$_FILES['newpic']['name'];
$newpicname='pro'.$newid.$oldpicname;


move_uploaded_file($_FILES['newpic']['tmp_name'],"users/$user/img/$newpicname");
//query to add a record
run_my_query("
	UPDATE profile
		SET picture=\"$newpicname\"
		WHERE username='$user' 
");

//redirect user back to all-socks
header('location: profilethanks.php');

?>