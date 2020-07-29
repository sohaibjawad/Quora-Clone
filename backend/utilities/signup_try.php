<?php

	include("connect.php");
	
	$firstName = $_POST['f_name'];
	$lastName = $_POST['l_name'];
	$userName = $_POST['userName'];
	$pass = $_POST['password'];
	$dob = $_POST['dob'];
	$type = $_POST['type'];


	// echo $userName;

	$qry = "INSERT INTO users (username, f_name, l_name, password, type, dob) VALUES ('".$userName."','".$firstName."','".$lastName."','".$pass."','".$type."', '".$dob."')";

	if ($con->query($qry)) {
		header("Location:../logic/index.php");
	}
	else
		echo "Couldn't Register the user" . $con->error;


?>