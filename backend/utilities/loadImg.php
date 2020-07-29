<?php
	include("connect.php");

	$user = $_SESSION['username'];

	$qry = "SELECT img from users WHERE username = '".$user."'";

	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	if($row['img'] === NULL)
		echo "<img src='../../frontend/img/none.png' style='border-radius:50%; height:200px; width: 200px; border:3px solid #a01e1e;'>";

	else{
		echo "<img src='".$row['img']."' style='border-radius:50%; height:200px; width: 200px; border:3px solid #a01e1e;'>";
	}

?>