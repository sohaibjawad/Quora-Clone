<?php
	session_start();

	if(!isset($_SESSION['username'])){
		header("Location:index.php");
	}

?>

<html>
<head>
	<title>Quora | Page Title</title>
	<link rel="stylesheet" type="text/css" href="../../frontend/css/app.css">
	<link rel="stylesheet" type="text/css" href="../../frontend/css/home.css">
	<script src="../../frontend/js/jquery-3.4.1.min.js"></script>
</head>
<body>

	<div class="loading">
    	<img src="../../frontend/img/reload.gif" alt="Loading.." />
	</div>

<div class="wrapper">
	<?php
		include("../../frontend/html/navigation.html");
	?>
	

	<!-- Modal Section -->
		<div id="main">
			<div id="left">
				<ul>
					<?php include("category.php") ?>
				</ul>
			</div>
			<div id="mainContent">
				<?php include("answerbox.php") ?>

			</div>

			<div id="right">
				<div class="rightTop">
					<h3>Improve Your Feed</h3>
				</div>
				<div class="rightBottom">
					<ul>
						<li>&#10004; <a href="">Follow at least 4 topics</a></li>
						<li><a href="">Upvote atleast 5 answers</a></li>
						<li><a href="">Ask your first question</a></li>
						<li>&#10004; <a href="">Answer a question</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="modal">
			<div class="q-Content">
				<div class="cross">+</div>
				<form action="../utilities/question_add.php" method="POST">
					<textarea style="resize: none; font-size:13.5px;" rows="8" cols="78" name="question" placeholder="Question" required></textarea>
					<!-- <input type="text" name="link" placeholder="Optional Link"> -->
					<br><br>
					Category: 
					<select name="category">
						<?php include("loadCategoryList.php"); ?>
					</select>
					<input type="submit" value="Submit">
				</form>
			</div>
		</div>
</div>

<script type="text/javascript" src="../../frontend/js/question.js"></script>

<script>
			$(document).ready(function(){
				//page load
				$('.loading').fadeOut(700);
				$('.wrapper').fadeIn(700);

				//dealing with button text and sliding answer box
				$('.addComment').click(function(event){
					if($(this).text() !== " Post "){

						$(this).next().toggle('swing');

					if($(this).text() === " Back ")
						$(this).text(" Comment ");
					else
						$(this).text(" Back ");
					}
				});

				$('.viewComments').click(function(event){
					if($(this).text() === "View Comments"){
						$(this).text("Hide Comments");
						$(this).next().toggle('swing');
					}

					else if($(this).text() === "Hide Comments"){
						$(this).next().toggle('swing');
						$(this).text("View Comments");
					}

					else{
						
					}

				});

				

			});
		</script>


</body>
</html>