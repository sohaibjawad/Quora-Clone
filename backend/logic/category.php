<?php
	
	include("../utilities/connect.php");

	$qry = "SELECT * FROM categories";
	$url = "";

	$res = mysqli_query($con, $qry);


	if(mysqli_num_rows($res)){
		while($row = mysqli_fetch_assoc($res)){
			$url = substr($row['logo'], 19, -4);

			if(!isset($_GET['category'])){
				$_GET['category'] = "feed";
			}

			if(isset($_GET['category']) && $_GET['category'] === substr($row['logo'], 19, -4)){
				echo "<li><a href=home.php?category=".$row['name']." class=currentCategory><img src=".$row['logo']."> ".$row['name']."</a></li>";
			}

			else{
				echo "<li><a href=home.php?category=".$row['name']."><img src=".$row['logo']."> ".$row['name']."</a></li>";
			}

		}
	}
?>