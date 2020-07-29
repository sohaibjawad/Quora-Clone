<?php
	include("connect.php");

	$user = $_SESSION['username'];

	$qry = "SELECT f_name, l_name, type, org FROM users WHERE username = '".$user."'";
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	echo "<p class='question' style='font-size:35px;'>".$row['f_name']." ".$row['l_name']."</p>";

	if($row['type'] == "Student" && $row['org'] != NULL)
		echo "<p style='font-size:18px;'>Student at ".$row['org']."</p>";

	else if($row['type'] == "Work" && $row['org'] != NULL)
		echo "<p style='font-size:18px;'>Works at ".$row['org']."</p>";

	else
	{

	}
?>