<?php

include 'helperFunctions.php'; 
session_start();

//Gather all the information submitted in the form
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];

//echo "user: " . $username . " pass: " . $password . "<br><br>";

//echo "About to make sure username is not taken <br><br>";


$db_connect = mysql_connect("dev-db.cd6byyjzs6xl.us-west-2.rds.amazonaws.com", "admin", "adminpassword") or die(mysql_error());
mysql_select_db("Econ_Dev_South", $db_connect);
	
	//echo "dbconnect: " . $db_connect . "<br><br>";


//Make Sure this username is not already taken
$query = "SELECT user FROM Users WHERE user = '".$username."'";
//echo "query is: " . $query. "<br><br>";
//echo "dbconnect: " . $db_connect . "<br><br>";
//echo "query is: " . $query;
$result = mysql_query($query, $db_connect) or die (mysql_error());  

//echo "Result was: " . $result . "<br><br>";

if(mysql_num_rows($result) > 0){
	echo "Error Mess: " . $_SESSION['error_message'];
	$_SESSION['error_message'] = "Username is already Taken. Try Another!";
	echo "Username is already Taken. Try Another! <br><br>";
	
	//close database connection
	mysql_close($db_connect);
	
	//Send User back to the New User Login Form
	header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
}
else{
	//Salt and Hash password
	$password = $password . "abc123";
	$password = md5($password);
	
	//generate appropriate query
	$query = "INSERT into Users (user,password,firstname,lastname) VALUES ('" . $username . "','" . $password . "','" . $firstname . "','" . $lastname . "')";
	//store the new user
	$sqlResult = mysql_query($query, $db_connect) or die(mysql_error());
	//echo "sqlResult was: " . $sqlresult . "<br><br>";
	
	//close database connection
	mysql_close($db_connect);
	
	//echo "Stored Information in Database <br> <br>";
	
	//Send User back to the Login Page, clear any error messages
	$_SESSION['error_message'] = "";
	header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
}

?>