<?php 
$dbHost     = "localhost"; 
$dbUsername = "u559801590_game"; 
$dbPassword = "wZghqH6>9"; 
$dbName     = "u559801590_game"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}

?>