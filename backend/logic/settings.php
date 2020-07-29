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

		<?php 
			if($_SESSION['username'] == "admin"){
		?>

		<h2 style='text-align:center; margin-top:30px; font-size:2.5em;' class='question'>Admin Panel</h2>

		<?php }

		else{

		 ?>

		 <h2 style='text-align:center; margin-top:30px; font-size:2.5em;' class='question'>User Panel</h2>

		 <?php } ?>

		<div class="center">

			<button class='cgpass' style='margin-left:340px;'>Change Password</button><br>
			<form style='margin-left:285px; display:none;'class='passwordSet' action="../utilities/tryChnagePass.php" method="post">
				<input type="text" name="currentpass" placeholder="Current Password">
				<br>
				<input type="text" name="newpass" placeholder="New Password">
				<br>
				<input type="text" name="rnewpass" placeholder="Re-enter New Password">
				<!-- <br><br> -->
				<input class='change' type="submit" value="Change">
			</form>
			<br>

			<?php 
				if($_SESSION['username'] != "admin"){ 
			?>

			<button class='cgo' style='margin-left:312px;'>Change Organization/School</button><br>
			<form class='cgorg' style='margin-left:240px; display:none;' action="../utilities/tryChangeOrg.php" method="POST">
				<select name="type">
					<option value="Work">Work</option>
					<option value="Student">Student</option>
					<option value="Other">Other</option>
				</select>
				<input type="text" name="org" placeholder="Type Here"><!-- <br><br> -->
				<input class='change' type="submit" value="Change">
			</form>
			<br>
			<button class='da' style='margin-left:340px;'>Deactivate Account</button><br><br>
			<form style='margin-left:355px; display:none;' class='delUsr' action="../utilities/tryDeleteUser.php" method="post">
				<input class='changeSpecial' type="submit" value="Are You Sure?">
			</form>
			<br>
			<?php } ?>

			<?php
				if($_SESSION['username'] == "admin"){
			?>

			<button class='ac' style='margin-left:350px;'>Add Category</button><br><br>
			<form style='margin-left:280px; display:none;' class='addCat' action='../utilities/tryAddCategory.php' method='post' enctype="multipart/form-data">
				<input type = "text" name="catName" placeholder="Name">
				<input type="file" name="uploadFile" id="uploadFile" required>
				<input class='change' type="submit" value="Add">
			</form>

			<button class='rc' style='margin-left:340px;'>Remove Category</button><br><br>
			<form style='margin-left:330px; display:none;' class='remCat' action='../utilities/tryRemCategory.php' method='post'>
				<select name="category">
						<?php include("loadCategoryList.php"); ?>
					</select>
				<input class='change' type="submit" value="Remove">
			</form>

			<?php } ?>

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
	


	<script type="text/javascript" src="../../frontend/js/question.js"></script>
	<script>
			$(document).ready(function(){
				//page load
				$('.loading').fadeOut(700);
				$('.wrapper').fadeIn(700);

				$('.cgpass').click(function(event){
					$('.delUsr').fadeOut();
					$('.cgorg').fadeOut();
					$('.addCat').fadeOut();
					$('.remCat').fadeOut();
					$('.passwordSet').fadeIn(800);
				});

				$('.da').click(function(event){
					$('.cgorg').fadeOut();
					$('.passwordSet').fadeOut();
					$('.delUsr').fadeIn(800);
				});

				$('.cgo').click(function(event){
					$('.delUsr').fadeOut();
					$('.passwordSet').fadeOut();
					$('.cgorg').fadeIn(800);
				});

				$('.ac').click(function(event){
					$('.passwordSet').fadeOut();
					$('.remCat').fadeOut();
					$('.addCat').fadeIn(800);
				});

				$('.rc').click(function(event){
					$('.passwordSet').fadeOut();
					$('.addCat').fadeOut();
					$('.remCat').fadeIn(800);
				});


			});
		</script>

</body>
</html>