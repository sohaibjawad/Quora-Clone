<?php
	session_start();
	include("connect.php");
	

	$qry = "DELETE FROM users WHERE username = '".$_SESSION['username']."'";
	mysqli_query($con, $qry);

	session_destroy();

	header("Location:../logic/index.php");

	

?>