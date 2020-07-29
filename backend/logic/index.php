<?php

	session_start();
	if(isset($_SESSION['username'])){
		header("Location:home.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login | Quora</title>
	<link rel="stylesheet" type="text/css" href="../../frontend/css/app.css">
	<link rel="stylesheet" type="text/css" href="../../frontend/css/home.css">
</head>
<body id="loginPage">

	<div class="box">
		<h1>Quora</h1>
		<p class="tagline">A place to share knowledge and better understand the world</p>

		<table>
			<tr>
				<td id="divider">
					<a class="suBtn" href="signup.php">Sign Up</a>
				</td>
				<td>
					<form action="../utilities/login_try.php" method="GET">
						<h3>Login</h3>
						<input type="text" name="username" placeholder="Username" autocomplete="on" required>
						<br><br>
						<input type="password" name="password" placeholder="Password" required>
						<br><br>
						<input type="submit" value="Log In">
					</form>
				</td>
			</tr>
		</table>
		<br>
		<?php
		include("../../frontend/html/footer.html");
		?>
	</div>

</body>
</html>