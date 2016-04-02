<?php
    //Get the entry's id we want to delete
    $idToDelete = $_POST['id'];
    
    //Connect to Database
    $db_connect = mysql_connect("qa-server-database.cd6byyjzs6xl.us-west-2.rds.amazonaws.com", "EDSQADB", "EDSQADBpass") or die(mysql_error());
    
    if (isset($db_connect)){
        echo "Connecting to the Database is Successful!..\n";

        //Select the correct database we want to talk to
        mysql_select_db("Econ_Dev_South", $db_connect);
        
        $query = "DELETE FROM Environment_Issues WHERE id=".$idToDelete;
        
        //Execute Query
        $queryResult = mysql_query($query, $db_connect) or die (mysql_error());

        if (isset($queryResult)){
                echo "Environment Issue Entry was Successuflly Deleted from the Database!..\n";
        }
        else{
                echo "Detetion was Unsuccessful!";
        }
    }
    
?>

