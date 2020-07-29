<?php

	include("connect.php");
	session_start();

	$q_id = $_GET['q_id'];
	$user = $_SESSION['username'];

	$qry = "SELECT category FROM questions WHERE id =".$q_id;
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	if($row['category'] === NULL)
		$category = 1;
	else
		$category = $row['category'];

	$qry1 = "INSERT INTO follows (u_id, c_id) VALUES ('".$user."', ".$category.")";

	if(mysqli_query($con, $qry1)){
		header("Location:../logic/questionPage?id=".$q_id);
	}
?>