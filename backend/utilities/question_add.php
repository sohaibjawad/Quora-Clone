<?php

	include('connect.php');

	$question =  $_POST['question'];
	$link =  $_POST['link'];
	$category = $_POST['category'];
	session_start();
	$user = $_SESSION['username'];

	$qry1 = "SELECT id FROM categories WHERE name = '".$category."'";
	$res = mysqli_query($con, $qry1);

	$row = mysqli_fetch_assoc($res);
	$category = $row['id'];

	if(isset($_POST['link'])){
		$qry = "INSERT INTO questions (u_id, content, link, category) VALUES ('".$user."', '".$question."', '".$link."', '".$category."')";
	}

	else{
		$qry = "INSERT INTO questions (u_id, content, category) VALUES ('".$user."', '".$question."', '".$category."')";
	}

	if(mysqli_query($con, $qry)){
		header("Location:../logic/home.php");
	}


?>