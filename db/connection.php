<?php

$servername = "localhost";
$username = "root";
$password = "";

try{
	$connection = new PDO("mysql:host=$servername", $username, $password);
	// set the error mode to exception
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql="create database shop";
	$connection->exec($sql);
	echo "Database created successfully<br>";

}
catch(PDOException $e){
	echo $sql . "<br>" . $e->getMessage();

}

$connection = null;

?>