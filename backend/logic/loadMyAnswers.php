<?php
	
	include("../utilities/connect.php");
	$user = $_SESSION['username'];

	$qry = "SELECT users.f_name AS fname, users.l_name AS lname, questions.content AS q_con, questions.id AS q_id, DATE_FORMAT(questions.created_at, '%l:%i %p - %D %b %Y') AS q_time, answers.created_at AS a_time, answers.content AS a_con FROM questions JOIN answers on questions.id = answers.q_id JOIN users on users.username = questions.u_id WHERE answers.u_id = '".$user."' GROUP BY q_id ORDER BY answers.created_at desc";
	$res =  mysqli_query($con, $qry);

	while($row = mysqli_fetch_assoc($res)){
		$output = "<div class='jumbotron'>
						<a class='anchorQuestion' href='questionPage.php?id=".$row['q_id']."'><p class='question'>".$row['q_con']."</p></a>
						<p>Asked by: ".$row['fname']." ".$row['lname']." at ".$row['q_time']."</p>-----------------
						<p>You last answered at: ".$row['a_time']."</p>
						<p>".$row['a_con']."</p>";
				   

				   // $qry1 = "SELECT count(*) AS total from answers WHERE q_id = ".$row['q_id'];
				   // $res1 = mysqli_query($con, $qry1);
				   // $row1 = mysqli_fetch_assoc($res1);


				   // if($row1['total'] == 1)
				   // 		$output .= "<p>".$row1['total']." answer</p>";

				   // 	else
				   // 		$output .= "<p>".$row1['total']." answers</p>";

				   $output .= "</div>";
				  	echo $output;
	}

?>