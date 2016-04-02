<?php

    require ("Prod_Server_HelperFunctions.php"); 

    //Gather all the information submitted in the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());
    mysql_select_db($databaseName, $db_connect);

    //Make Sure this username is not already taken
    $query = "SELECT user FROM Users WHERE user = '".$username."'";
    $result = mysql_query($query, $db_connect) or die (mysql_error());  

    if(mysql_num_rows($result) > 0){
        $_SESSION['error_message'] = "Username is already Taken. Try Another!";
        error_log ("Error Update: Username is already Taken. Try Another! <br><br>\n");

        //close database connection
        mysql_close($db_connect);

        //Redirects the User to the Login Web Portal
        header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
    }
    else{
        //Salt and Hash password
        $password = $password . "abc123";
        $password = md5($password);

        //Query to Store The New User
        $query = "INSERT into Users (user,password,firstname,lastname) VALUES ('" . $username . "','" . $password . "','" . $firstname . "','" . $lastname . "')";
        //Execute the Query
        $sqlResult = mysql_query($query, $db_connect) or die(mysql_error());

        //close database connection
        mysql_close($db_connect);

        error_log ("Update: New User: '" . $username . "' Created.\n");

        //Send User back to Login Web Portal, clear any error messages
        $_SESSION['error_message'] = "";
        header('Location: http://EDSAppLB-1862368837.us-west-2.elb.amazonaws.com/WebPortal.php');
    }

?>