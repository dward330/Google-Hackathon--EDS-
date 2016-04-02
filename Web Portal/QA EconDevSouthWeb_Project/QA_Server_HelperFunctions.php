<?php

    session_start();
    
    //Database Setup and Variables
    $databaseUser = 'EDSQADB';
    $databasePass = 'EDSQADBpass';
    $databaseHost = 'qa-server-database.cd6byyjzs6xl.us-west-2.rds.amazonaws.com';
    $databaseName = 'Econ_Dev_South';
    
    //Checks that the User has logged in already
    function checkLogin(){
        if (!isset($_SESSION['Loggedin'])){
            $_SESSION['error_message'] = "You Need to Login First!";
            header('Location: http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/WebPortal.php');
            exit;   
        }
        else{
            if($_SESSION['Loggedin'] == 1){
                //your fine to stay
            }
            else{
                $_SESSION['error_message'] = "You Need to Login First to View That Page!";
                
                //Redirects the User to the Login Web Portal
                header('Location: http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/WebPortal.php');
                exit;
            }
        }
    }

    //Logs the User Out
    function logout(){
        $_SESSION['Loggedin'] = 0;
        $_SESSION['error_message'] = "";
        session_destroy();
        
        error_log ("Update: User Logged Out. \n");
        
        //Redirects the User to the Login Web Portal
        header('Location: http://eds-qa-lb-495482778.us-west-2.elb.amazonaws.com/WebPortal.php');
        exit;
    }
?>

