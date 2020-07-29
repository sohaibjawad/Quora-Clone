<?php
	
	include("connect.php");

	session_start();

	$username = $_SESSION['username'];
	$answerID = $_GET['ansid'];
	$content = $_POST['comment'];

	$qry = "INSERT INTO comments(u_id, ans_id, content) VALUES ('".$username."', '".$answerID."', '".$content."')";

	if(mysqli_query($con, $qry)){
		$qry = "SELECT questions.id AS id FROM questions JOIN answers ON questions.id = answers.q_id WHERE answers.id = ".$answerID;
		$res = mysqli_query($con, $qry);
		$row = mysqli_fetch_assoc($res);
		header("Location:../logic/questionPage.php?id=".$row['id']);
	}

	else{
		echo "Error";
	}




?>