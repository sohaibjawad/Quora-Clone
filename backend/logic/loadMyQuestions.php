<?php
	
	include("../utilities/connect.php");
	$user = $_SESSION['username'];

	$qry = "SELECT questions.content AS q_con, questions.id AS q_id, DATE_FORMAT(questions.created_at, '%l:%i %p - %D %b %Y') AS q_time FROM questions JOIN users on users.username = questions.u_id WHERE questions.u_id = '".$user."' ORDER BY questions.created_at DESC";
	$res =  mysqli_query($con, $qry);

	while($row = mysqli_fetch_assoc($res)){
		$output = "<div class='jumbotron'>
						<a class='anchorQuestion' href='questionPage.php?id=".$row['q_id']."'><p class='question'>".$row['q_con']."</p></a>
						<p>Asked on: ".$row['q_time']." </p>";
				   

				   $qry1 = "SELECT count(*) AS total from answers WHERE q_id = ".$row['q_id'];
				   $res1 = mysqli_query($con, $qry1);
				   $row1 = mysqli_fetch_assoc($res1);


				   if($row1['total'] == 1)
				   		$output .= "<p>".$row1['total']." answer</p>";

				   	else
				   		$output .= "<p>".$row1['total']." answers</p>";

				   $output .= "</div>";
				  	echo $output;
	}

?>