<?php
	//$body = file_get_contents('php://input');
	//$Environment_Issue = json_decode($_POST["data"], TRUE);

	//FOR GATHER THE INFORMATION PERTAINING TO THE ENVIRONMENT ISSUE

	$Environment_Issue = json_decode($_POST["Issue_Information"], TRUE);

	if (isset($Environment_Issue)){
		echo "Json Object Received...\n";

		echo "This is the information that was sent via JSON:\n";
		echo "First Name: " . $Environment_Issue["firstName"] . "\n" ;
		echo "Last Name: " . $Environment_Issue["lastName"] . "\n" ;
		echo "Phone Number: " . $Environment_Issue["phoneNumber"] . "\n" ;
		echo "Email: " . $Environment_Issue["email"] . "\n" ;
		echo "Zip Code: " . $Environment_Issue["zipCode"] . "\n" ;
		echo "Description: " . $Environment_Issue["description"] . "\n" ;
		echo "Issue Type: " . $Environment_Issue["issueType"] . "\n" ;
		echo "Longitude: " . $Environment_Issue["longitude"] . "\n" ;
		echo "Latitude: " . $Environment_Issue["latitude"] . "\n" ;

		$firstName = $Environment_Issue["firstName"];
		$lastName = $Environment_Issue["lastName"];
		$phoneNumber = $Environment_Issue["phoneNumber"];
		$email = $Environment_Issue["email"];
		$zipCode = $Environment_Issue["zipCode"];
		$description = $Environment_Issue["description"];
		$issueType = $Environment_Issue["issueType"];
		$longitude = $Environment_Issue["longitude"];
		$latitude = $Environment_Issue["latitude"];


		//GATHER THE Photographic INFORMATION if there is any

		//Is there a Photo?
		if (isset($_FILES["Image"]["name"])){ //YES!!!
			echo "There was a image submitted too..<br><br>";

			$target_dir = dirname(__FILE__) . "/imageUploads/";

			$target_file = $target_dir . basename($_FILES["Image"]["name"]);

			echo "Target Filepath: " . $target_file . "<br><br>"; //Print Final File Destination

			echo "Temporary Location: " . $_FILES["Image"]["tmp_name"] . "<br><br>"; //Print Temporary File Storage Location

			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); //Get Image File Type
			echo "Image Filetype: " . $imageFileType . "<br><br>"; //Print Image File Type

			// Check if the Image file is a actual Image or a fake image
		    $check = getimagesize($_FILES["Image"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . "." . "<br><br>";
		        $uploadOk = 1;
		        
		        //Move the Image from the temporary location to the final Location
		        if(move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file)) {
					echo "Image is Uploaded" . "<br><br>";
				} 
				else{
		    		echo "Image is not Uploaded" . "<br><br>";
				}

		    } else { //File is not an image
		        echo "File is not an image." . "<br><br>";
		        $uploadOk = 0;
		    }

		    if (function_exists('mysql_connect')) {
     			echo "mysql is installed\n";
			} 
			else{
				echo 'mysql is NOT installed\n';
			}

			echo "Attempting to Connect to AWS Sql Database...\n";

			$databaseHost = 'qa-server-database.cd6byyjzs6xl.us-west-2.rds.amazonaws.com';
			//$databaseHost = 'localhost';
			$databaseName = 'Econ_Dev_South';
			$databaseUser = 'EDSQADB';
			$databasePass = 'EDSQADBpass';

			$db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());
			
			if (isset($db_connect)){
				echo "Connecting to the Database is Successful!..\n";

				//Select the correct database we want to talk to
				mysql_select_db($databaseName, $db_connect);

				$query = "INSERT into Environment_Issues (firstName, lastName, phoneNumber, email, zipCode, description, issueType, longitude, latitude, Image_Here, Image_Filepath) VALUES ('" . $firstName . "','" . $lastName . "','" . $phoneNumber . "','" . $email . "','" . $zipCode . "','" . $description . "','" . $issueType . "','" . $longitude . "','" . $latitude . "','" . "YES" . "','" . $target_file ."')";

				echo "\nThe Following is the SQL Query we will execute:\n" . $query . "\n\n";

				//Execute Query
				$queryResult = mysql_query($query, $db_connect) or die (mysql_error());

				if (isset($queryResult)){
					echo "Information was stored in the Database Successuflly!..\n";
				}
				else{
					echo "Invalid Query!\n";
				}

			}
			else{
				echo "Connecting to the Database Failed!";
			}

			//END OF SUBMISSTION WITH AN IMAGE!!!  

		}
		else{ //NO!!!
			echo "There was not an image submitted too..<br><br>";

			if (function_exists('mysql_connect')) {
     			echo "mysql is installed\n";
			} 
			else{
				echo 'mysql is NOT installed\n';
			}

			echo "Attempting to Connect to AWS Sql Database...\n";

			$databaseHost = 'qa-server-database.cd6byyjzs6xl.us-west-2.rds.amazonaws.com';
			//$databaseHost = 'localhost';
			$databaseName = 'Econ_Dev_South';
			$databaseUser = 'EDSQADB';
			$databasePass = 'EDSQADBpass';

			$db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());
			
			if (isset($db_connect)){
				echo "Connecting to the Database is Successful!..\n";

				//Select the correct database we want to talk to
				mysql_select_db($databaseName, $db_connect);

				$query = "INSERT into Environment_Issues (firstName, lastName, phoneNumber, email, zipCode, description, issueType, longitude, latitude, Image_Here) VALUES ('" . $firstName . "','" . $lastName . "','" . $phoneNumber . "','" . $email . "','" . $zipCode . "','" . $description . "','" . $issueType . "','" . $longitude . "','" . $latitude . "','" . "NO" . "')";

				echo "\nThe Following is the SQL Query we will execute:\n" . $query . "\n\n";

				//Execute Query
				$queryResult = mysql_query($query, $db_connect) or die (mysql_error());

				if (isset($queryResult)){
					echo "Information was stored in the Database Successuflly!..\n";
				}
				else{
					echo "Invalid Query!\n";
				}

			}
			else{
				echo "Connecting to the Database Failed!";
			}
		}

		//END OF SUBMISSTION WITHOUT AN IMAGE !!!! 
	}
	else{ //Unable to get the non-photographic information about the Issue
		echo "Decoding the json object failed!..\n";
	}




?>