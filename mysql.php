<?php

/*
 * TODO: move this into a function that takes the table name, so 
 * it can connect to different tables without code repetition
 */

// Connection variables
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "coffee_shop_schema";

$db = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($db->connect_error) {
    die("MySQL connection failed: " . $db->connect_error);
} 

?>
        
        