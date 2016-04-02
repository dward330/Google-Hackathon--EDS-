<?php session_start(); ?>
<! DOCTYPE HTML>
<html>
	<head>
		<title>
		EDS Admin
		</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/CSS/HomePage.css" rel="stylesheet">
		
		<script>
			$(document).ready(function(){
				$("#loginscreen").hide();
				$("#loginscreen").fadeIn(1500);
				
				$("#newuser").click(function(){
					location.href ="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/NewUserForm.php";
				});

				$("form").submit(function(event) {
				  if($("#password").val().length < 1  || $("#username").val().length < 1 ){
					  event.preventDefault();
				  	  alert("Invalid Username and/Or Password!");  	
				  }
				  else{
					  //continue;
				  }
				});
			});
		</script>
		<style>
			img.ri
			{
				position: relative;
				max-width: 80%;
				top: 10%;
				left: 10%;
				border-radius: 3px;
				box-shadow: 0 3px 6px rgba(0,0,0,0.9);
			}
 	 	</style>
	</head>
	<body>
	<br><br><br>
		<div class="container" id="loginscreen">
   			<img src="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/Images/newLogo.png" alt="EDS Logo" width="600" class="ri"><br><br>
  			<form role="form" action="http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/Login.php" Method="Post">
   		    	<div class="form-group">
      				<label for="usr">User Name:</label>
	  				<input type="text" class="form-control" name="username" id="username" autofocus maxlength="17" id="usr">
				</div>
    			<div class="form-group">
      				<label for="pwd">Password:</label>
      				<input type="password" class="form-control" name="password" id="password" maxlength="17" id="pwd"><br>
	  			</div>
	  			<button type="submit" id="login" name="submit" style="background:#99cc33;"class="btn btn-primary">Login</button>
		  		<button type="button" id="newuser" style="background:#99cc33;"class="btn btn-primary">New User</button>
		  	</form>
		  	<div style="clear:both;"><?php if (isset($_SESSION['error_message'])) {echo $_SESSION['error_message'];}?></div>
    	</div>
	</body>
</html>