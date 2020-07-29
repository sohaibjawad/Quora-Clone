<?php
	session_start();

	include("connect.php");

	$user = $_SESSION['username'];
	$id = $_GET['q_id'];

	$qry = "DELETE FROM questions WHERE u_id='".$user."' AND id=".$id;

	if(mysqli_query($con, $qry))
		header("Location:../logic/home.php");
?>