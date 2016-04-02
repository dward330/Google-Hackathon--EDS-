<?php session_start();?>
<! DOCTYPE HTML>
<html>
	<html lang="en">
	<head>
		<title>
		EDS Adminisrtation
		</title>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> 
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
		
		<script>
			$(document).ready(function(){
				//Hide Gallery Section
				$("#gallery").hide();
                                
                                //Hide ID Column
                                $( ".hideID" ).hide();
				
				$("#galleryLink").click(function(){
					//$("#gallery").show();
					$( "#gallery" ).fadeIn(1100, function() {
					    // Animation complete
					  });
					$("#reports").hide();
				});

				$("#reportsLink").click(function(){
					$("#gallery").hide();
					$("#reports").fadeIn(1100);
				});
                                
                                //When the Delete Button is clicked:
                                $("button").click(function(){
                                    //grab the button element that was clicked
                                    var element = $(this); 
                                    
                                    //Get the class of the button that was clicked
                                    var elementClass = "."+element.attr("class")+"";
                                    
                                    //alert("delete clicked: "+elementClass);
                                    
                                    //Hide all elements of that class
                                    $(elementClass).hide();
                                    
                                    //Delete Environment Issue from Database
                                    $.post( "deleteEntry.php", { id: element.attr("class") } );
                                });
                                
			});
		</script>
	</head>
	<body style="padding-top: 70px; ">
	<?php 
		include 'helperfunctions.php';
		checkLogin();
		
		$f = 4;
	?>
		<div class="container-fluid">
		<nav class="navbar navbar-inverse navbar-fixed-top" style="background-color:#99cc33" >
	    		<div class="navbar-header" style="background-color:#99cc33">
	      			<a class="navbar-brand" href="#">Economic Development South</a>
	    		</div>
		    	<div>
		      		<ul class="nav navbar-nav" >
		        		<li><a href="http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/logout.php">Log Out</a></li>
		        		<li><a href="#" id="galleryLink">Gallery</a></li>
		        		<li><a href="#" id="reportsLink">Reports</a></li>
		      		</ul>
		    	</div>
		</nav>
		
		</div>
		<br><br><br><br><br>
		<div class="container" id="gallery" style="width:100%;">
  			<h2>Table of All Environmental Issues:</h2> 
  			<div class ="row" style="width:100%;">
  				<div class = "col-md-12 table-responsive" style="overflow:auto;width:100%;">
  					<table class="table table-striped">
    					<thead>
		    				<tr>
                                                    <th class="hideID">ID Number:</th>
                                                    <th>Type of Issue:</th>
                                                    <th>Photo:</th>
                                                    <th>Description:</th>
                                                    <th>Longitude:</th>
                                                    <th>Latitude:</th>
                                                    <th>Date:</th>
                                                    <th>First Name:</th>
                                                    <th>Last Name:</th>
                                                    <th>Zip Code:</th>
                                                    <th>Email:</th>
                                                    <th>Phone Number:</th>
                                                    <th>Delete Me?</th>
		     				</tr>
		    			</thead>
		    			<tbody>
		    				<?php 
		    					//Database Connection Stuff:
		    					$db_connect = mysql_connect("dev-db.cd6byyjzs6xl.us-west-2.rds.amazonaws.com", "admin", "adminpassword") or die(mysql_error());
								mysql_select_db("Econ_Dev_South", $db_connect);

							  	//How many issues are there?
							  	$sqlQuery = "SELECT * FROM Environment_Issues";
							  	$result = mysql_query($sqlQuery, $db_connect) or die(mysql_error());
							  	$numOfIssues = mysql_num_rows($result);
								echo "Num of Rows of Data: " . $numOfIssues . "<br><br>";
							  	//Turn list of all Environment Issues into associative arrary
								//$environmentIssues = mysql_fetch_assoc($result);

								$x= 0;
								//foreach($environmentIssues as $columnName => $fieldValue) {
								while ($environmentIssues = mysql_fetch_array($result, MYSQL_ASSOC)){
								//echo "" . $x++ . "<br>";
									
                                                                    //Get the id number of the issue:
                                                                    $temp = $environmentIssues["id"];
                                                                    if (strcmp($temp, "") == 0 ){
                                                                        //Start a new row in table
                                                                        echo "<tr>\n";
                                                                    }
                                                                    else{
                                                                        echo "<tr class=\"". $temp ."\">\n";
                                                                    }
                                                                        
                                                                    //Get the id number of the issue:
                                                                    $temp = $environmentIssues["id"];
                                                                        if (strcmp($temp, "") == 0 ){
                                                                            echo "<td>" . " No-Content \n" . "</td>\n";
                                                                        }
                                                                        else{
                                                                            echo "<td class=\"hideID\">" . $temp . "</td>\n";
                                                                        }

                                                                        //See if 'Type of issue' field is blank
                                                                        $temp = $environmentIssues["issueType"];
                                                                        //echo "" . $test . "<br>";
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}
									

									//See if there is an image 
									$temp = $environmentIssues['Image_Here'];
									$temp2 = $environmentIssues['Image_Filepath'];
									if (strcmp($temp, "NO") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										$imgLocation = substr($temp2,13);
										$imgLocation = "http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com" . $imgLocation;
										echo "<td><img height=\"100\" width=\"100\"class = \"img-rounded\" src = \"" . $imgLocation . "\"></td>\n";
									}

									
									//See if 'Description' field is blank 
									$temp = $environmentIssues['description'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'Longitude' field is blank 
									$temp = $environmentIssues['longitude'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'Latitude' field is blank
									$temp = $environmentIssues['latitude'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'Date' field is blank
									$temp =  $environmentIssues['date'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'First Name' field is blank 
									$temp = $environmentIssues['firstName'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'Last Name' field is blank 
									$temp = $environmentIssues['lastName'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'zip-code' field is blank 
									$temp = $environmentIssues['zipCode'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}


									//See if 'zip-code' field is blank 
									$temp = $environmentIssues['email'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}

									//See if 'phone number' field is blank
									$temp = $environmentIssues['phoneNumber'];
									if (strcmp($temp, "") == 0 ){
										echo "<td>" . " No-Content \n" . "</td>\n";
									}
									else{
										echo "<td>" . $temp . "</td>\n";
									}
                                                                        
                                                                        //Get the id number of the issue:
                                                                        $temp = $environmentIssues["id"];
                                                                        if (strcmp($temp, "") == 0 ){
                                                                            //Add Delete Button
                                                                            echo "<td><button type=\"button\">Delete Me</button></td>\n";
                                                                        }
                                                                        else{
                                                                            //Add Delete Button
                                                                            echo "<td><button type=\"button\" class=\"". $temp ."\">Delete Me</button></td>\n";
                                                                        }
                                                       
									//Close row in table
									echo "</tr>\n";
									
								}
										
							  	mysql_close($db_connect);
							  	
							  ?>
		    			</tbody>
		 			</table>
  				</div>
  			</div>           
		  </div>
		<div class="container" id="reports">
		</div>
	</body>
</html>
	
