<?php

	include("connect.php");
	$id = $_GET['id'];
	$qid = $_GET['qid'];

	$qry = "DELETE FROM answers WHERE id = ".$id;

	if(mysqli_query($con, $qry)){
		header("Location:../logic/questionPage?id=".$qid);
	}
?>