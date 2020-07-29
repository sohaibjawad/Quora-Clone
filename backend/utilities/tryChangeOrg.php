<?php
	session_start();
	include("connect.php");
	$org = $_POST['org'];
	$type = $_POST['type'];
	

	$qry = "UPDATE users SET org = '".$org."', type = '".$type."' WHERE username = '".$_SESSION['username']."'";
	mysqli_query($con, $qry);


	header("Location:../logic/settings.php");

	

?>