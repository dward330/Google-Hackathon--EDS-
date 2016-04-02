<?php

    require ("Environment_Issue_Class.php");
    require ("QA_Server_HelperFunctions.php");
    
    //Default Variables
    $directoryToSaveTo = dirname(__FILE__) . "/imageUploads/";
    $imageHere = "NO"; 
    $absPathToImage = "";
    if (isset($_POST["Issue_Information"])){
        $environmentIssues = json_decode($_POST["Issue_Information"], TRUE);
        $new_Environment_Issue = new EnvironmentIssue($environmentIssues,$directoryToSaveTo);
    }
    
    if (isset($new_Environment_Issue)){
       error_log ("Update: New Environment Issue created.\n");
    
        //Add Photo Data to the Environment Issue, if a photo was submitted
        if (isset($_FILES["Image"]["name"])){
            //Check if the Image file is an actual Image or a fake Image file
            $realImage = getimagesize($_FILES["Image"]["tmp_name"]);
            if (false !== $realImage){
                //Checkpoint: A Valid Image was submitted
                error_log ("Update: A Valid Image was submitted with the post.\n"); //logging
                error_log ("Mime Data: " . $realImage["mime"]."\n");

                $imageName = basename($_FILES["Image"]["name"]);
                $imageCurrentTempLocation = $_FILES["Image"]["tmp_name"];
                $imageFileType = pathinfo(("".$directoryToSaveTo.basename($_FILES["Image"]["name"])),PATHINFO_EXTENSION);
                $new_Environment_Issue->addImageData($imageName, $imageCurrentTempLocation, $imageFileType);

                //Set Needed Database Querying Variables, for below
                if ($new_Environment_Issue->hasImage()){
                    $imageHere = "YES"; $absPathToImage = $new_Environment_Issue->getImageAbsFilePath();
                }
            }
            else{ error_log ("Update: Detected an invalid image!\n");}
        }
        else{
            //Checkpoint: An Image was not submitted
            error_log ("Update: A Valid Image was not submitted with the post.\n"); //logging
        }

        //Commit Data for the newly submitted Environment Issue to the Database 
        //Make sure MySQL is installed on this Web Server and the PHP mysql Module is on!
        if (function_exists('mysql_connect')){ 
            error_log ("Update: MySQL is installed on the Web Server and the PHP mysql module is on.\n");

            $db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());

            //Check that we can connect to the Database
            if (isset($db_connect)){
                error_log ("Connection to the MySQL Database Successful.\n");

                mysql_select_db($databaseName, $db_connect); //Select the 'Econ_Dev_South' Database

                $query = ("INSERT into Environment_Issues (firstName, lastName, phoneNumber, "
                        . "email, zipCode, description, issueType, longitude,"
                        . " latitude, Image_Here, Image_Filepath)"
                        . " VALUES ('"
                        . $new_Environment_Issue->getFirstName() . "','"
                        . $new_Environment_Issue->getLastName() . "','"
                        . $new_Environment_Issue->getPhoneNumber() . "','"
                        . $new_Environment_Issue->getEmail() . "','"
                        . $new_Environment_Issue->getZipCode() . "','"
                        . $new_Environment_Issue->getDescription() . "','"
                        . $new_Environment_Issue->getIssueType() . "','"
                        . $new_Environment_Issue->getLongitude() . "','"
                        . $new_Environment_Issue->getLatitude() . "','"
                        . $new_Environment_Issue->hasImageStr() . "','"
                        . $new_Environment_Issue->getImageAbsFilePath() . "')");

                error_log ("\nWe will Execute the Following SQL Query:\n" . $query . "\n\n");

                //Execute Query
                $queryResult = mysql_query($query, $db_connect) or die (mysql_error());

                if (isset($queryResult)){
                    error_log ("The new Environment Issue's Information was stored in the Database Successuflly.\n");
                }
                else{
                    error_log ("Invalid Query!\n");
                }

            }
            else{ error_log ("Connection to the MySQL Database Failed.\n"); }   
        } 
    }
    else {
        error_log ("Error Update: A New Environment Issue was Not Created!\n"
        . "Decoding the json object failed!\n");
    }
?>

