<?php

include 'helperfunctions.php';

//Gather all the information submitted in the form
$username = $_POST['username'];
$password = $_POST['password'];

//Salt and Hash password
	$password = $password . "abc123";
	$password = md5($password);

//verify credentials
$query = "SELECT user,password FROM Users WHERE user = '$username'";
$result = mysql_query($query, $db_connect) or die(mysql_error()); //run query

//see if the user even exists
if(mysql_num_rows($result) < 1){
	$_SESSION['error_message'] = "Incorrect Username and/or Password";

	//close database connection
	mysql_close($db_connect);

	//Send User back to the New User Login Page
	header('Location: http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/WebPortal.php');
}
else{
	//change result into associative array
	$credentials = mysql_fetch_assoc($result);
	
	//compare password
	if (strcmp($credentials['password'], $password) == 0 ){		
		//close database connection
		mysql_close($db_connect);
		
		//store logged in session variable
		$_SESSION['Loggedin'] = 1;
		
		//Access Granted
		header('Location: http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/Administration.php');
		
	}
	else{
		$_SESSION['error_message'] = "Incorrect Username and/or Password<br>";
		
		//close database connection
		mysql_close($db_connect);
		
		//Send User back to the Login Page
		header('Location: http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/WebPortal.php');
		
		//close database connection
		mysql_close($db_connect);
		
	}
}


?>