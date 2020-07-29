<?php
	session_start();

	include("connect.php");

	$user = $_SESSION['username'];
	$id = $_GET['id'];
	$qid = $_GET['qid'];

	$qry = "INSERT INTO likes (u_id, a_id) VALUES ('".$user."', ".$id.")";

	if(mysqli_query($con, $qry))
		header("Location:../logic/questionPage?id=".$qid);
?>