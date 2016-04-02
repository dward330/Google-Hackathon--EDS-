<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta charset="utf-8"> 
    	
    	<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

		<style type="text/css">
			h2 {
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, sans-serif;
				font-size: 29px;
				font-style: normal;
				font-variant: normal;
				font-weight: 500;
				line-height: 26.3999996185303px;
			}

			label {
				font-family: 'Gill Sans', 'Gill Sans MT', Calibri, sans-serif;
				font-size: 18px;
				font-style: normal;
				font-variant: normal;
				font-weight: 500;
				line-height: 26.3999996185303px;
				color:white;
			}

			.form-group {
				margin-bottom: 22px;
			}

			form {
				margin-bottom: 36px;
			}
		</style>
		<title>New User Registration</title>
		
		<script>
			$(document).ready(function(){
				
				$("form").submit(function(event) {
				  if ( $("#password").val() !== $("#cpassword").val() ) {
					  event.preventDefault();
				  	  alert("Passwords do not match! Please try again.");
				  	  $("#password").val("");
				  	  $("#cpassword").val("");
				  }
				  else if($("#password").val().length < 1  || $("#username").val().length < 1 || $("#firstname").val().length < 1 || $("#lastname").val().length < 1 ||$("#password").val().length < 1){
					  event.preventDefault();
				  	  alert("All Criteria is Required!");  	
				  }
				  else{
					  //continue;
				  }
				});
			});
		</script>
	</head>
	<body style="background-color:#DeeBB3;">
		<div class="container-fluid text-center" style="background-color:#8B4E9E;padding-bottom:25px;">
 			<a href="http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php"><img src="./Images/SMR.png" class="img-rounded" style="width:30%;margin-top:12px;margin-bottom:22px;box-shadow: 0 3px 6px rgba(0,0,0,0.9);"></a><br>
 			<h2 class="text-center" style="color:white;">Register A New User:</h2>
 		</div>
 		<div class="container-fluid" style="background-color:#8BAD7A;padding-top:25px;">
 			<form role="form" action="http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/NewUser.php" method="POST">
 				<div class="form-group">
 					<label for="firstNameInput">First Name:</label>
 					<input class="form-control" type="text" id="firstname" name="firstname" placeholder="Enter First Name" >
 				</div>
 				<div class="form-group">
 					<label for="lastNameInput">Last Name:</label>
 					<input class="form-control" type="text" id="lastname" name="lastname" placeholder="Enter Last Name" >
 				</div>
 				<div class="form-group">
 					<label for="emailInput">Email:</label>
 					<input class="form-control" type="email" id="email" name="email" placeholder="Enter Email Address" >
 				</div>
 				<div class="form-group">
 					<label for="usernameInput">Username:</label>
 					<input class="form-control" type="text" id="username" name="username" placeholder="Enter Desired Username" >
 				</div>
 				<div class="form-group">
 					<label for="passwordInput">Password:</label>
 					<input class="form-control" type="password" id="password" name="password" placeholder="Enter Desired Password" >
 				</div>
 				<div class="form-group">
 					<label for="confirmPasswordInput">Confirm Password:</label>
 					<input class="form-control" type="password" id="cpassword" placeholder="Confirm Password" >
 				</div>
 				<button type="submit" name="submit" id="submit" class="btn btn-warning">Create New User</button>
 			</form>
 			<div class="text-center" style="width:100%;">
 				<a href="http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php"><button type="button" class="btn btn-warning btn-lg">Return to Login Page</button></a>
 			</div>
 		</div>
	</body>
</html>