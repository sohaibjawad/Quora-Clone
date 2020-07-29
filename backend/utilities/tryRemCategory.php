<?php
	
	$category = $_POST['category'];

	include("connect.php");

	$qry = "DELETE FROM categories WHERE name = '".$category."'";

	if(mysqli_query($con, $qry)){
		header("Location:../logic/settings.php");
	}
?>