<?php
require('config.php');

$connection = new mysqli($dbServer, $dbUserName, $dbPassword, $dbName);
$connection->query("use de_sua_nota;");
$connection->query("set names UTF8;");

if ($connection->connect_errno){
	exit("Database connection failed. Reason:" . $connection->connect_error);
}

?>

    
    

