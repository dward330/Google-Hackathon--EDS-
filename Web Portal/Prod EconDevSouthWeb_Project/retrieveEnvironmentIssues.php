<?php
/*
 * This script will retrieve x number of entries in the database
 * with an offest of y.
 * x = number of entries you want.
 * y = the number of entries, from the beginning of the database, to skip
 *
 */

require("Prod_Server_HelperFunctions.php");

$data = json_decode(file_get_contents('php://input'), true);
$numOfDesiredEntries = $data["x"];
$offset = $data['y'];
$arrayOfEnvironmentIssue = array();

//Database Connection Stuff:
$db_connect = mysql_connect($databaseHost, $databaseUser, $databasePass) or die(mysql_error());
mysql_select_db($databaseName, $db_connect);

//Grab All the Issues from the Database
$sqlQuery = "SELECT * FROM Environment_Issues";
$result = mysql_query($sqlQuery, $db_connect) or die(mysql_error());

//How many issues are there?
$numOfIssues = mysql_num_rows($result);
//error_log "Num of Rows of Data: " . $numOfIssues . "<br><br>";
//Turn list of all Environment Issues into associative arrary
//$environmentIssues = mysql_fetch_assoc($result);

//foreach($environmentIssues as $columnName => $fieldValue) {
while ($environmentIssues = mysql_fetch_array($result, MYSQL_ASSOC)){
    //Add this issue to the list of issues
    array_push($arrayOfEnvironmentIssue, $environmentIssues);
}
/*
 * id
 * issueType
 * Image_Here
 * Image_Filepath
 * description
 * longitude
 * latitude
 * date
 * firstName
 * lastName
 * zipCode
 * email
 * phoneNumber
 */

mysql_close($db_connect);

echo json_encode($arrayOfEnvironmentIssue);
?>
