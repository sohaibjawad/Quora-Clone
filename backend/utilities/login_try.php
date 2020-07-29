<?php
	include("connect.php");

	$username = $_GET['username'];
	$password = $_GET['password'];

	$qry = "SELECT * FROM users WHERE username = '".$username."' AND password = '".$password."'";

	$res = $con->query($qry);

	if($res->num_rows>0)
	{
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['isShown'] = 0;
		header("Location:../logic/home.php");
	}

	else
	{
		$qry = "SELECT * FROM users WHERE username = '".$username."'";
		$res = $con->query($qry);

		if($res->num_rows>0)
		{
			Echo "Wrong username or password";
		}

		else
		{
			Echo "User Does Not Exist";
		}
	}
?>