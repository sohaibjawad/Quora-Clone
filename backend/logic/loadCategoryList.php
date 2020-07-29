<?php

	include("../utilities/connect.php");

	$qry = "SELECT name FROM categories ORDER BY name ASC";

	$res = mysqli_query($con, $qry);


	if(mysqli_num_rows($res)){
		while($row = mysqli_fetch_assoc($res)){
			if($row['name'] === "Feed")
				echo "<option value='Feed'>General</option>";
			else if($row['name'] === "Bookmarks"){

			}
			else
				echo "<option value='".$row['name']."'>".$row['name']."</option>";
		}
	}

?>