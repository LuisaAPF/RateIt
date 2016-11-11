<?php
require('config.php');

$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);
$connection->query("use rateIt;");
$connection->query("set names UTF8;");

if ($connection->connect_errno){
	exit("Database connection failed. Reason:" . $connection->connect_error);
}

?>

    
    

