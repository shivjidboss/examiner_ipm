<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'password';
$dbName = 'ipm';

//Connect and select the database
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);	
}
?>