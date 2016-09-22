<?php
session_start();
header('location: index.php');
//here, insert code from an externl file
include('includes/functionlib.php');

$name=$_POST['newname'];
$email=$_POST['newemail'];
$uname=$_POST['newuname'];
$pass=$_POST['newpass'];



//obtain next available id number//
$results=run_my_query("SELECT * FROM users");
$profile=run_my_query("SELECT * FROM profile");
$remail=run_my_query("SELECT * FROM users 
                  WHERE email='$email'");
$runame=run_my_query("SELECT * FROM users
                  WHERE username='$uname'");


if($row=$remail->fetch_assoc()){
  session_start();
  $_SESSION['wrong_email']=true;
  header("location:index.php");
  exit();
}else if($row=$runame->fetch_assoc()){
  session_start();
  $_SESSION['wrong_username']=true;
  header("location:index.php");
  exit();
}else{
//query to add a record
run_my_query("
	INSERT INTO users
		VALUES 
		(NULL, '$name', '$email', '$uname', '$pass'); 
");
run_my_query("
	INSERT INTO profile
		VALUES 
		(NULL, NULL, NULL, '$uname', 'logo.png' ); 
");

mkdir('users/'.$uname.'');
mkdir('users/'.$uname.'/img');
touch('users/'.$uname.'/index.php');
touch('users/'.$uname.'/img/default.png');
copy('profile.php', 'users/'.$uname.'/index.php');
copy('img/default.png', 'users/'.$uname.'/img/default.png');


//redirect user back to all-socks
header('location: thanks.php');

}






    	
       
?><!-- echo '<script>';
  echo '$(document).append(\'<html>\');';
  echo '$(\'html\').append(\'<head>\');';
  echo '$(\'html').append('<body>');
  </script-->

<!--$SQL="CREATE TABLE AddressBook 
(
ID int(7) NOT NULL auto_increment,
First_Name varchar(50) NOT NULL,
Surname varchar(50) NOT NULL,
email varchar(50),
PRIMARY KEY (ID),
UNIQUE id (ID)
)";

mysql_query($SQL);



 getDirectory('./');
        function getDirectory($path='.',$level=0)
        {
        $ignore = array('.','..','css','data','img','includes');
        $dh = @opendir ($path);
        while (false !== ($file = readdir($dh)))
        {
        if( !in_array($file, $ignore))
        {
        $spaces = str_repeat( '&nbsp;', ($level *5));
        if(is_dir("$path/$file"))
        {
        echo $spaces."<a href='$path/$file/index.php'>$file</a><br/>";
        getDirectory("$path/$file", ($level+1));
        }
        }
        }
        closedir($dh);
		}-->