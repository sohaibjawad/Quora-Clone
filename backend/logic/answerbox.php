<?php
	include("../utilities/connect.php");

	$qry = "SELECT users.f_name AS fName, users.l_name AS lName, questions.content AS ques, answers.u_id AS ansby, DATE_FORMAT(answers.created_at, '%l:%i %p - %D %b %Y') AS time, answers.content AS ansCont, answers.id AS ans_id FROM questions LEFT JOIN answers ON questions.id = answers.q_id LEFT JOIN users on users.username = answers.u_id WHERE questions.id=".$_GET['id']." ORDER BY answers.created_at DESC";
	$res = mysqli_query($con, $qry);
	$row = mysqli_fetch_assoc($res);

	// if(mysqli_num_rows($res))
	// 	echo "pass";

	echo "<p class='question' style='font-size:1.8em; margin-left:13px;'>".$row['ques']."</p>";

	$qry2 = "SELECT questions.u_id AS uid, questions.category AS category FROM questions JOIN categories on categories.id = questions.category WHERE questions.id = ".$_GET['id'];
	$res2 = mysqli_query($con, $qry2);
	$row2 = mysqli_fetch_assoc($res2);

	if($row2['category'] === NULL)
		$category = 1;
	else
		$category = $row2['category'];

	$qry3 = "SELECT * FROM follows WHERE u_id='".$_SESSION['username']."' AND c_id=".$category;
	$res3 = mysqli_query($con, $qry3);

	if(mysqli_num_rows($res3))
		echo "<p><a class='followBtn' style='margin-left:13px;' href='../utilities/unFollow.php?q_id=".$_GET['id']."'>Unfollow</a>";
	else
		echo "<p><a class='followBtn' style='margin-left:13px;' href='../utilities/newFollow.php?q_id=".$_GET['id']."'>Follow</a>";

	$qry4 = "SELECT users.username AS usr FROM questions JOIN users on users.username = questions.u_id WHERE questions.id =".$_GET['id'];
	$res4 = mysqli_query($con, $qry4);
	$row4 = mysqli_fetch_assoc($res4);

	if($row4['usr'] == $_SESSION['username'] || $_SESSION['username'] == "admin")
		echo "<a class='delete' href='../utilities/tryDelete.php?q_id=".$_GET['id']."'>Delete Question</a>";

	echo "</p><br>";

	$res = mysqli_query($con, $qry);

	if(mysqli_num_rows($res)){
		while($row = mysqli_fetch_assoc($res)){

			if($row['ansby'] === NULL)
			{
				$output = "No Answers yet!";
			}

			else{
				$output = "<div class='jumbotron'>

					<p>Answered by, ".$row['fName']. " " .$row['lName']." at ".$row['time']."
					<br><br>
					<p>".$row['ansCont']."</p>";

					if($_SESSION['username'] == "admin"){
						$output .= "<a class = 'delCom' href='../utilities/tryDeleteComment.php?id=".$row['ans_id']."&qid=".$_GET['id']."'>Delete Comment</a>";
					}


				$qry4 = "SELECT * FROM likes WHERE u_id = '".$_SESSION['username']."' AND a_id=".$row['ans_id'];
				$res4 = mysqli_query($con, $qry4);

				if(mysqli_num_rows($res4))
					$output .= "<a class='addLike' href='../utilities/unLike.php?id=".$row['ans_id']."&qid=".$_GET['id']."'>Down vote</a>";
				else
					$output .= "<a class='addLike' href='../utilities/addLike.php?id=".$row['ans_id']."&qid=".$_GET['id']."'>Up vote</a>";
				
				$output .=	"<button class='addComment'>Comment</button> 
                            <form class='ansForm' style='display:none;' action='../utilities/tryAddComment.php?ansid=".$row['ans_id']."' method='POST'>
                                <button type='submit' class='addComment'> Post </button>
                                <br><br>
                                <textarea class='commentBox' style='resize: none; font-size:13.5px;' rows='8' cols='78' name='comment' placeholder='Type here' required></textarea>
                            </form>";

                 $query = "SELECT users.f_name AS fName, users.l_name AS lName, comments.content AS content, DATE_FORMAT(comments.created_at, '%l:%i %p - %D %b %Y') AS time FROM comments JOIN users on users.username = comments.u_id WHERE ans_id=".$row['ans_id'];
                 $result = mysqli_query($con, $query);
                 if(mysqli_num_rows($result))
                 	$output .= "<button class='viewComments'>View Comments</button>";

                 $output .= "<div id='commentList' style='display:none;'>";
                 if(mysqli_num_rows($result)){
    
           
                 	while($record = mysqli_fetch_assoc($result)){
                         $output .= "<p>".$record['fName']." ".$record['lName']." says,</p><p>".$record['content']."</p><p>".$record['time']."</p>-------------------";
                 	}
                 }

                $output .= "</div>

                			</div>";
			}

					echo $output;
		}
	}


	


?>