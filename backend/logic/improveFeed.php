<?php
	include("../utilities/connect.php");

	$qry = "SELECT count(*) AS count FROM questions WHERE u_id = '".$_SESSION['username']."'";
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	$output = "";

	if($row['count'] > 0){
	 	$output .= "<li>&#10004; <a href=''>Ask your first question</a></li>";
	}

	else{
		$output .= "<li><a href=''>Ask your first question</a></li>";
	}

	$qry = "SELECT count(*) AS count FROM answers WHERE u_id = '".$_SESSION['username']."'";
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	if($row['count'] > 0){
		$output .= "<li>&#10004; <a href=''>Answer a question</a></li>";
	} 

	else{
		$output .= "<li><a href=''>Answer a question</a></li>";
	}

	$qry = "SELECT count(*) AS count FROM follows WHERE u_id = '".$_SESSION['username']."'";
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	if($row['count'] >= 4){
		$output .= "<li>&#10004; <a href=''>Follow at least 4 topics</a></li>";
	} 

	else{
		$output .= "<li><a href=''>Follow at least 4 topics</a></li>";
	}

	$qry = "SELECT count(*) AS count FROM likes WHERE u_id = '".$_SESSION['username']."'";
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	if($row['count'] >= 5){
		$output .= "<li>&#10004; <a href=''>Upvote atleast 5 answers</a></li>";
	} 

	else{
		$output .= "<li><a href=''>Upvote atleast 5 answers</a></li>";
	}

	echo $output;

?>