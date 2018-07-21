<?php 
include ('mysqli_plug.php');
exec("/usr/bin/mysqldump -u root -p password ipm", $output);
/* $output will have sql backup, then save file with these codes */
$h=fopen("/backups/file.sql", "w+");
fputs($h, $output);
fclose($h);
?> 