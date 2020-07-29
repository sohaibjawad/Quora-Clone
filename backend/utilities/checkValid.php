<?php
	include("connect.php");

	$username = $_GET['id'];

	$qry = "SELECT * from users where username like '".$username."'";
	$res = mysqli_query($con, $qry);

	if(mysqli_num_rows($res))
		echo "no";

	else{
		echo "yes";
	}


?>