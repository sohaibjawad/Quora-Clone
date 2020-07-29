<?php
	$server = "localhost";
	$username = "root";
	$password = "sohaib97";
	$dbname = "quora";

	$con = new MySQLi($server, $username, $password, $dbname);

	if($con->connect_error)
		echo "Error";
?>
