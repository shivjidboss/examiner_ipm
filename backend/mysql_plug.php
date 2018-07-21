<?php
$server="localhost";
$dbuser="root";
$dbpass="password";
$dbname="ipm";


$connect=mysqli_connect($server,$dbuser,$dbpass) or die("Connection to server couldn't be established!!!".mysqli_error());
mysqli_select_db($dbname) or die('failed'.mysqli_error());
?>