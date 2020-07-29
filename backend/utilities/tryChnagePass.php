<?php
	session_start();
	include("connect.php");
	$current = $_POST['currentpass'];
	$new = $_POST['newpass'];
	$rnew = $_POST['rnewpass'];

	$qry = "SELECT * from users WHERE password = '".$current."' AND username = '".$_SESSION['username']."'";
	$res = mysqli_query($con, $qry);

	if(mysqli_num_rows($res) && $new==$rnew){
		// echo "hello";
		$qry = "UPDATE users SET password ='".$new."' WHERE username = '".$_SESSION['username']."'";
		mysqli_query($con, $qry);
		header("Location:../logic/settings.php");
	}

	else if(mysqli_num_rows($res) && $new!=$rnew){
		echo "Wrong Password Combination";
	}

	else{
		echo "Wrong current Password Inserted";
	}

?>