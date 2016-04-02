<?php
	$body = file_get_contents('php://input');
	//$Environment_Issue = json_decode($_POST["data"], TRUE);
	$Environment_Issue = json_decode($body, TRUE);

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
		
		if (function_exists('mysql_connect')) {
     		echo "mysql is installed\n";
		} 
		else{
			echo 'mysql is NOT installed\n';
		}

		echo "Attempting to Connect to AWS Sql Database...\n";

		$databaseHost = 'dev-db.cd6byyjzs6xl.us-west-2.rds.amazonaws.com';
		//$databaseHost = 'localhost';
		$databaseName = 'Econ_Dev_South';
		$databaseUser = 'admin';
		$databasePass = 'adminpassword';

		$db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());
		
		if (isset($db_connect)){
			echo "Connecting to the Database is Successful!..\n";

			//Select the correct database we want to talk to
			mysql_select_db($databaseName, $db_connect);

			$query = "INSERT into Environment_Issues (firstName, lastName, phoneNumber, email, zipCode, description, issueType, longitude, latitude) VALUES ('" . $firstName . "','" . $lastName . "','" . $phoneNumber . "','" . $email . "','" . $zipCode . "','" . $description . "','" . $issueType . "','" . $longitude . "','" . $latitude . "')";

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
	else{
		echo "Decoding the json object failed!..\n";
	}




?>