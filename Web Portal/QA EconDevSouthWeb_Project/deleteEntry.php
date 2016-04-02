<?php
    
    require ("QA_Server_HelperFunctions.php");

    //Get the entry's id we want to delete
    $data = json_decode(file_get_contents('php://input'), true);
    $idToDelete = $data["id"];
    
    error_log("issue to delete: ".$idToDelete);
    
    //Connect to Database
    $db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());
    
    if (isset($db_connect)){
        error_log ("Update: Connecting to the Database is Successful.\n");

        //Select the correct database we want to talk to
        mysql_select_db("Econ_Dev_South", $db_connect);
        
        $query = "DELETE FROM Environment_Issues WHERE id=".$idToDelete;
        
        //Execute Query
        $queryResult = mysql_query($query, $db_connect) or die (mysql_error());

        if (isset($queryResult)){
                error_log ("Update: Environment Issue Entry was Successuflly Deleted from the Database!..\n");
        }
        else{
                error_log ("Error Update: Detetion was Unsuccessful!\n");
        }
    }    
    
    mysql_close($db_connect);
?>

