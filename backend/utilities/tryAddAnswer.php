<?php
	
	include("connect.php");

	session_start();

	$username = $_SESSION['username'];
	$questionID = $_GET['quesid'];
	$content = $_POST['answer'];

	$qry = "INSERT INTO answers(u_id, q_id, content) VALUES ('".$username."', '".$questionID."', '".$content."')";

	if(mysqli_query($con, $qry)){
		$qry = "SELECT categories.name AS name FROM questions JOIN categories ON questions.category = categories.id WHERE questions.id = ".$questionID;
		$res = mysqli_query($con, $qry);
		$row = mysqli_fetch_assoc($res);
		header("Location:../logic/home.php?category=".$row['name']);
	}

	else{
		echo "Error";
	}




?>