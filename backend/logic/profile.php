<?php
	session_start();

	if(!isset($_SESSION['username'])){
		header("Location:index.php");
	}
?>

<html>
<head>
	<title>My Profile</title>
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
		<div class="headline">
			<div class="imgHeadline">
				<!-- <img src="../../frontend/img/sj.jpg" style="border-radius:50%; height:200px; width: 200px; border:3px solid #a01e1e;"> -->
				<?php include("../utilities/loadImg.php"); ?>
			</div>
			<div class="contentHeadline">
				<!-- <p class="question">Sohaib Jawad</p>
				<p>Works at</p> -->
				<?php include("../utilities/loadDetails.php"); ?>

				<form action="upload.php" method="POST" enctype="multipart/form-data">
					<label for="InputFile">Upload new photo</label>
					<input type="file" name="uploadFile" id="uploadFile" required>
					<br>
					<button type="submit" class="subImg" name="submit">Upload</button>
				</form>
			</div>
		</div>

		<div id="main">
			<div id="left">
				<ul>
					<?php include("category.php") ?>
				</ul>
			</div>
			<div id="mainContent">

				<button style="margin-left:200px;" class="showQuestions">My Questions</button>
				<button style="margin-left:2px;" class="showAnswers">My Answers</button>

				<h2 class='question' style='margin-top:15px; font-size:30px; text-align:center;'>Questions asked</h2>

				<div class="first" style='display:none;'>
					<?php include("loadMyQuestions.php"); ?>
				</div>

				<div class="second" style='display:none;'>
					<?php include("loadMyAnswers.php"); ?>
				</div>

			</div>

			<div id="right">
				<div class="rightTop">
					<h3>Improve Your Feed</h3>
				</div>
				<div class="rightBottom">
					<ul>
						<!-- <li>&#10004; <a href="">Follow at least 4 topics</a></li>
						<li><a href="">Upvote atleast 5 answers</a></li>
						<li><a href="">Ask your first question</a></li>
						<li>&#10004; <a href="">Answer a question</a></li> -->
						<?php include("improveFeed.php"); ?>
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

				$('.first').fadeIn(500);

				$('.showQuestions').click(function(){
					$('h2.question').text("Questions Asked");
					$('.second').fadeOut(1);
					$('.first').fadeIn(500);
				});

				$('.showAnswers').click(function(){
					$('h2.question').text("Questions Answered");
					$('.first').fadeOut(1);
					$('.second').fadeIn(500);
				});



			});
		</script>

</body>
</html>