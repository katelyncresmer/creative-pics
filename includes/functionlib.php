<?php

/**
*connects to my host and DB and run a query
*
*@param string $q
**/

function run_my_query($q){
	//make a connection to our server and database
	//mysqli( , , ) takes four parameters mysqli (servername, username. password, BDname)
	$mysqli=new mysqli('localhost','ktrxs_ktrxs','KTRXS','ktrxs_creative');
	
	//if that object returned an errir (connect_errno is 1)...
	if ($mysqli -> connect_errno){
		//display custom message
		echo 'problem connecting to server or BD'.$mysqli ->connect_error;
	};
	//$ladykiller=new Neon();
	//$supercar= new Neon();
	
	//run a query (passed in argument)on our table, storing results in an array 
	$results = $mysqli -> query($q)or die('problem with query: '.$mysqli->error);
	//$ladykiller -> startMoving();
	//Neon.mpg;
	//Neon.startMoving();
	//echo $ladykiller -> mpg;
	
	// close connection
	mysqli_close($mysqli);
	
	//send back the results to wherever the function was called
	return $results;
};
?>


