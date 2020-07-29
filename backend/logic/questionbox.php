<?php
	include("../utilities/connect.php");

    $category = $_GET['category'];

    $qry1 = "SELECT id, name FROM categories where name like '".$category."%'";
    $res1 = mysqli_query($con, $qry1);

    if(mysqli_num_rows($res1)){
        $row1 = mysqli_fetch_assoc($res1);
        $category = $row1['id'];
    }

    if($row1['name'] === "Feed"){
        $qry = "SELECT questions.id AS ques_id, f_name, l_name, content, DATE_FORMAT(questions.created_at, '%l:%i %p - %D %b %Y') AS time FROM users JOIN questions ON questions.u_id = users.username ORDER BY questions.created_at DESC";
    }
         
    else{
        $qry = "SELECT questions.id AS ques_id, f_name, l_name, content, DATE_FORMAT(questions.created_at, '%l:%i %p - %D %b %Y') AS time FROM users JOIN questions ON questions.u_id = users.username WHERE questions.category = '".$category."' ORDER BY questions.created_at DESC";
    }
    

    $res = mysqli_query($con, $qry);

    if(mysqli_num_rows($res)){
    	while($row = mysqli_fetch_assoc($res)){
    		$output = "<div class='jumbotron'>
    			<a class='anchorQuestion' href='questionPage.php?id=".$row['ques_id']."'><p class='question'>".$row['content']."</p></a>
    			<p>Asked by, ".$row['f_name']." ".$row['l_name']." at ".$row['time']."</p>
                --------------<br>";
                $qry1 = "SELECT DATE_FORMAT(answers.created_at, '%l:%i %p - %D %b %Y') AS time, f_name, l_name, content FROM answers JOIN users on answers.u_id = users.username WHERE q_id =".$row['ques_id']." ORDER BY answers.created_at DESC";
                $res2 = mysqli_query($con, $qry1);
                if(mysqli_num_rows($res2)){
                    $row2 = mysqli_fetch_assoc($res2);
                    $output .= "<p>Last answered by, ".$row2['f_name']." ".$row2['l_name']." at ".$row2['time']."</p>
                    <p>".$row2['content']."</p>";
                    
                }

                $output .= "<button class='addAnswer'> Answer </button> 
                            <form class='ansForm' style='display:none;' action='../utilities/tryAddAnswer.php?quesid=".$row['ques_id']."' method='POST'>
                                <button type='submit' class='addAnswer'> Post </button>
                                <br><br>
                                <textarea class='answerBox' style='resize: none; font-size:13.5px;' rows='8' cols='78' name='answer' placeholder='Type here' required></textarea>
                            </form>

    			            </div>";

    		echo $output;

    	}
    }
?>