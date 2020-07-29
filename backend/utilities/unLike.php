<?php
	session_start();

	include("connect.php");

	$user = $_SESSION['username'];
	$id = $_GET['id'];
	$qid = $_GET['qid'];

	$qry = "DELETE FROM likes WHERE u_id ='".$user."' AND a_id=".$id;

	if(mysqli_query($con, $qry))
		header("Location:../logic/questionPage?id=".$qid);
?>