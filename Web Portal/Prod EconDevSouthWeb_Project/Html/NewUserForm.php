<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<meta charset="UTF-8">
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
	<body style="background-color:#DeeBB3; color:white">
		<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#99cc33" >
	  		<div class="container-fluid">
	    		<div class="navbar-header" style="background-color:#99cc33">
	      			<a class="navbar-brand" href="#">Economic Development South</a>
	    		</div>
		    	<div>
		      		<ul class="nav navbar-nav" >
		        		<li><a href="http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php">Login Page</a></li>
		      		</ul>
		    	</div>
	  		</div>
		</nav>
		<br><br>
		<br>
		<br>
		<br>
		<br>
		<div class="container-fluid">
		  <h2>Please Provide the following Information:</h2>
		  <form role="form" action="http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/NewUser.php" method="POST">
		  	<div class="form-group">
		      <label for="firstname">First name:</label>
		      <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
		    </div>
		    <div class="form-group">
		      <label for="lastname">Last Name:</label>
		      <input type="text" class="form-control" id="username" name="lastname" placeholder="Enter Last Name">
		    </div>
		    <div class="form-group">
		      <label for="username">Username:</label>
		      <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Password:</label>
		      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Confirm Password:</label>
		      <input type="password" class="form-control" id="cpassword" placeholder="Confirm password">
		    </div>
		    <input type="submit" name="submit" id="submit" class="btn btn-default"/>
		  </form>
		</div>
		
	</body>
</html>